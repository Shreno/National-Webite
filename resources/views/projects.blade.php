@extends('master')
@section('content')
@if(!session()->has('lang'))
<!-- //main-content -->
<!--/ab -->
<section class="about py-lg-5 py-md-5 py-5">
    <div class="container">
        
           
            <!-- services -->
            <div class="fetured-info pt-lg-5">
               <h3 class="tittle text-center my-lg-5 mb-3">Projects List</h3>
                <div class="row mid-slide">
                    @foreach($pro as $p)
                    <div class="col-lg-4 featured-content">
                        <a href="/project/{{$p->id}}">
                            <img src="images/projects/{{$p->image}}" alt="" class="img-fluid image1">
                        </a>
                        <span class="money">${{$p->price}}</span>
                        <!--/Property_info-->
                        <div class="property-info-list">
                            <div class="detail">
                                <h4 class="title">
                                    <a href="/project/{{$p->id}}">{{$p->title}}</a>
                                </h4>
                                <div class="location mt-2">
                                    <a href="#">
                               <span class="fa fa-map-marker"></span> {{$p->address}}
                            </a>
                                </div>
                                <ul class="facilities-list clearfix">
                                    <li>
                                        <span class="fa fa-home"></span> {{$p->el1}}
                                    </li>
                                    <li>
                                        <span class="fa fa-building"></span> {{$p->el2}}
                                    </li>
                                    <li>
                                        <span class="fa fa-building-o"></span> {{$p->el3}}
                                    </li>
                                    <li>
                                        <span class="fa fa-building-o"></span> {{$p->el4}}
                                    </li>
                                </ul>
                            </div>
                            <div class="footer-properties">
                                <a class="admin" href="#">
                            <!--<span class="fa fa-user"></span> By: Eng. Ahmed Ali-->
                        </a>
                                <span class="year text-right"> <span class="fa fa-calendar"></span> {{$p->time}}</span>

                            </div>
                        </div>
                        <!--//Property_info-->
                    </div>
                    @endforeach
                </div>
            </div>

      
    </div>
    <!-- //services -->
</section>
@else
<!-- //main-content -->
<!--/ab -->
<section class="about py-lg-5 py-md-5 py-5">
    <div class="container">
        
           
            <!-- services -->
            <div class="fetured-info pt-lg-5">
               <h3 class="tittle text-center my-lg-5 mb-3">قائمة المشروعات</h3>
                <div class="row mid-slide">
                    @foreach($pro as $p)
                    <div class="col-lg-4 featured-content">
                        <a href="/project/{{$p->id}}">
                            <img src="images/projects/{{$p->image}}" alt="" class="img-fluid image1">
                        </a>
                        <span class="money">${{$p->price}}</span>
                        <!--/Property_info-->
                        <div class="property-info-list">
                            <div dir="rtl" class="detail">
                                <h4 style="float:right" class="title">
                                    <a href="/project/{{$p->id}}">{{$p->title_ar}}</a>
                                </h4>
                                <br>
                                <div style="float:right" class="location mt-2">
                                    <a href="#">
                                        <span  class="fa fa-map-marker"></span>{{$p->address_ar}}
                                    </a>
                                </div> <br>
                                <ul class="facilities-list clearfix">
                                    <li>
                                        <span class="fa fa-home"></span> {{$p->el1ar}}
                                    </li>
                                    <li>
                                        <span class="fa fa-building"></span> {{$p->el2ar}}
                                    </li>
                                    <li>
                                        <span class="fa fa-building-o"></span> {{$p->el3ar}}
                                    </li>
                                    <li>
                                        <span class="fa fa-building-o"></span> {{$p->el4ar}}
                                    </li>
                                </ul>
                            </div>
                            <div class="footer-properties">
                                <a class="admin" href="#">
                                    <span class="fa fa-user"></span>
                                </a>
                                <span class="year text-right"> <span class="fa fa-calendar"></span> {{$p->time_ar}}</span>

                            </div>
                        </div>
                        <!--//Property_info-->
                    </div>
                    @endforeach
                </div>
            </div>

      
    </div>
    <!-- //services -->
</section>
@endif
@stop