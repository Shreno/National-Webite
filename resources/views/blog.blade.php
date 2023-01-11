@extends('master')
@section('content')

<!-- //main-content -->
    <!--/ab -->
    <section class="about py-lg-5 py-md-5 py-5">
        <div class="container">
            <div class="inner-sec-w3pvt py-lg-5">
                <div class="blog-sec">
                    <h3 class="tittle text-center mb-lg-5 mb-3 inner-tittle"> {{$blog->title}}</h3>
                    <div class="row mt-lg-5 mt-4">
                        <div class="col-lg-8 blog-left-content">
                            <div class="card" data-aos="fade-up">
                                <img class="card-img-top" src="{{asset('images/blogs')}}/{{$blog->image}}" alt="Card image cap">
                                <div class="card-body">
                                    <h6 class="date">{{$blog->date}}</h6>
                                    <h5 class="card-title"><a class="b-post text-dark" href="#">{{$blog->title}}</a></h5>
                                    <p class="card-text">
                                        <?php echo $blog->content; ?>
                                    </p>
                                </div>
                                
                            </div>
                            
                            <div class="comment-top">
                                <h4>التعليقات</h4>
                                @foreach($comments as $c)
                                <div class="media">
                                    <div class="media-body">
                                        <h5 class="mt-0">{{$c->name}}</h5>
                                        <p>{{$c->comment}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="comment-top contact contact-form">
                                <h4>أترك تعليقاً</h4>
                                @if(count($errors)>0)
                                <br>
                                <div class="alert alert-danger" style="width: 40%">
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
                                <form id="contactform" method="post" action="/comment/{{$blog->id}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>الإسم</label>
                                                <input type="text" class="form-control" id="name" placeholder="أدخل إسماً" name="name">
                                                <label>البريد الإلكترونى</label>
                                                <input type="text" class="form-control" id="name" placeholder="أدخل بريدك الإلكترونى" name="email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>التعليق</label>
                                        <textarea name="comment" class="form-control" id="iq" placeholder="أكتب تعليقاً هنا .."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">إرسال</button>
                                </form>
                            </div>
                        </div>
                        <aside class="col-lg-4 blog-sldebar-right">
                            <div class="single-gd">
                                <img src="images/sale.jpg" class="img-fluid" alt="">
                                <h4>سجل الأن للحصول على اخر الاخبار</h4>
                                <form action="#" method="post">

                                    <input type="email" name="Email" placeholder="البريد الإلكترونى" required="">
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
    @stop