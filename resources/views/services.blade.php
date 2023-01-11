@extends('master')
@section('content')
@if(!session()->has('lang'))
<!-- //main-content -->
<!--/ab -->
<section class="about py-lg-5 py-md-5 py-5">
    <div class="container">
        <div class="inner-sec-w3pvt py-lg-5 py-3">
			<h3 class="tittle text-center mb-lg-5 mb-3 px-lg-5">Services</h3>
			<div class="feature-grids row mt-3 mb-lg-5 mb-3 text-center">
			    @for($i=1;$i<=3;$i++)
			    <div class="col-lg-4" data-aos="fade-up">
			        <div class="bottom-gd px-3">
			            <span class="fa {{$aboutm[$i]->icon}}" aria-hidden="true"></span>
			            <h3 class="my-4">{{$aboutm[$i]->title}}</h3>
			            <p>{{$aboutm[$i]->content}}</p>
			        </div>
			    </div>
			    @endfor
			</div>
		</div>
	</div>
</section>
@else
<!-- //main-content -->
<!--/ab -->
<section class="about py-lg-5 py-md-5 py-5">
    <div class="container">
        <div class="inner-sec-w3pvt py-lg-5 py-3">
			<h3 class="tittle text-center mb-lg-5 mb-3 px-lg-5">الخدمات</h3>
			<div class="feature-grids row mt-3 mb-lg-5 mb-3 text-center">
			    @for($i=1;$i<=3;$i++)
			    <div class="col-lg-4" data-aos="fade-up">
			        <div class="bottom-gd px-3">
			            <span class="fa {{$aboutm[$i]->icon}}" aria-hidden="true"></span>
			            <h3 class="my-4">{{$aboutm[$i]->title_ar}}</h3>
			            <p>{{$aboutm[$i]->content_ar}}</p>
			        </div>
			    </div>
			    @endfor
			</div>
		</div>
	</div>
</section>
@endif
@stop