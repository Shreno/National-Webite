@extends('master')
@section('content')
@if(!session()->has('lang'))
<!-- //main-content -->
<!--/ab -->

<div class="inner-sec-w3pvt py-lg-5 py-3">
    <h3 class="tittle text-center mb-lg-5 mb-3 px-lg-5">Health and Safety</h3>
                
        <div class="row fetured-sec mt-lg-5 mt-3">
        <div class="col-lg-6 serv_bottom feature-grids pl-lg-5">
                <div class="featured-left text-left">
                    <div class="bottom-gd px-3">
                      
                        <p>{{$hel->content}}</p>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="img-effect">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <img class="d-block w-100 img-fluid image1" src="{{asset('/images/health')}}/{{$hel->image}}" alt="...">
                                      </div>
                                </div>
                            </div>
                        </div>

            </div>
            

        </div>
        
</div>

<!-- //ab -->
@else
<!-- //main-content -->
<!--/ab -->

<div class="inner-sec-w3pvt py-lg-5 py-3">
    <h3 class="tittle text-center mb-lg-5 mb-3 px-lg-5">الصحة والأمان</h3>
                
        <div class="row fetured-sec mt-lg-5 mt-3">
        <div class="col-lg-6 serv_bottom feature-grids pl-lg-5">
                <div class="featured-left text-left">
                    <div class="bottom-gd px-3">
                      
                        <p>{{$hel->content_ar}}</p>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="img-effect">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <img class="d-block w-100 img-fluid image1" src="{{asset('/images/health')}}/{{$hel->image}}" alt="...">
                                      </div>
                                </div>
                            </div>
                        </div>

            </div>
            

        </div>
        
</div>

<!-- //ab -->
@endif
@stop