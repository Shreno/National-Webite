@extends('master')
@section('content')

@if(!session()->has('lang'))
<!-- //main-content -->
    <!--/contact -->
    <section class="ab-info-main py-md-5 py-5">
        <div class="container">
            <div class="inner-sec-w3pvt py-lg-5">
                <h3 class="tittle text-center mb-lg-5 mb-3 inner-tittle"><span class="sub-tittle">Find Us</span> Contact Us</h3>
                <p class="text-center px-lg-5" data-aos="fade-up">{{$contact->content}}</p>
                <div class="contact-form mt-md-5">
                    <div class="contact-form-inner mx-auto text-left">
                        <form method="post" action="/sendmessage">
                        	@csrf
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
						      <div class="alert alert-{{$a[0]}}">
						        {{$a[1]}}
						      </div>
						    @endif
                            <div class="row">
                                <div class="col-lg-6 con-gd">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" id="name" placeholder="Enter Email" name="email">
                                    </div>

                                </div>
                                <div class="col-lg-6 con-gd">

                                    <div class="form-group">
                                        <label>Phone No.</label>
                                        <input type="text" class="form-control" id="phone" placeholder="Enter Phone no." name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input type="text" class="form-control" id="name" placeholder="Subject" name="subject">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>How can we help?</label>
                                <textarea name="message" class="form-control" id="iq" placeholder="Enter Your Message Here"></textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                        <div class="map mt-md-5">

                            <iframe src="{{$contact->map}}" class="map" style="border:0" allowfullscreen=""></iframe> </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!--//contact -->
	@else
<!-- //main-content -->
    <!--/contact -->
    <section class="ab-info-main py-md-5 py-5">
        <div class="container">
            <div class="inner-sec-w3pvt py-lg-5">
                <h3 class="tittle text-center mb-lg-5 mb-3 inner-tittle"><span class="sub-tittle">????????</span> ?????????? ????????</h3>
                <p class="text-center px-lg-5" data-aos="fade-up">{{$contact->content_ar}}</p>
                <div class="contact-form mt-md-5">
                    <div class="contact-form-inner mx-auto text-left">
                        <form method="post" action="/sendmessage">
                        	@csrf
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
						      <div class="alert alert-{{$a[0]}}">
						        {{$a[1]}}
						      </div>
						    @endif
                            <div class="row">
                                <div class="col-lg-6 con-gd">
                                    <div class="form-group">
                                        <label>??????????</label>
                                        <input type="text" class="form-control" id="name" placeholder="???????? ??????????" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label>???????????? ????????????????????</label>
                                        <input type="email" class="form-control" id="name" placeholder="???????? ???????????? ????????????????????" name="email">
                                    </div>

                                </div>
                                <div class="col-lg-6 con-gd">

                                    <div class="form-group">
                                        <label>?????? ????????????</label>
                                        <input type="text" class="form-control" id="phone" placeholder="???????? ?????? ????????" name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label>??????????????</label>
                                        <input type="text" class="form-control" id="name" placeholder="?????????? ??????????????" name="subject">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>?????? ???????????? ??</label>
                                <textarea name="message" class="form-control" id="iq" placeholder="?????????????? ..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-default">??????????</button>
                        </form>
                        <div class="map mt-md-5">

                            <iframe src="{{$contact->map}}" class="map" style="border:0" allowfullscreen=""></iframe> </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!--//contact -->	
	@endif
@stop