@extends('admin/master')
@section('content')
<div id="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Statistics Section</li>
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
                <h4>Add New</h4>
                <form action="/admin/addstat" method="post">
                    @csrf
                    <div class="form-Department">
                      <label for="group">title:</label>
                      <input type="text" class="form-control" name="title">
                      <label for="group">title ar:</label>
                      <input type="text" class="form-control" name="titlear">
                      <label for="group">Number:</label>
                      <input type="text" class="form-control" name="num">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Add</button>
                </form>
                <hr>
                <h4>Edit</h4>
                @foreach($stat as $st)
                <form action="/admin/editstat/{{$st->id}}" method="post" id="fr{{$st->id}}" style="display: none;">
                    @csrf
                    <div class="form-Department">
                      <label for="group">title:</label>
                      <input type="text" class="form-control" name="title" value="{{$st->title}}">
                      <label for="group">title ar:</label>
                      <input type="text" class="form-control" name="titlear" value="{{$st->title_ar}}">
                      <label for="group">Number:</label>
                      <input type="text" class="form-control" name="num" value="{{$st->num}}">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <a href="/admin/remstat/{{$st->id}}" class="btn btn-danger">Remove</a>
                </form>
                @endforeach
                <br>
                <select class="form-control" id="statselector">
                  <option value="0">Select Statistics</option>
                  @foreach($stat as $st)
                  <option value="{{$st->id}}">{{$st->title}}</option>
                  @endforeach
                </select>
                <br>
                <script type="text/javascript">
                    $('#statselector').change(function(){
                    @foreach($stat as $st)
                    if($('#statselector').val()=={{$st->id}}){
                        $('#fr{{$st->id}}').show();
                    }else{
                        $('#fr{{$st->id}}').hide();
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