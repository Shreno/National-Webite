@extends('admin/master')
@section('content')
<div id="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Media</li>
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
                <h4>Information</h4>
                <form action="/admin/media" method="post">
                    @csrf
                    <div class="form-Department">
                        <label for="group">Title:</label>
                        <input class="form-control" name="title" value="{{$media[0]->title}}">
                        <label for="group">Title ar:</label>
                        <input class="form-control" name="titlear" value="{{$media[1]->title}}">
                        <label for="group">Content:</label>
                      <textarea class="form-control" name="content">{{$media[0]->link}}</textarea>
                      <label for="group">Content ar:</label>
                      <textarea class="form-control" name="content">{{$media[1]->link}}</textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
                <hr>
                <h4>Add New</h4>
                <form action="/admin/addmed" method="post">
                    @csrf
                    <div class="form-Department">
                      <label for="group">Title:</label>
                      <input type="text" class="form-control" name="title">
                      <label for="group">link:</label>
                      <input type="text" class="form-control" name="link">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Add</button>
                </form>
                <hr>
                <h4>Edit</h4>
                @foreach($media as $k=>$m)
                @if($k>1)
                <form action="/admin/editmed/{{$m->id}}" method="post" id="fr{{$m->id}}" style="display: none;">
                    @csrf
                    <div class="form-Department">
                      <label for="group">Title:</label>
                      <input type="text" class="form-control" name="title" value="{{$m->title}}">
                      <label for="group">link:</label>
                      <input type="text" class="form-control" name="link" value="{{$m->link}}">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <a href="/admin/remmed/{{$m->id}}" class="btn btn-danger">Remove</a>
                </form>
                @endif
                @endforeach
                <br>
                <select class="form-control" id="perselector">
                  <option value="0">Select Media</option>
                    @foreach($media as $k=>$m)
                    @if($k>0)
                    <option value="{{$m->id}}">{{$m->title}}</option>
                    @endif
                    @endforeach
                </select>
                <br>
                <script type="text/javascript">
                    $('#perselector').change(function(){
                    @foreach($media as $k=>$m)
                    @if($k>0)
                    if($('#perselector').val()=={{$m->id}}){
                        $('#fr{{$m->id}}').show();
                    }else{
                        $('#fr{{$m->id}}').hide();
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