@extends('master')
@section('content')
@if(!session()->has('lang'))
<!-- //main-content -->
<!--/ab -->
<section class="about py-lg-5 py-md-5 py-5">
    <div class="container">
        
           
            <!-- services -->
            <div class="fetured-info pt-lg-5">
               <h3 class="tittle text-center my-lg-5 mb-3">Multi Media <span class="sub-tittle">{{$med[0]->title}}</span> </h3>
                <p>{{$med[0]->link}}</p>
                <?php $i=0; ?>
                <div class="row fetured-sec mt-lg-5 mt-3">
                    @foreach($med as $k=>$m)
                    @if($k>1)
                    <div class="col-lg-6 p-0">
                        <div class="img-effect">
                            <iframe width="560" height="315" src="{{$m->link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>

                    </div>
                   @if($i%3==0) 
                </div>
                <div class="row fetured-sec mt-lg-5 mt-3">
                    @endif
                    <?php $i++; ?>
                    @endif
                    @endforeach
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
               <h3 class="tittle text-center my-lg-5 mb-3">الوسائط المتعددة <span class="sub-tittle">{{$med[1]->title}}</span> </h3>
                <p>{{$med[1]->link}}</p>
                <?php $i=0; ?>
                <div class="row fetured-sec mt-lg-5 mt-3">
                    @foreach($med as $k=>$m)
                    @if($k>1)
                    <div class="col-lg-6 p-0">
                        <div class="img-effect">
                            <iframe width="560" height="315" src="{{$m->link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>

                    </div>
                   @if($i%3==0) 
                </div>
                <div class="row fetured-sec mt-lg-5 mt-3">
                    @endif
                    <?php $i++; ?>
                    @endif
                    @endforeach
                </div>
                    
            </div>

      
   
    <!-- //services -->
</section>
@endif
@stop