@extends('admin/master')
@section('content')
<div id="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Faq Section</li>
      </ol>

    <!-- Page Content -->
    @if(count($errors)>0)
    <br>
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(Session::has('m'))
      <?php $a=[]; $a=session()->pull('m'); ?>
      <div class="alert alert-{{$a[0]}}" style="width: 40%">
        {{$a[1]}}
      </div>
    @endif
    <!--success message in all views-->
	  	<div class="container" style="width:80%">
	      	<div class="card-body">

                <h4>Faq</h4>
                <form action="{{ url('/admin/Faqnew') }}" method="post">
                    @csrf
                    <div class="form-Department">
                        <label for="group">Question:</label>
                        <input type="text" class="form-control" name="qus">
                        <label for="group">Question PT:</label>
                        <input type="text" class="form-control" name="quspt">
                        <br>
                        <label for="group">Answer:</label>
                        <textarea type="text" class="form-control" name="answer"></textarea>
                        <label for="group">Answer PT:</label>
                        <textarea type="text" class="form-control" name="answerpt"></textarea>
                        <br>
                        <br>
                    </div>
                    <button type="submit" class="btn btn-success">Add</button>
                </form>
                <hr>
                <h4>Edit Faq</h4>
                @foreach($Faqs as $k=>$v)
                @if($k>0)
                <form action="{{ url('/admin/Faqedit/'.$v->id.'') }}" method="post" id="fr{{$v->id}}" style="display: none;">
                    @csrf
                    <div class="form-Department">
                        <label for="group">Question:</label>
                        <input type="text" class="form-control" name="qus" value="{{$v->qus}}">
                        <label for="group">Question PT:</label>
                        <input type="text" class="form-control" name="quspt" value="{{$v->qus_PT}}">
                        <br>
                        <label for="group">Answer:</label>
                        <textarea type="text" class="form-control" name="answer">{{$v->answer}}</textarea>
                        <label for="group">Answer PT:</label>
                        <textarea type="text" class="form-control" name="answerpt">{{$v->answer_PT}}</textarea>
                        <br>

                        <br>
                    </div>
                    <button type="submit" class="btn btn-primary">edit</button>
                    <a href="{{ url('/admin/remFaq/'.$v->id.'') }}" class="btn btn-danger">Remove</a>
                </form>
                @endif
                @endforeach
                <br>
                <select class="form-control" id="perselector">
                  <option value="0">Select Faq</option>
                  @foreach($Faqs as $k=>$v)
                  @if($k>0)
                  <option value="{{$v->id}}">{{$v->qus}}</option>
                  @endif
                  @endforeach
                </select>
                <br>
                <script type="text/javascript">
                    $('#perselector').change(function(){
                    @foreach($Faqs as $k=>$v)
                    @if($k>0)
                    if($('#perselector').val()=={{$v->id}}){
                        $('#fr{{$v->id}}').show();
                    }else{
                        $('#fr{{$v->id}}').hide();
                    }
                    @endif
                    @endforeach
                });
                </script>
            </div>
      </div>
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © {{date('Y')}} By : <a href="http://touch-corp.com">Touch-Corp</a></span>
          </div>
        </div>
      </footer>

  </div>
  <!-- /.content-wrapper -->
</div>
@stop
