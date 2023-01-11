@extends('admin/master')
@section('content')
<div id="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Responsabilty Section</li>
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
                <form action="/admin/response" method="post" enctype="multipart/form-data">
                @csrf
                  <div class="form-Department">
                      <label for="group">Title:</label>
                      <input class="form-control" name="title" value="{{$response->title}}">
                      <label for="group">Title ar:</label>
                      <input class="form-control" name="titlear" value="{{$response->title_ar}}">
                      <input type="checkbox" name="show" {{$response->show=='1'?'checked':''}}>Show This Section
                      <br>
                      <label for="group">Content:</label>
                      <textarea class="form-control" name="content">{{$response->content}}</textarea>
                      <label for="group">Content ar:</label>
                      <textarea class="form-control" name="contentar">{{$response->content_ar}}</textarea>
                      <label for="group">Image:</label>
                      <input type="file" name="img">
                      <br>
                      <img src="{{asset('/images/response')}}/{{$response->image}}" width="150px">
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