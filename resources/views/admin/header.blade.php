@extends('admin/master')
@section('content')
<div id="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Header & Footer</li>
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
                <form action="/admin/header" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-Department">
                    <label for="group">Logo:</label>
                    <img  height="100px" width="200px" src="{{ asset('/images/logo/'.$header[8]->value .'') }}" alt="">
                    <input type="file" class="form-control" name="logo" value="">
                      <label for="group">phone:</label>
                      <input type="text" class="form-control" name="phone" value="{{$header[0]->value}}">
                      <label for="group">Address:</label>
                      <input type="text" class="form-control" name="addr" value="{{$header[1]->value}}">
                      <label for="group">Address PT:</label>
                      <input type="text" class="form-control" name="addrpt" value="{{$header[8]->value}}">
                      <label for="group">email:</label>
                      <input type="text" class="form-control" name="email" value="{{$header[2]->value}}">
                      <label for="group">fax:</label>
                      <input type="text" class="form-control" name="fax" value="{{$header[3]->value}}">
                      <label for="group">facebook:</label>
                      <input type="text" class="form-control" name="face" value="{{$header[4]->value}}">
                      <label for="group">twitter:</label>
                      <input type="text" class="form-control" name="twit" value="{{$header[5]->value}}">
                      <label for="group">youtube:</label>
                      <input type="text" class="form-control" name="goog" value="{{$header[6]->value}}">
                      <label for="group">linkedin:</label>
                      <input type="text" class="form-control" name="in" value="{{$header[7]->value}}">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
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
