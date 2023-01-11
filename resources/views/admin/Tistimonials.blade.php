@extends('admin/master')
@section('content')
<div id="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Testimonials</li>
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

                <h4>Add New Tistimonial:</h4>
                <form action="/admin/addtist" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-Department">
                      <label for="group">name:</label>
                      <input type="text" class="form-control" name="name">
                      <label for="group">name PT:</label>
                      <input type="text" class="form-control" name="namept">
                      <label for="group">company:</label>
                      <input type="text" class="form-control" name="company">
                      <label for="group">company PT:</label>
                      <input type="text" class="form-control" name="companypt">
                      <label for="group">content:</label>
                      <textarea type="text" class="form-control" name="content"></textarea>
                      <label for="group">content PT:</label>
                      <textarea type="text" class="form-control" name="contentpt"></textarea>
                      <br>
                      <label for="group">image:</label>
                      <input type="file" name="img">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Add</button>
                </form>
                <hr>
                <h4>Edit Tistimonial:</h4>
                @foreach($tists as $t)
                <form action="/admin/edittist/{{$t->id}}" method="post" style="display: none;" id="frm{{$t->id}}">
                    @csrf
                    <div class="form-Department">
                      <label for="group">name:</label>
                      <input type="text" class="form-control" name="name" value="{{$t->name}}">
                      <label for="group">name PT:</label>
                      <input type="text" class="form-control" name="namear" value="{{$t->name_Pt}}">
                      <label for="group">company:</label>
                      <input type="text" class="form-control" name="company" value="{{$t->company}}">
                      <label for="group">company PT:</label>
                      <input type="text" class="form-control" name="companyar" value="{{$t->company_PT}}">
                      <label for="group">content:</label>
                      <textarea type="text" class="form-control" name="content">{{$t->content}}</textarea>
                      <label for="group">content PT:</label>
                      <textarea type="text" class="form-control" name="contentar">{{$t->content_Pt}}</textarea>
                      <br>
                      <label for="group">image:</label>
                      <input type="file" name="img">
                      <br>
                      <img src="{{asset('/images/tistimonials')}}/{{$t->image}}" width="150px">
                      <br>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <a href="/admin/remtist/{{$t->id}}" class="btn btn-danger">Remove</a>
                </form>
                @endforeach
                <br>
                <select class="form-control" id="sel2">
                  <option value="0">Select Tistimonial</option>
                  @foreach($tists as $t)
                  <option value="{{$t->id}}">{{$t->name}}</option>
                  @endforeach
                </select>
                <br>
                <script type="text/javascript">
                    $('#sel2').change(function(){
                    @foreach($tists as $t)
                    if($('#sel2').val()=={{$t->id}}){
                        $('#frm{{$t->id}}').show();
                    }else{
                        $('#frm{{$t->id}}').hide();
                    }
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
