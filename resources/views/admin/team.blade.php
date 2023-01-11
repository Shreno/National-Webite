@extends('admin/master')
@section('content')
<div id="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Team Section</li>
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
	      		<form action="/admin/addteam" method="post" enctype="multipart/form-data">
	      			@csrf
	      			<div class="form-Department">
	                  <label for="group">Name:</label>
	                  <input type="text" class="form-control" name="name">
	                  <label for="group">Name ar:</label>
	                  <input type="text" class="form-control" name="namear">
	                  <label for="group">role:</label>
	                  <input type="text" class="form-control" name="role">
	                  <label for="group">role ar:</label>
	                  <input type="text" class="form-control" name="rolear">
	                  <label for="group">description:</label>
	                  <input type="text" class="form-control" name="desc">
	                  <label for="group">description ar:</label>
	                  <input type="text" class="form-control" name="descar">
	                  <label for="group">FaceBook Link:</label>
	                  <input type="text" class="form-control" name="face">
	                  <label for="group">Twitter Link:</label>
	                  <input type="text" class="form-control" name="twit">
	                  <label for="group">Google+ Link:</label>
	                  <input type="text" class="form-control" name="goog">
	                  <label for="group">Linked-In Link:</label>
	                  <input type="text" class="form-control" name="in">
	                  <br>
	                  <label for="group">Image:</label>
	                  <input type="file" name="img">
	              	</div>
	              	<br>
	      			<button type="submit" class="btn btn-success">Add</button>
	      		</form>
	      		<hr>
	      		<h4>Edit</h4>
	      		@foreach($team as $tem)
	      		<form action="/admin/editteam/{{$tem->id}}" method="post" enctype="multipart/form-data" id="fr{{$tem->id}}" style="display: none;">
	      			@csrf
	      			<div class="form-Department">
	                  <label for="group">Name:</label>
	                  <input type="text" class="form-control" name="name" value="{{$tem->name}}">
	                  <label for="group">Name ar:</label>
	                  <input type="text" class="form-control" name="namear" value="{{$tem->name_ar}}">
	                  <label for="group">role:</label>
	                  <input type="text" class="form-control" name="role" value="{{$tem->role}}">
	                  <label for="group">role ar:</label>
	                  <input type="text" class="form-control" name="rolear" value="{{$tem->role_ar}}">
	                  <label for="group">description:</label>
	                  <input type="text" class="form-control" name="desc" value="{{$tem->description}}">
	                  <label for="group">description ar:</label>
	                  <input type="text" class="form-control" name="descar" value="{{$tem->description_ar}}">
	                  <label for="group">FaceBook Link:</label>
	                  <input type="text" class="form-control" name="face" value="{{$tem->face}}">
	                  <label for="group">Twitter Link:</label>
	                  <input type="text" class="form-control" name="twit" value="{{$tem->twit}}">
	                  <label for="group">Google+ Link:</label>
	                  <input type="text" class="form-control" name="goog" value="{{$tem->google}}">
	                  <label for="group">Linked-In Link:</label>
	                  <input type="text" class="form-control" name="in" value="{{$tem->in}}">
	                  <br>
	                  <label for="group">Image:</label>
	                  <input type="file" name="img">
	                  <br>
	                  <img src="{{asset('/images/team/'.$tem->image)}}" width="150px">
	              	</div>
	              	<br>
	      			<button type="submit" class="btn btn-primary">Edit</button>
	      			<a href="/admin/remteam/{{$tem->id}}" class="btn btn-danger">Remove</a>
	      		</form>
	      		@endforeach
	      		<br>
	      		<select class="form-control" id="perselector">
				  <option value="0">Select Person</option>
				  @foreach($team as $tem)
				  <option value="{{$tem->id}}">{{$tem->name}}</option>
				  @endforeach
				</select>
				<br>
				<script type="text/javascript">
					$('#perselector').change(function(){
					@foreach($team as $tem)
					if($('#perselector').val()=={{$tem->id}}){
						$('#fr{{$tem->id}}').show();
					}else{
						$('#fr{{$tem->id}}').hide();
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