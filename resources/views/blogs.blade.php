@extends('master')
@section('content')
@if(!session()->has('lang'))
<!-- //main-content -->
<!--/ab -->
<section class="about py-lg-5 py-md-5 py-5">
    <div class="container">
        <div class="inner-sec-w3pvt py-lg-5">
            <div class="blog-sec">
                <h3 class="tittle text-center mb-lg-5 mb-3 inner-tittle"> Blog Posts</h3>
                <div class="row mt-lg-5 mt-4">
                    <div class="col-lg-8 blog-left-content">
                        @foreach($blog as $blo)
                        <div class="card" data-aos="fade-up">
                            <a href="/blog/{{$blo->id}}"> <img class="card-img-top" src="{{asset('images/blogs')}}/{{$blo->image}}" alt="Card image cap"></a>
                            <div class="card-body">
                                <h6 class="date">{{$blo->date}}</h6>
                                <h5 class="card-title"><a class="b-post text-dark" href="/blog/{{$blo->id}}">{{$blo->title}}</a></h5>
                                <p class="card-text">{{$blo->sdesc}}</p>
                               <a class="btn contact my-3" href="/blog/{{$blo->id}}">Read More</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <aside class="col-lg-4 blog-sldebar-right">
                        <div class="single-gd">
                            <img src="images/sale.jpg" class="img-fluid" alt="">
                            <h4>Sign up to our newsletter</h4>
                            <form action="/news" method="post">
                                @csrf
                                <input type="email" name="email" placeholder="Email" required="">
                                <div class="button">

                                    <input type="submit" value="Subscribe">

                                </div>
                            </form>
                        </div>

                        <div class="single-gd tech-btm" data-aos="fade-down">
                            <h4>Latest posts</h4>
                            @foreach($lastblog as $lb)
                            <div class="blog-grids">
                                <div class="blog-grid-left">
                                    <a href="/blog/{{$lb->id}}">
								<img src="{{asset('images/blogs')}}/{{$lb->image}}" class="img-fluid" alt="">
							</a>
                                </div>
                                <div class="blog-grid-right">

                                    <h5>
                                        <a href="/blog/{{$lb->id}}">{{$lb->title}}</a>
                                    </h5>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="single-gd">
                            <h4>Categories</h4>
                            <ul class="list-group">
                                <?php $i=0; ?>
                                @foreach($categories as $cat)
                                <li class="list-group-item active">{{$cat->name}}
                                    <span class="badge badge-primary badge-pill">{{$blogsoncat[$i]}}</span>
                                </li>
                                <?php $i++; ?>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
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
        <div class="inner-sec-w3pvt py-lg-5">
            <div class="blog-sec">
                <h3 class="tittle text-center mb-lg-5 mb-3 inner-tittle"> منشورات المدونة</h3>
                <div class="row mt-lg-5 mt-4">
                    <div class="col-lg-8 blog-left-content">
                        @foreach($blog as $blo)
                        <div class="card" data-aos="fade-up">
                            <a href="/blog/{{$blo->id}}"> <img class="card-img-top" src="{{asset('images/blogs')}}/{{$blo->image}}" alt="Card image cap"></a>
                            <div class="card-body">
                                <h6 class="date">{{$blo->date}}</h6>
                                <h5 class="card-title"><a class="b-post text-dark" href="/blog/{{$blo->id}}">{{$blo->title}}</a></h5>
                                <p class="card-text">{{$blo->sdesc}}</p>
                               <a class="btn contact my-3" href="/blog/{{$blo->id}}">إقرأ المزيد</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <aside class="col-lg-4 blog-sldebar-right">
                        <div class="single-gd">
                            <img src="images/sale.jpg" class="img-fluid" alt="">
                            <h4>سجل الأن للحصول على اخر الاخبار</h4>
                            <form action="/news" method="post">
                                @csrf
                                <input type="email" name="email" placeholder="البريد الإلكترونى" required="">
                                <div class="button">

                                    <input type="submit" value="إشتراك">

                                </div>
                            </form>
                        </div>

                        <div class="single-gd tech-btm" data-aos="fade-down">
                            <h4>آخر المنشورات</h4>
                            @foreach($lastblog as $lb)
                            <div class="blog-grids">
                                <div class="blog-grid-left">
                                    <a href="/blog/{{$lb->id}}">
                                <img src="{{asset('images/blogs')}}/{{$lb->image}}" class="img-fluid" alt="">
                            </a>
                                </div>
                                <div class="blog-grid-right">

                                    <h5>
                                        <a href="/blog/{{$lb->id}}">{{$lb->title}}</a>
                                    </h5>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="single-gd">
                            <h4>التصنيفات</h4>
                            <ul class="list-group">
                                <?php $i=0; ?>
                                @foreach($categories as $cat)
                                <li class="list-group-item active">{{$cat->name}}
                                    <span class="badge badge-primary badge-pill">{{$blogsoncat[$i]}}</span>
                                </li>
                                <?php $i++; ?>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>      
    <!-- //services -->
</section>
@endif
@stop