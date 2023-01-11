<!--
Author: Touch-Corp
Author URL: http://Touch-Corp.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
@if(!session()->has('lang'))
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Nacional Group | {{Request::path()=='/'?'Home':Request::path()}} :: Touch-Corp</title>
    <link rel="icon" href="{{ asset('/images/logo/'.$header[8]->value .'') }}">
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Booker Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            //window.scrollTo(0, 1);
        }

    </script>
    <!-- //Meta tag Keywords -->

    <!-- Custom-Files -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet">
    <!-- //Fonts -->
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/npm.js')}}"></script>
</head>

<body>
    <!-- mian-content -->
    <div class="main-content" id="home" style="back-ground: url(../images/{{$main->background}}) no-repeat center;">
        <!--/Top-Header-->
        <div class="top-bar-Touch-Corp pt-4">
            <div class="container">
                <div class="row" dir="rtl">
                    <div class="offset-xl-5">

                    </div>
                    <div class="col-xl-7 top-social-lavi text-md-right text-center mt-md-0 mt-2">
                        <div class="row right-top-info">
                            <div class="col-md-6 header-top text-xl-right text-center">
                                <a href="/ar">عربى</a>
                                <p class="mr-2">
                                    <span class="fa fa-map-marker mr-2"> {{$header[1]->value}} </span>
                                </p>
                                <p>
                                    <i class="fa fa-phone mr-2"> {{$header[0]->value}} </i>
                                </p>
                            </div>
                            <!-- social icons -->
                            <ul class="col-md-6 top-right-info text-md-right text-center">
                                @if($header[4]->value!='')
                                <li class="ml-3 mr-1">
                                    <a href="{{$header[4]->value}}" target="blank">
										<span class="fa fa-facebook-f"></span>
									</a>
                                </li>
                                @endif
                                @if($header[5]->value!='')
                                <li>
                                    <a href="{{$header[5]->value}}" target="blank">
										<span class="fa fa-twitter"></span>
									</a>
                                </li>
                                @endif
                                @if($header[6]->value!='')
                                <li class="mx-1">
                                    <a href="{{$header[6]->value}}" target="blank">
										<span class="fa fa-google-plus"></span>
									</a>
                                </li>
                                @endif
                                <li>
                                    <p>: Follow Us </p>
                                </li>
                            </ul>
                            <!-- //social icons -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--//Top-Header-->
        <!-- header -->
        <header class="header" >
            <div class="container">
                <!-- nav -->
                <nav class="pb-3">


                    <label for="drop" class="toggle">Menu</label>
                    <input type="checkbox" id="drop" />
                    <ul class="menu mt-2">
                        <li {{Request::path()=='/'|Request::path()=='home'?'class=active':''}}><a href="/">Home</a></li>
                        <li {{Request::path()=='about'?'class=active':''}}><a href="/about">About</a></li>
                        <li>
                            <!-- First Tier Drop Down -->
                            <label for="drop-2" class="toggle">Drop Down <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                            <a href="#">Our Services <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                            <input type="checkbox" id="drop-2" />
                            <ul style="top: 20px;">
                                <li><a href="/health">Health</a>
                                </li>
                                <li><a href="/projects">Projects</a>
                                </li>
                                <li><a href="/media">Media</a>
                                </li>
                                <li><a href="/services">Services</a>
                                </li>
                            </ul>
                        </li>
                        <li {{Request::path()=='blogs'?'class=active':''}}><a href="/blogs">Blog</a>
                        <li {{Request::path()=='contact'?'class=active':''}}><a href="/contact">Contact</a>
                        </li>

                    </ul>

                    <div id="logo">
                        <h1>
                        <a class="navbar-brand" href="/"><img src="{{asset('images/logo.png')}}" style:" width="80px" /></a>
                        </h1>
                    </div>
                </nav>
                <!-- //nav -->
            </div>
        </header>
        <!-- //header -->

        @yield('content');

        <!--footer -->
    <footer>
        <div class="footer_1its py-5">
            <div class="container py-md-4">

                <div class="row footer-top mb-md-5 mb-4">
                    <div class="col-lg-4 col-md-6 footer-grid_section_1its" data-aos="fade-right">
                        <div class="footer-title-w3pvt">
                            <h3>Address</h3>
                        </div>
                        <div class="footer-text">
                            <p>Address : {{$header[1]->value}}</p>
                            <p>Phone : {{$header[0]->value}}</p>
                            <p>Email : <a href="mailto:{{$header[2]->value}}">{{$header[2]->value}}</a></p>
                            <p>Fax : {{$header[3]->value}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-md-0 mt-4 footer-grid_section_1its">
                        <div class="footer-title-w3pvt">
                            <h3>Quick Links</h3>
                        </div>
                        <div class="row">
                            <ul class="col-6 links">
                                <li><a href="#">Why Choose Us </a></li>
                                <li><a href="/about">Overview </a></li>
                                <li><a href="/services">Services</a></li>

                                <li><a href="#">Gallery</a></li>
                                <li><a href="/contact">Contact </a></li>
                            </ul>
                            <ul class="col-6 links">
                                <li><a href="#">Privacy Policy </a></li>
                                <li><a href="#">General Terms </a></li>
                                <li><a href="#">Faq's </a></li>
                                <li><a href="#">Knowledge </a></li>
                                <li><a href="#">Forum </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 mt-lg-0 mt-4 col-sm-12 footer-grid_section_1its" data-aos="fade-left">
                        <div class="footer-title-w3pvt">
                            <h3>Newsletter</h3>
                        </div>
                        <div class="footer-text">
                            <p>By subscribing to our mailing list you will always get latest news and updates from us.</p>
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
                            <form action="/news" method="post">
                                @csrf
                                <input type="email" name="email" placeholder="Enter your email..." required="">
                                <button class="btn1" type="submit"><span class="fa fa-paper-plane-o" aria-hidden="true"></span></button>
                                <div class="clearfix"> </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="footer-grid_section text-center">
                    <div class="footer-title-w3pvt mb-4">
                        <h3>Follow with us</h3>
                    </div>
                    <ul class="social_section_1info">
                        <li class="mb-2 facebook"><a href="{{$header[4]->value}}"><span class="fa fa-facebook mr-1"></span>facebook</a></li>
                        <li class="mb-2 twitter"><a href="{{$header[5]->value}}"><span class="fa fa-twitter mr-1"></span>twitter</a></li>
                        <li class="google"><a href="{{$header[6]->value}}"><span class="fa fa-google-plus mr-1"></span>google</a></li>
                        <li class="linkedin"><a href="{{$header[7]->value}}"><span class="fa fa-linkedin mr-1"></span>linkedin</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </footer>
    <!-- //footer -->
    <!-- copyright -->
    <div class="cpy-right text-center py-3">
        <p class="copy-Touch-Corp">© {{date('Y')}} Bridges. All rights reserved | Developed by
            <a href="http://Touch-Corp.com">Touch-Corp.</a>
        </p>
        <div class="move-top"><a href="#home" class="move-top"> <span class="fa fa-angle-up  mb-3" aria-hidden="true"></span></a></div>
    </div>
    <!-- //copyright -->

</body>

</html>
@else
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Bridges for construction and trading | Home :: Touch-Corp</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Booker Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tag Keywords -->
    <!-- Custom-Files -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstarpRTl.css')}}">
    <!--------Arbic Bootstrab---->

    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css" media="all" />
    <!-- Style-CSS -->
    <link rel="stylesheet" href="{{asset('css/styleA.css')}}" type="text/css" media="all">
    <!-- Style Arabic -->
    <!-- font-awesome-icons -->
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900"
        rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet">

    <!-- //Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
        crossorigin="anonymous">
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/npm.js')}}"></script>



</head>

<body>
    <!-- mian-content -->
    <div class="main-content" id="home">
        <!--/Top-Header-->
        <div class="top-bar-Touch-Corp pt-4">
            <div class="container">
                <div class="row" dir="ltr">
                    <div class="offset-xl-5">

                    </div>
                    <div class="col-xl-7 top-social-lavi text-md-right text-center mt-md-0 mt-2">
                        <div class="row right-top-info">
                            <div class="col-md-6 header-top text-xl-right text-center">
								<a href="/en">English</a>
                                <p class="mr-2">
                                    <span class="fa fa-map-marker mr-2"></span> {{$header[8]->value}}
                                </p>
                                <p>
                                    <i class="fa fa-phone mr-2"></i> {{$header[0]->value}}
                                </p>
                            </div>
                            <!-- social icons -->
                            <ul class="col-md-6 top-right-info text-md-right text-center">
								@if($header[4]->value!='')
                                <li class="ml-3 mr-1">
                                    <a href="{{$header[4]->value}}" target="blank">
										<span class="fa fa-facebook-f"></span>
									</a>
                                </li>
                                @endif
                                @if($header[5]->value!='')
                                <li>
                                    <a href="{{$header[5]->value}}" target="blank">
										<span class="fa fa-twitter"></span>
									</a>
                                </li>
                                @endif
                                @if($header[6]->value!='')
                                <li class="mx-1">
                                    <a href="{{$header[6]->value}}" target="blank">
										<span class="fa fa-google-plus"></span>
									</a>
                                </li>
                                @endif
                                <li>
                                    <p>: تابعنا </p>
                                </li>
                            </ul>
                            <!-- //social icons -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--//Top-Header-->
        <!-- header -->
        <header class="header">
            <div class="container Hed">
                <!-- nav -->
                <nav class="pb-3">

                    <label for="drop" class="toggle">القائمة</label>
                    <input type="checkbox" id="drop" />
                    <ul class="menu mt-2">
                        <li {{Request::path()=='/'|Request::path()=='home'?'class=active':''}}><a href="/">الرئيسية</a></li>
                        <li {{Request::path()=='about'?'class=active':''}}><a href="/about">عن الموقع</a></li>
                        <li>
                            <!-- First Tier Drop Down -->
                            <label for="drop-2" class="toggle">Drop Down <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
                            <a href="#">خدماتنا <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                            <input type="checkbox" id="drop-2" />
                            <ul style="top: 20px;">
                                <li><a href="/health">الصحة</a>
                                </li>
                                <li><a href="/projects">المشاريع</a>
                                </li>
                                <li><a href="/media">الوسائط</a>
                                </li>
                                <li><a href="/services">الخدمات</a>
                                </li>
                            </ul>
                        </li>
                        <li {{Request::path()=='blogs'?'class=active':''}}><a href="/blogs">المدونة</a>
                        <li {{Request::path()=='contact'?'class=active':''}}><a href="/contact">التواصل</a>
                        </li>

                    </ul>
                    <div id="logo">
                            <h1>
                                <a class="navbar-brand" href="/"><img src="images/logo.png" style="padding-right:0%"
                                        width="80px"></a>
                            </h1>
                        </div>

                </nav>
                <!-- //nav -->
            </div>
        </header>
        <!-- //header -->
        @yield('content');
        <!--footer -->
    <footer>
        <div class="footer_1its py-5">
            <div class="container py-md-4">

                <div class="row footer-top mb-md-5 mb-4">
                    <div class="col-lg-4 col-md-6 footer-grid_section_1its" data-aos="fade-right">
                        <div class="footer-title-w3pvt">
                            <h3>العنوان</h3>
                        </div>
                        <div class="footer-text">
                            <p>العنوان : {{$header[8]->value}}</p>
                            <p>الهاتف : {{$header[0]->value}}</p>
                            <p>البريد  : <a href="mailto:{{$header[2]->value}}">{{$header[2]->value}}</a></p>
                            <p>فاكس : {{$header[3]->value}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-md-0 mt-4 footer-grid_section_1its">
                        <div class="footer-title-w3pvt">
                            <h3>روابط سريعة</h3>
                        </div>
                        <div class="row">
                            <ul class="col-6 links">
                                <li><a href="#">لماذا نحن </a></li>
                                <li><a href="/about">عنا </a></li>
                                <li><a href="/services">الخدمات</a></li>

                                <li><a href="#">معرض الصور</a></li>
                                <li><a href="/contact">التواصل </a></li>
                            </ul>
                            <ul class="col-6 links">
                                <li><a href="#">سياسة الخصوصية </a></li>
                                <li><a href="#">General Terms </a></li>
                                <li><a href="#">Faq's </a></li>
                                <li><a href="#">Knowledge </a></li>
                                <li><a href="#">Forum </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 mt-lg-0 mt-4 col-sm-12 footer-grid_section_1its" data-aos="fade-left">
                        <div class="footer-title-w3pvt">
                            <h3>الأخبار</h3>
                        </div>
                        <div class="footer-text">
                            <p>عند تسجيل ايميلك ستحصل على الاخبار الجديدة لدينا</p>
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
                            <form action="/news" method="post">
                                @csrf
                                <input type="email" name="email" placeholder="أدخل بريدك الإلكترونى" required="">
                                <button class="btn1" type="submit"><span class="fa fa-paper-plane-o" aria-hidden="true"></span></button>
                                <div class="clearfix"> </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="footer-grid_section text-center">
                    <div class="footer-title-w3pvt mb-4">
                        <h3>تابعنا على :</h3>
                    </div>
                    <ul class="social_section_1info">
                        <li class="mb-2 facebook"><a href="#"><span class="fa fa-facebook mr-1"></span>فيس بوك</a></li>
                        <li class="mb-2 twitter"><a href="#"><span class="fa fa-twitter mr-1"></span>تويتر</a></li>
                        <li class="google"><a href="#"><span class="fa fa-google-plus mr-1"></span>جوجل</a></li>
                        <li class="linkedin"><a href="#"><span class="fa fa-linkedin mr-1"></span>Linkedin</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </footer>
    <!-- //footer -->
    <!-- copyright -->
    <div class="cpy-right text-center py-3">
        <p class="copy-Touch-Corp">© {{date('Y')}} جسور. جميع الحقوق محفوظة | تم تطويرة بواسطة
            <a href="http://Touch-Corp.com">Touch-Corp.</a>
        </p>
        <div class="move-top"><a href="#home" class="move-top"> <span class="fa fa-angle-up  mb-3" aria-hidden="true"></span></a></div>
    </div>
    <!-- //copyright -->

</body>

</html>
@endif
