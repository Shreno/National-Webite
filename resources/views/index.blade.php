@extends('master')
@section('content')
@if(!session()->has('lang'))
<!-- banner -->
        <section class="banner">
            <div class="container">
                <div class="row banner-grids">
                    <div class="col-lg-6 banner-info-w3ls">
                        <h2>
                        </h2>
                        <h3 class="mb-3">{{$main->title}}</h3>
                        <p class="mb-4">{{$main->content}}</p>
                        <a href="/about" class="btn">Read More</a>
                    </div>
                    <div class="col-lg-6 banner-image">
                        <div class="img-effect">
                            <img src="images/main/{{$main->image}}" alt="" class="img-fluid image1">
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- //banner -->
    </div>
    @if($compprof[0]->icon=='1')
    <!--/ab -->
    <section class="about py-lg-5 py-md-5 py-5">
        <div class="container">
            <div class="inner-sec-w3pvt py-lg-5 py-3">
                <h3 class="tittle text-center mb-lg-5 mb-3 px-lg-5">
                    <span class="sub-tittle">Company profile.</span>
                    {{$compprof[0]->title}}
                </h3>
                <div class="feature-grids row mt-3 mb-lg-5 mb-3 text-center">
                    @for($i=1;$i<=3;$i++)
                    <div class="col-lg-4" data-aos="fade-up">
                        <div class="bottom-gd px-3">
                            <span class="fa {{$compprof[$i]->icon}}" aria-hidden="true"></span>
                            <h3 class="my-4">{{$compprof[$i]->title}}</h3>
                            <p>{{$compprof[$i]->content}}</p>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
        
    </section>
    <!-- //ab -->
    @endif
      <!--//team -->
    <section class="banner-bottom py-lg-5 py-4">
        <div class="container">
            <div class="inner-sec-w3pvt speak">
                <h3 class="tittle  text-center my-lg-5 my-3"><span class="sub-tittle">EBEM Employee</span> Professional Team</h3>
                <div class="row mt-lg-5 mt-4">
                    @foreach($team as $t)
                    <div class="col-md-4 team-gd text-center">
                        <div class="team-img mb-4">
                            <img src="images/team/{{$t->image}}" class="img-fluid" alt="user-image">
                        </div>
                        <div class="team-info">
                            <h3 class="mt-md-4 mt-3"><span class="sub-tittle-team">{{$t->role}}</span>{{$t->name}}</h3>
                            <p></p>
                            <ul class="social_section_1info mt-md-4 mt-3">
                                @if(!empty($t->face))
                                <li class="mb-2 facebook"><a href="{{$t->face}}" target="blank"><i class="fa fa-facebook mr-1"></i>facebook</a></li>
                                @endif
                                @if(!empty($t->twit))
                                <li class="mb-2 twitter"><a href="{{$t->twit}}" target="blank"><i class="fa fa-twitter mr-1"></i>twitter</a></li>
                                @endif
                                @if(!empty($t->google))
                                <li class="google"><a href="{{$t->google}}" target="blank"><i class="fa fa-google-plus mr-1"></i>google</a></li>
                                @endif
                                @if(!empty($t->in))
                                <li class="linkedin"><a href="{{$t->in}}" target="blank"><i class="fa fa-linkedin mr-1"></i>linkedin</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>


            </div>
        </div>
    </section>
    <!--//team -->
    @if(count($stat)>0)
    <!--/counter-->
    <section class="stats py-lg-5 py-4">
        <div class="container">
            <div class="row text-center">
                @foreach($stat as $st)
                <div class="col">
                    <div class="counter">
                        <h3 class="timer count-title count-number">{{$st->num}}</h3>
                        <p class="count-text">{{$st->title}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--//counter-->
   @endif
    <!-- Company History-->
    <div class="middle-tem-insidel pt-lg-5">
        <div class="progress-info">

            <!-- slides images -->
            <div class="slide-img" id="masthead" style="background-image: url(../images/slide/{{$hist[1]->content}});">

            </div>
            <!-- //slides images -->

            <div class="left-build-main-temps">
                <h3 class="tittle  text-left my-lg-5 my-3"><span class="sub-tittle"></span>{{$hist[0]->font}}</h3>
                <h4 class="">
                    <span class="sub-tittle">Who we are?</span>
                    {{$hist[0]->content}}
                </h4>
                <ul class="tic-info list-unstyled">
                    @foreach($hist as $k=>$h)
                    @if($k>1)
                    <li class="progress-tittle">
                        <span class="fa {{$h->font}}"> {{$h->year}}</span>
                        {{$h->content}}
                    </li>
                    @endif
                    @endforeach
                </ul>




            </div>
            <div class="clearfix"></div>
        </div>

        
    </div>
    <!--//Company History -->
    @if($mission->show==1)
     <!-- /hand-crafted -->
    <section class="hand-crafted py-5">
        <div class="container py-lg-5">
            <div class="row accord-info">
                <div class="col-lg-6 pl-md-5">

                    <h3 class="mb-md-5 tittle">{{$mission->title}}</h3>

                    <p><?php echo $mission->content; ?></p>
                </div>
                <div class="col-lg-6 banner-image">
                    <div class="img-effect">
                        <!--<img src="images/img3.jpg" alt="" class="img-fluid image1">-->
                   <iframe class="img-effect " width="560" height="315" src="{{$mission->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- //hand-crafted -->
    @endif
     <!-- testimonials -->
    <div class="testimonials py-md-5 py-5">
    <div class="footer-grid_section my-lg-5 text-center">
                    <div class="footer-title-w3pvt mb-4">
                        <h3>Our Clients</h3>
                    </div>
                    <ul class="d-flex list-unstyled foot-bottom-last">
                        @foreach($clients as $c)
                        <li class="mr-2">
                            <a href="{{$c->url}}" target="blank">
                                <img src="images/clients/{{$c->image}}" alt="" class="img-fluid image1" width="200px">
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
        <div class="container py-xl-5 py-lg-3">
            <h3 class="tittle  text-center mb-lg-5 mb-3"><span class="sub-tittle">Testimonials</span> </h3>

            <div class="testimonials_grid_w3ls mt-lg-0 mt-4">
                @foreach($tists as $tist)
                <div class="p-md-5 p-4">
                    <p class="sub-test">
                        <span class="fa fa-quote-left" aria-hidden="true"></span>{{$tist->content}}
                    </p>
                    <div class="row mt-4">
                        <div class="col-3 testi-img-res">
                            <img src="images/tistimonials/{{$tist->image}}" alt="" class="img-fluid" />
                        </div>
                        <div class="col-9 testi_grid mt-xl-3 mt-lg-2 mt-md-4 mt-2">
                            <h5 class="mb-2">{{$tist->name}}</h5>
                            <p>{{$tist->company}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
        
    </div>
    <!-- //testimonials -->
    @else
    <!-- banner -->
        <section class="banner">
            <div class="container">
                <div class="row banner-grids">
                    <div class="col-lg-6 banner-info-w3ls">
                        <h2>
                        </h2>
                        <h3 class="mb-3">{{$main->title_ar}}</h3>
                        <p class="mb-4">{{$main->content_ar}}</p>
                        <a href="/about" class="btn">إقرأ المزيد</a>
                    </div>
                    <div class="col-lg-6 banner-image">
                        <div class="img-effect">
                            <img src="images/main/{{$main->image}}" alt="" class="img-fluid image1">
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- //banner -->
    </div>
    @if($compprof[0]->icon=='1')
    <!--/ab -->
    <section class="about py-lg-5 py-md-5 py-5">
        <div class="container">
            <div class="inner-sec-w3pvt py-lg-5 py-3">
                <h3 class="tittle text-center mb-lg-5 mb-3 px-lg-5">
                    <span class="sub-tittle">تعريف الشركة .</span>
                    {{$compprof[0]->title_ar}}
                </h3>
                <div class="feature-grids row mt-3 mb-lg-5 mb-3 text-center">
                    @for($i=1;$i<=3;$i++)
                    <div class="col-lg-4" data-aos="fade-up">
                        <div class="bottom-gd px-3">
                            <span class="fa {{$compprof[$i]->icon}}" aria-hidden="true"></span>
                            <h3 class="my-4">{{$compprof[$i]->title_ar}}</h3>
                            <p>{{$compprof[$i]->content_ar}}</p>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
        
    </section>
    <!-- //ab -->
    @endif
      <!--//team -->
    <section class="banner-bottom py-lg-5 py-4">
        <div class="container">
            <div class="inner-sec-w3pvt speak">
                <h3 class="tittle  text-center my-lg-5 my-3"><span class="sub-tittle">الموظفون</span> فريق محترف</h3>
                <div class="row mt-lg-5 mt-4">
                    @foreach($team as $t)
                    <div class="col-md-4 team-gd text-center">
                        <div class="team-img mb-4">
                            <img src="images/team/{{$t->image}}" class="img-fluid" alt="user-image">
                        </div>
                        <div class="team-info">
                            <h3 class="mt-md-4 mt-3"><span class="sub-tittle-team">{{$t->role_ar}}</span>{{$t->name_ar}}</h3>
                            <p></p>
                            <ul class="social_section_1info mt-md-4 mt-3">
                                @if(!empty($t->face))
                                <li class="mb-2 facebook"><a href="{{$t->face}}" target="blank"><i class="fa fa-facebook mr-1"></i>facebook</a></li>
                                @endif
                                @if(!empty($t->twit))
                                <li class="mb-2 twitter"><a href="{{$t->twit}}" target="blank"><i class="fa fa-twitter mr-1"></i>twitter</a></li>
                                @endif
                                @if(!empty($t->google))
                                <li class="google"><a href="{{$t->google}}" target="blank"><i class="fa fa-google-plus mr-1"></i>google</a></li>
                                @endif
                                @if(!empty($t->in))
                                <li class="linkedin"><a href="{{$t->in}}" target="blank"><i class="fa fa-linkedin mr-1"></i>linkedin</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>


            </div>
        </div>
    </section>
    <!--//team -->
    @if(count($stat)>0)
    <!--/counter-->
    <section class="stats py-lg-5 py-4">
        <div class="container">
            <div class="row text-center">
                @foreach($stat as $st)
                <div class="col">
                    <div class="counter">
                        <h3 class="timer count-title count-number">{{$st->num}}</h3>
                        <p class="count-text">{{$st->title_ar}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--//counter-->
   @endif
    <!-- Company History-->
    <div class="middle-tem-insidel pt-lg-5">
        <div class="progress-info">

            <!-- slides images -->
            <div class="slide-img" id="masthead" style="background-image: url(../images/slide/{{$hist[1]->content}});">

            </div>
            <!-- //slides images -->

            <div class="left-build-main-temps">
                <h3 class="tittle  my-lg-5 my-3"><span class="sub-tittle"></span>{{$hist[1]->font}}</h3>
                <h4 class="">
                    <span class="sub-tittle">من نحن ؟</span>
                    {{$hist[0]->content_ar}}
                </h4>
                <ul class="tic-info list-unstyled">
                    @foreach($hist as $k=>$h)
                    @if($k>1)
                    <li class="progress-tittle">
                        <span class="fa {{$h->font}}"> {{$h->year}}</span>
                        {{$h->content_ar}}
                    </li>
                    @endif
                    @endforeach
                </ul>




            </div>
            <div class="clearfix"></div>
        </div>

        
    </div>
    <!--//Company History -->
    @if($mission->show==1)
     <!-- /hand-crafted -->
    <section class="hand-crafted py-5">
        <div class="container py-lg-5">
            <div class="row accord-info">
                <div class="col-lg-6 pl-md-5">

                    <h3 class="mb-md-5 tittle">{{$mission->title_ar}}</h3>

                    <p><?php echo $mission->content_ar; ?></p>
                </div>
                <div class="col-lg-6 banner-image">
                    <div class="img-effect">
                        <!--<img src="images/img3.jpg" alt="" class="img-fluid image1">-->
                   <iframe class="img-effect " width="560" height="315" src="{{$mission->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- //hand-crafted -->
    @endif
     <!-- testimonials -->
    <div class="testimonials py-md-5 py-5">
    <div class="footer-grid_section my-lg-5 text-center">
                    <div class="footer-title-w3pvt mb-4">
                        <h3>عملاؤنا</h3>
                    </div>
                    <ul class="d-flex list-unstyled foot-bottom-last">
                        @foreach($clients as $c)
                        <li class="mr-2">
                            <a href="{{$c->url}}" target="blank">
                                <img src="images/clients/{{$c->image}}" alt="" class="img-fluid image1" width="200px">
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
        <div class="container py-xl-5 py-lg-3">
            <h3 class="tittle  text-center mb-lg-5 mb-3"><span class="sub-tittle">التوصيات</span> </h3>

            <div class="testimonials_grid_w3ls mt-lg-0 mt-4">
                @foreach($tists as $tist)
                <div class="p-md-5 p-4">
                    <p class="sub-test">
                        <span class="fa fa-quote-left" aria-hidden="true"></span>{{$tist->content_ar}}
                    </p>
                    <div class="row mt-4">
                        <div class="col-3 testi-img-res">
                            <img src="images/tistimonials/{{$tist->image}}" alt="" class="img-fluid" />
                        </div>
                        <div class="col-9 testi_grid mt-xl-3 mt-lg-2 mt-md-4 mt-2">
                            <h5 class="mb-2">{{$tist->name_ar}}</h5>
                            <p>{{$tist->company_ar}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
        
    </div>
    <!-- //testimonials -->
    @endif
@stop