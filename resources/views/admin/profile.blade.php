@extends('admin/master')
@section('content')
<div id="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/admin">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Profile Section</li>
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
	          <form action="/admin/profile" method="post">
	          	@csrf
	              <div class="form-Department">
	                  <label for="group">Title:</label>
	                  <textarea class="form-control" id="Department" placeholder="We accomplished many..." name="title">{{$prof[0]->title}}</textarea>
	                  <label for="group">Title ar:</label>
	                  <textarea class="form-control" id="Department" placeholder="We accomplished many..." name="titlear">{{$prof[0]->title_ar}}</textarea>
	                  <input type="checkbox" name="show" {{$prof[0]->icon=='1'?'checked':''}}> Show This Section
	              </div>
	              <br>
	              @for($i=1;$i<=3;$i++)
	              <hr>
	              <h4>Block {{$i}}</h4>
	              	<label for="stitle">Block Awesome (Icon)</label>
				    <input type="text" class="form-control" id="ico{{$i}}" placeholder="Block Icon" name="b{{$i}}ic" value="{{$prof[$i]->icon}}" hidden>
				    <div class="dropdown">
					    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Icons
					    <span class="caret"></span></button>
					    <ul class="dropdown-menu" style="overflow:scroll; height:400px;">
					    	<?php $j=0; ?>
					    	@foreach($icons as $icon)
					    	@if($j%9==0)
					      	<li>
					      	@endif
					      		<i class="icons fa {{$icon->icon}}" id="i{{$i}}c{{$icon->id}}"></i>
					      	@if($j+10%9==0)
					      	</li>
					      	@endif
					      	<?php $j++; ?>
					      	@endforeach
					    </ul>
				  	</div>
				  	<script type="text/javascript">
				  		@foreach($icons as $icon)
				  		$('#i{{$i}}c{{$icon->id}}').click(function(){
				  			$('#ico{{$i}}').val("{{$icon->icon}}");
				  		});
				  		@endforeach
				  	</script>
				  	<div class="form-Department">
	                  <label for="group">Block {{$i}} Title:</label>
	                  <input type="text" class="form-control" placeholder="Almarai Juice Plant.." name="block{{$i}}title" value="{{$prof[$i]->title}}">
	                  <label for="group">Block {{$i}} Title ar:</label>
	                  <input type="text" class="form-control" placeholder="Almarai Juice Plant.." name="block{{$i}}titlear" value="{{$prof[$i]->title_ar}}">
	                  <label for="group">Block {{$i}} Content:</label>
	                  <textarea class="form-control" placeholder="at Alkharj (scope: MV & LV pa.." name="block{{$i}}content">{{$prof[$i]->content}}</textarea>
	                  <label for="group">Block {{$i}} Content ar:</label>
	                  <textarea class="form-control" placeholder="at Alkharj (scope: MV & LV pa.." name="block{{$i}}contentar">{{$prof[$i]->content_ar}}</textarea>
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