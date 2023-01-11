@extends('admin/master')
@section('content')
<div id="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Contact Page</li>
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
                <form action="/admin/contact" method="post">
                @csrf
                  <div class="form-Department">
                      <label for="group">content:</label>
                      <textarea class="form-control" name="content" >{{$contact->content}}</textarea>
                      <label for="group">content PT:</label>
                      <textarea class="form-control" name="content_pt" >{{$contact->content_PT}}</textarea>
                      <label for="group">Map:</label>
                      <textarea class="form-control" name="map">{{$contact->map}}</textarea>
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
