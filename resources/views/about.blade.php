    @extends('master')
    @section('content')
    @if(!session()->has('lang'))
    <!-- //main-content -->
    <!--/ab -->
    <section class="about py-lg-5 py-md-5 py-5">
        <div class="container">
            <div class="inner-sec-w3pvt py-lg-5 py-3">
                @if($aboutm[0]->icon=='1')
                <h3 class="tittle text-center mb-lg-5 mb-3 px-lg-5"><span class="sub-tittle">About.</span>{{$aboutm[0]->title}}</h3>
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
                @endif
                <!-- services -->
                <div class="fetured-info pt-lg-5">
                    <h3 class="tittle  text-center my-lg-5 my-3">
                        <span class="sub-tittle">What we do</span>
                        {{$wedo[0]->title}}
                    </h3>
                    <div class="row fetured-sec mt-lg-5 mt-3">
                        <div class="col-lg-6 p-0">
                            <div class="img-effect">
                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner" role="listbox">
                                        <div class="item active">
                                            <img class="d-block w-100 img-fluid image1" src="images/wedo/{{$wedo[0]->content}}" alt="...">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 serv_bottom feature-grids pl-lg-5">
                            <div class="featured-left text-left">
                                @foreach($wedo as $k=>$w)
                                @if($k>0)
                                <div class="bottom-gd px-3">
                                    <span class="fa {{$w->font}}" aria-hidden="true"></span>
                                    <h3 class="my-4">{{$w->title}}</h3>
                                    <p>{{$w->content}}</p>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <h3 class="tittle text-center my-lg-5 mb-3"><span class="sub-tittle">View Our</span>Recent Properties</h3>
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
        </div>
        <!-- //services -->
    </section>
    <!-- //ab -->
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
    <!--//team -->
    <section class="banner-bottom py-lg-5 py-4">
        <div class="container">
            <div class="inner-sec-w3pvt speak">
                <h3 class="tittle  text-center my-lg-5 my-3"><span class="sub-tittle">Amazing People</span> Professional Agents</h3>
                <div class="row mt-lg-5 mt-4">
                    @foreach($agents as $ag)
                    <div class="col-md-4 team-gd text-center">
                        <div class="team-img mb-4">
                            <img src="{{asset('images/agents')}}/{{$ag->image}}" class="img-fluid" alt="user-image">
                        </div>
                        <div class="team-info">
                            <h3 class="mt-md-4 mt-3"><span class="sub-tittle-team">{{$ag->role}}</span>{{$ag->name}}</h3>
                            <p></p>
                            <ul class="social_section_1info mt-md-4 mt-3">
                                @if(!empty($ag->face))
                                <li class="mb-2 facebook"><a href="{{$ag->face}}" target="blank"><i class="fa fa-facebook mr-1"></i>facebook</a></li>
                                @endif
                                @if(!empty($ag->twit))
                                <li class="mb-2 twitter"><a href="{{$ag->twit}}" target="blank"><i class="fa fa-twitter mr-1"></i>twitter</a></li>
                                @endif
                                @if(!empty($ag->google))
                                <li class="google"><a href="{{$ag->google}}" target="blank"><i class="fa fa-google-plus mr-1"></i>google</a></li>
                                @endif
                                @if(!empty($ag->in))
                                <li class="linkedin"><a href="{{$ag->in}}" target="blank"><i class="fa fa-linkedin mr-1"></i>linkedin</a></li>
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
    @if($resp->show==1)
    <!-- /hand-crafted -->
    <section class="hand-crafted py-5">
        <div class="container py-lg-5">
            <div class="row accord-info">
                <div class="col-lg-6 pl-md-5">

                    <h3 class="mb-md-5 tittle">{{$resp->title}}</h3>

                    <p>{{$resp->content}}</p>
                </div>
                <div class="col-lg-6 banner-image">
                    <div class="img-effect">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img class="d-block w-100 img-fluid image1" src="{{asset('/images/response')}}/{{$resp->image}}" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- //hand-crafted -->
    @endif

 <!-- testimonials -->                         
        <div class="container py-xl-5 py-lg-3">
            <h3 class="tittle  text-center mb-lg-5 mb-3"><span class="sub-tittle">Clients Reviews</span> What Our Clients Say</h3>
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
    <!-- //main-content -->
    <!--/ab -->
    <section class="about py-lg-5 py-md-5 py-5">
        <div class="container">
            <div class="inner-sec-w3pvt py-lg-5 py-3">
                @if($aboutm[0]->icon=='1')
                <h3 class="tittle text-center mb-lg-5 mb-3 px-lg-5"><span class="sub-tittle">عن الشركة.</span>{{$aboutm[0]->title_ar}}</h3>
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
                @endif
                <!-- services -->
                <div class="fetured-info pt-lg-5">
                    <h3 class="tittle  text-center my-lg-5 my-3">
                        <span class="sub-tittle">ما نقوم بة.</span>
                        {{$wedo[0]->title_ar}}
                    </h3>
                    <div class="row fetured-sec mt-lg-5 mt-3">
                        <div class="col-lg-6 p-0">
                            <div class="img-effect">
                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner" role="listbox">
                                        <div class="item active">
                                            <img class="d-block w-100 img-fluid image1" src="images/wedo/{{$wedo[0]->content}}" alt="...">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 serv_bottom feature-grids pl-lg-5">
                            <div class="featured-left text-left">
                                @foreach($wedo as $k=>$w)
                                @if($k>0)
                                <div class="bottom-gd px-3">
                                    <span class="fa {{$w->font}}" aria-hidden="true"></span>
                                    <h3 class="my-4">{{$w->title_ar}}</h3>
                                    <p>{{$w->content_ar}}</p>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <h3 class="tittle text-center my-lg-5 mb-3"><span class="sub-tittle">إطلع على</span>أخر مشروعاتنا</h3>
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
        </div>
        <!-- //services -->
    </section>
    <!-- //ab -->
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
    <!--//team -->
    <section class="banner-bottom py-lg-5 py-4">
        <div class="container">
            <div class="inner-sec-w3pvt speak">
                <h3 class="tittle  text-center my-lg-5 my-3"><span class="sub-tittle">أشخاص رائعون</span> عملاء محترفين</h3>
                <div class="row mt-lg-5 mt-4">
                    @foreach($agents as $ag)
                    <div class="col-md-4 team-gd text-center">
                        <div class="team-img mb-4">
                            <img src="{{asset('images/agents')}}/{{$ag->image}}" class="img-fluid" alt="user-image">
                        </div>
                        <div class="team-info">
                            <h3 class="mt-md-4 mt-3"><span class="sub-tittle-team">{{$ag->role_ar}}</span>{{$ag->name_ar}}</h3>
                            <p></p>
                            <ul class="social_section_1info mt-md-4 mt-3">
                                @if(!empty($ag->face))
                                <li class="mb-2 facebook"><a href="{{$ag->face}}" target="blank"><i class="fa fa-facebook mr-1"></i>facebook</a></li>
                                @endif
                                @if(!empty($ag->twit))
                                <li class="mb-2 twitter"><a href="{{$ag->twit}}" target="blank"><i class="fa fa-twitter mr-1"></i>twitter</a></li>
                                @endif
                                @if(!empty($ag->google))
                                <li class="google"><a href="{{$ag->google}}" target="blank"><i class="fa fa-google-plus mr-1"></i>google</a></li>
                                @endif
                                @if(!empty($ag->in))
                                <li class="linkedin"><a href="{{$ag->in}}" target="blank"><i class="fa fa-linkedin mr-1"></i>linkedin</a></li>
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
    @if($resp->show==1)
    <!-- /hand-crafted -->
    <section class="hand-crafted py-5">
        <div class="container py-lg-5">
            <div class="row accord-info">
                <div class="col-lg-6 pl-md-5">

                    <h3 class="mb-md-5 tittle">{{$resp->title_ar}}</h3>

                    <p>{{$resp->content_ar}}</p>
                </div>
                <div class="col-lg-6 banner-image">
                    <div class="img-effect">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img class="d-block w-100 img-fluid image1" src="{{asset('/images/response')}}/{{$resp->image}}" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- //hand-crafted -->
    @endif

 <!-- testimonials -->                         
        <div class="container py-xl-5 py-lg-3">
            <h3 class="tittle  text-center mb-lg-5 mb-3"><span class="sub-tittle">آراء العملاء</span> ماذا قالو عنا</h3>
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