@extends('admin/master')
@section('content')
<div id="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">About Page Main Panel</li>
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
	          <form action="{{ url('/admin/aboutmain') }}" method="post">
	          	@csrf
	              <div class="form-Department">
	                  <label for="group">Title:</label>
	                  <textarea class="form-control" id="Department" placeholder="We accomplished many..." name="title">{{$aboutm[0]->title}}</textarea>
	                  <label for="group">Title PT:</label>
	                  <textarea class="form-control" id="Department" placeholder="We accomplished many..." name="titlept">{{$aboutm[0]->title_PT}}</textarea>
	                  <input type="checkbox" name="show" {{$aboutm[0]->icon=='1'?'checked':''}}> Show This Section
	              </div>
	              <br>
	              @for($i=1;$i<=3;$i++)
	              <hr>
	              <h4>Block {{$i}}</h4>

				  	<div class="form-Department">
	                  <label for="group">Block {{$i}} Title:</label>
	                  <input type="text" class="form-control" placeholder="Almarai Juice Plant.." name="block{{$i}}title" value="{{$aboutm[$i]->title}}">
	                  <label for="group">Block {{$i}} Title PT:</label>
	                  <input type="text" class="form-control" placeholder="Almarai Juice Plant.." name="block{{$i}}titlept" value="{{$aboutm[$i]->title_PT}}">
	                  <label for="group">Block {{$i}} Content:</label>
	                  <textarea class="form-control" placeholder="at Alkharj (scope: MV & LV pa.." name="block{{$i}}content">{{$aboutm[$i]->content}}</textarea>
	                  <label for="group">Block {{$i}} Content PT:</label>
	                  <textarea class="form-control" placeholder="at Alkharj (scope: MV & LV pa.." name="block{{$i}}contentpt">{{$aboutm[$i]->content_PT}}</textarea>
	                  @endfor
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
