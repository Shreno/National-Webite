@extends('admin/master')
@section('content')
<div id="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Main Panel</li>
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
                <form action="/admin/main" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-Department">
                      <label for="group">title:</label>
                      <input type="text" class="form-control" name="title" value="{{$main->title}}">
                      <label for="group">title PT:</label>
                      <input type="text" class="form-control" name="titlept" value="{{$main->title_PT}}">
                      {{-- <input type="checkbox" name="show" {{$main->show=='1'?'checked':''}}> Show This Section --}}
                      <br>
                      <label for="group">content:</label>
                      <textarea type="text" class="form-control" name="content">{{$main->content}}</textarea>
                      <label for="group">content PT:</label>
                      <textarea type="text" class="form-control" name="contentpt">{{$main->content_PT}}</textarea>
                      <br>
                      <label for="group">Image:</label>
                      <input type="file" name="img">
                      <br>
                      <img src="{{asset('/images/main/'.$main->image)}}" width="150px">
                      <br><br>
                      {{-- <label for="group">Back-ground:</label>
                      <input type="file" name="back">
                      <br>
                      <img src="{{asset('/images/main/'.$main->background)}}" width="200px"> --}}
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
