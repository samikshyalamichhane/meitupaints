@extends('layouts.front')
@section('content')
<?php //dd(123) ?>
    <!--Hero Section-->
    <!-- <section class="hero-area-1 hero-area-6"> -->
        <?php 
        // $color = 'red';
        // dd($dashboard_setting);
        $background_image = $dashboard_setting->home_banner_image
        ;?>
    <section class="hero-area-1" style="background-image: url(images/main/{{$background_image}});">
        <div class="container">
            <div class="row">
                
                <div class="col-md-7">
                    <div class="hero-content-1">
                        {!!@$dashboard_setting->description!!}
                        <div class="btn-learn bc-4">
                            <span class="learn-ab"><a href="{{route('contact')}}">Contact Us</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Hero Section-->

    <!--Service Section-->
    <section class="our-service">
        <div class="container">
            <div class="Exclusive-service">
                <div class="row">
                    @foreach($products as $key=>$product)
                    @php
                    $count=($key)%2==0;

                    @endphp
                    <?php //dd($catSlug, $product->slug) ?>
                    @if(($key)%2==0)


                    <div class="col-md-4">
                        <div class="single-service ss-home6 wow fadeInUp" data-wow-delay=".5s">
                            <span class="flaticon-paint-{{$count}} ficon-bg-1"></span>
                            <div class="icon-inner ssh4-i">
                                <span class="flaticon-paint"></span>
                            </div>
                            <div class="ss-content sscontent-h4">
                                <h3>{{$product->title}}</h3>
                                <p>{!!$product->short_description!!}</p>
                                <a href="{{ route('products_list', $product->slug)}}">Read More</a>
                            </div>
                        </div>
                    </div>
                    @else 
                     <div class="col-md-4">
                        <div class="single-service ss-2 ss-home66 wow fadeInUp" data-wow-delay="1s">
                            <span class="flaticon-paint-{{$count}} ficon-bg-2"></span>
                            <div class="icon-inner ssh4-i">
                                <span class="flaticon-paint-1"></span>
                            </div>
                            <div class="ss-content sscontent-h4">
                                <h3>{{$product->title}}</h3>
                                <p>{!!$product->short_description!!}</p>
                                <a href="{{ route('products_list', $product->slug)}}">Read More</a>
                            </div>
                        </div>
                             
                    </div>
                    @endif
                    @endforeach
                   
                </div>
            </div>
        </div>
    </section>
    <!--/Service Section-->
    <!--About-us Section-->
    <section class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-6">
                    <div class="about ss-home4 ab-home-6 wow fadeInRight" data-wow-delay=".3s">
                        <div class="ab-ficon">
                            <span class="flaticon-paint-3 ficon-ab-1"></span>
                        </div>
                        <div class="au-tittle">
                            <p>{{@$about->title1}}</p>
                            <h2>{{@$about->short_description1}}</h2>
                        </div>


                        <p>{!!@$about->description1!!}</p>

                        <div class="btn-learn bc-4">
                            <span class="learn-ab"><a href="{{route('about')}}">Learn More</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/About-us Section-->

   <!--Recent Section-->
    <section class="completed-project">
        <div class="container">
            <div class="recent-top">
                <p>Recent Project</p>
                <h3>Our Recent Completed Projects</h3>
                <p>Whereas digital stuff is a bit more ethereal. I like the trophy on my
                    shelf, the presence in my home nice book is just as valuable.</p>
            </div>
            <div class="recent-project">
                <div class="row">
                    @foreach($projects as $key=>$project)
                    @if($key==0)
                    <div class="col-md-5">
                        <div class="prj-1-content ph4-content ph6-content">
                            <div class="p-icon">
                                <span class="flaticon-repair ficon-pj-1"></span>
                            </div>
                            <h4>{{$project->title}}</h4>
                            
                        </div>
                        <div class="project-1">
                            <img style="min-height:400px;" src="{{asset('images/main/'.@$project->image)}}" alt="">
                            <div class="prj-1-content ph4-content ph6-content">
                                <div class="p-icon">
                                    <span class="flaticon-repair ficon-pj-1"></span>
                                </div>
                                <h4>{{$project->title}}</h4>
                               </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @foreach($projects as $key=>$project)
                    @if($key==1)
                    <div class="col-md-7">
                        <div class="project-1">
                            <img src="{{asset('images/main/'.@$project->image)}}" alt="">
                            <div class="prj-1-content prj-two ph4-content ph6-content">
                                <div class="p-icon">
                                    <span class="flaticon-repair ficon-pj-1 ficon-pj-2"></span>
                                </div>
                                <h4>{{$project->title}}</h4>
                            
                                
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @foreach($projects as $key=>$project)
                    @if($key>1)
                    <div class="col-md-4">
                        <div class="project-1">
                            <img src="{{asset('images/main/'.@$project->image)}}" alt="">
                            <div class="prj-1-content prj-three ph4-content ph6-content">
                                <div class="p-icon">
                                    <span class="flaticon-repair ficon-pj-1 ficon-pj-3"></span>
                                </div>
                                 <h4>{{$project->title}}</h4>
                                
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
    <!--/Recent Section-->
   <!-- Video Section-->
    <section class="video">
        <div class="video-overly">
            <div class="play-icon">
                <a href="#" data-toggle="modal" data-target="#myModal"><i class="fas fa-play"></i></a>
            </div>
        </div>


        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="button ml-auto" id="pause-button" data-dismiss="modal"><i
                                class="fas fa-times v-close"></i></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div id="headerPopup">
                            <!-- Make sure ?enablejsapi=1 is on URL -->
                            <iframe id="ytplayer" width="720" height="300" src="https://www.youtube.com/embed/{{$dashboard_setting->youtubeVideo($dashboard_setting['video'])}}" frameborder="0" allow="accelerometer;  clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /Video Section-->

    <!--Client-feedback Section-->
    <section class="client-feedback client-pdb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="client-image wow fadeInLeft" data-wow-delay=".5s">
                        <img src="{{asset('images/client.png')}}" alt="">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="client-content cc-h4">

                        <p>Testimonials</p>
                        <h3 data-aos="zoom-in">Clients Feedbacks</h3>
                        <p>Whereas digital stuff is a bit more ethereal,
                            I like the trophy on my shelf, the presence.</p>
                        <div class="testimo-slide">
                            <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                                <!-- Carousel Slides / Quotes -->
                                <div class="carousel-inner">
                                    <!-- Quote 1 -->
                                    @foreach($testimonials as $key=>$testimonial)
                                    @if($key+1==1)
                                    <div class="item active carousel-item">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>{{$testimonial->description}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                     <!-- Quote 2 -->
                                     @foreach($testimonials as $key=>$testimonial)
                                    @if($key+1>1)
                                    <div class="item carousel-item">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>{{$testimonial->description}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                <!-- Bottom Carousel Indicators -->
                                <ol class="carousel-indicators testimo-indicat">
                                    @foreach($testimonials as $key=>$testimonial)
                                    @if($key+1==1)
                                    <li data-target="#quote-carousel" data-slide-to="{{$key}}" class="active">
                                        @endif
                                        @endforeach

                                        <img class="img-fluid " src="{{asset('images/thumbnail/'.@$testimonial->image)}}" alt="">
                                    </li>
                                    @foreach($testimonials as $key=>$testimonial)
                                    @if($key+1>1)
                                    <li data-target="#quote-carousel" data-slide-to="{{$key+1}}">
                                        <img class="img-fluid" src="{{asset('images/thumbnail/'.@$testimonial->image)}}" alt="">
                                    </li>
                                    @endif
                                        @endforeach
                                    
                                </ol>
                                <!-- Carousel Buttons Next/Prev -->
                                <div class="testimonial-nav">
                                    <a data-slide="prev" href="#quote-carousel"
                                        class="left carousel-control btn-prev h4-prev"><i
                                            class="fa fa-chevron-left"></i></a>
                                    <a data-slide="next" href="#quote-carousel"
                                        class="right carousel-control btn-next h4-next"><i
                                            class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Client-feedback Section-->

    

   @endsection
@push('scripts')
<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
<script language="javascript" type="text/javascript">
    $('#pause-button').click(function(){ 

       $('iframe').attr('src', $('iframe').attr('src'));
        // location.reload();

    });
</script>
@endpush