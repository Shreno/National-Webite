    @extends('master')
    @section('content')
<!-- //main-content -->
    <!--/ab -->
    <section class="about py-lg-5 py-md-5 py-5">
        <div class="container">
            
               
                <!-- services -->
                <div class="fetured-info pt-lg-5">
                   <h3 class="tittle text-center my-lg-5 mb-3">{{$pro->title_ar}} <span class="sub-tittle">{{$pro->address_ar}}</span> </h3>
                    <p>{{$pro->content_ar}}</p>
                    <div class="row fetured-sec mt-lg-5 mt-3">
                        <div class="col-lg-6 p-0">
                            <div class="img-effect">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                            <!-- Wrapper for slides -->
                                            <div class="carousel-inner" role="listbox">
                                                <div class="item active">
                                                    <img class="d-block w-100 img-fluid image1" src="{{asset('images/projects')}}/{{$pro->image}}" alt="...">
                                                  </div>
                                            </div>
                                        </div>
                            </div>

                        </div>
                        <div class="col-lg-6 serv_bottom feature-grids">
                              <div class="feature-grids row mt-3 mb-lg-5 mb-3">
                    <div class="col-lg-6" data-aos="fade-up">
                        <div class="bottom-gd px-3">
                            <span class="fa fa fa-home" aria-hidden="true"></span>
                            <h3 class="my-4">{{$pro->el1ar}}</h3>
                            <p>{{$pro->el1conar}}</p>
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-up">
                        <div class="bottom-gd2 px-3">
                            <span class="fa fa-building" aria-hidden="true"></span>
                            <h3 class="my-4">{{$pro->el2ar}}</h3>
                            <p>{{$pro->el2conar}}</p>
                        </div>
                    </div>
                    

                </div>
                              <div class="feature-grids row mt-3 mb-lg-5 mb-3">
                    <div class="col-lg-6" data-aos="fade-up">
                        <div class="bottom-gd px-3">
                            <span class="fa fa-building-o" aria-hidden="true"></span>
                            <h3 class="my-4">{{$pro->el3ar}}</h3>
                            <p>{{$pro->el3conar}}</p>
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-up">
                        <div class="bottom-gd2 px-3">
                            <span class="fa fa-building-o" aria-hidden="true"></span>
                            <h3 class="my-4">{{$pro->el4ar}}</h3>
                            <p>{{$pro->el4conar}}</p>
                        </div>
                    </div>
                    

                </div>
                        </div>

                    </div>

                    </div>
                </div>

          
       
        <!-- //services -->
    </section>

    @stop