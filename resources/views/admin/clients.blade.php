@extends('admin/master')
@section('content')
<div id="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Partners </li>
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
                <h4>Add New Partners:</h4>
                <form action="/admin/addclient" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-Department">
                      <label for="group">logo:</label>
                      <input type="file" name="img">
                      <br>
                      <label for="group">URL:</label>
                      <input type="text" class="form-control" name="url">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Add</button>
                </form>
                <hr>
                <h4>Edit Partners:</h4>
                @foreach($clients as $c)
                <form action="/admin/editclient/{{$c->id}}" method="post" style="display: none;" id="fr{{$c->id}}">
                    @csrf
                    <div class="form-Department">
                      <label for="group">logo:</label>
                      <input type="file" name="img">
                      <br>
                      <img src="{{asset('/images/clients')}}/{{$c->image}}" width="150px">
                      <br>
                      <label for="group">URL:</label>
                      <input type="text" class="form-control" name="url" value="{{$c->url}}">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <a href="/admin/remclient/{{$c->id}}" class="btn btn-danger">Remove</a>
                </form>
                @endforeach
                <br>
                <select class="form-control" id="sel">
                  <option value="0">Select Partners</option>
                  @foreach($clients as $c)
                  <option value="{{$c->id}}">{{$c->url}}</option>
                  @endforeach
                </select>
                <br>
                <script type="text/javascript">
                    $('#sel').change(function(){
                    @foreach($clients as $c)
                    if($('#sel').val()=={{$c->id}}){
                        $('#fr{{$c->id}}').show();
                    }else{
                        $('#fr{{$c->id}}').hide();
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
