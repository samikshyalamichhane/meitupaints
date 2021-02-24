@extends('layouts.front')
@section('content')
    
<?php 
        // $color = 'red';
        // dd($dashboard_setting);
        $background_image = $dashboard_setting->about_us_banner_image
        ;?>
    <!--About Us-Hero Section-->
    <section class="service-area-red" style="background-image: url(images/main/{{$background_image}});">
        <div class="container">
            <div class="row">
                <h1>About Us</h1>
            </div>
        </div>
    </section>
    <!--/About Us-Hero Section-->

    <!--About-team Section-->
    <section class="About-team">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="team-image">
                        
                        <img src="{{asset('images/thumbnail/'.@$about->image1)}}" alt="">
                        <div class="n-of-members">
                            <div class="t-members">
                                <span class="cap-m"><span class="counterUp">{{@$about->dedicated_team_member}}</span>K+</span>
                                <p>Dedicated
                                    Team Member</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="colo-content ab-us">
                        <p>{{@$about->title1}}</p>
                        <h2>{{@$about->short_description1}}</h2>
                        <p>{!!@$about->description1!!}
                        </p>

                        

                        <div class="btn-learn bc-4">
                            <span class="learn-ab"><a href="{{route('products')}}">Our Products</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/About-team Section-->

    <!--Our-experience Section-->
    <section class="our-experience">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="o-e-content">
                        <p>{{@$about->title2}}</p>
                        <h1>{{@$about->short_description2}}</h1>
                        <p>{!!@$about->description1!!}
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="expart">
                                <div class="expart-icon-red">
                                    <span class="flaticon-paint ex-1"></span>
                                </div>
                                <div class="expart-content">
                                    <h4>Color Expert</h4>
                                    <p>For people like book something
                                        real, whereas digital stuff is
                                        bit more ethereal like the troph.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="expart">
                                <div class="expart-icon-red">
                                    <span class="flaticon-paint-1 ex-1"></span>
                                </div>
                                <div class="expart-content">
                                    <h4>Color Expert</h4>
                                    <p>For people like book something
                                        real, whereas digital stuff is
                                        bit more ethereal like the troph.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="expart">
                                <div class="expart-icon-red">
                                    <span class="flaticon-graphic-tool ex-1"></span>
                                </div>
                                <div class="expart-content">
                                    <h4>Color Expert</h4>
                                    <p>For people like book something
                                        real, whereas digital stuff is
                                        bit more ethereal like the troph.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="expart">
                                <div class="expart-icon-red">
                                    <span class="flaticon-pantone ex-1"></span>
                                </div>
                                <div class="expart-content">
                                    <h4>Color Expert</h4>
                                    <p>For people like book something
                                        real, whereas digital stuff is
                                        bit more ethereal like the troph.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--/Our-experience Section-->

    <!-- care-about Section-->
    <section class="care-about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="c-a-image-red">
                        <img src="{{asset('images/main/'.@$about->image2)}}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="c-a-content">
                        <p>{{@$about->title3}}</p>
                        <h2>{{@$about->short_description3}}</h2>
                        <p>{!!@$about->description3!!}</p>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="red-cap-1">
                                <div class="cap-text">
                                    <span class="cap-m"><span class="counterUp">{{@$about->projects_completed}}</span> K+</span>
                                    <p>Projects Completed</p>
                                </div>
                            </div>
                            <div class="red-cap-1 red-cap-2">
                                <div class="cap-text">
                                    <span class="cap-m"><span class="counterUp">{{@$about->regular_users}}</span> &nbsp;K+</span>
                                    <p>Regular Users</p>
                                </div>
                            </div>
                            <div class="red-cap-1 red-cap-3">
                                <div class="cap-text ">
                                    <span class="cap-m"><span class="counterUp">{{@$about->awards}}</span>&nbsp; +</span>
                                    <p>Awards</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /care-about Section-->

    <!-- Our-team Section-->

    <section class="our-team">
        <div class="container">
            <div class="os-content">
                <p>Our Team</p>
                <h2>Meet The Team</h2>
                <p>Whereas digital stuff is a bit more ethereal. I like the trophy on my
                    shelf, the presence in my home nice book is just as valuable..</p>
            </div>
            <div class="row">
                @foreach($team as $team)
                <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s">
                    
                    <div class="st-member">
                        <img src="{{asset('images/listing/'.@$team->image)}}" alt="">
                        <div class="st-s-icon">
                            <ul>
                                <li><a href="{{@$team->twitter}}"><i class="fab fa-twitter sicon red-icon"></i></a></li>
                                <li><a href="{{@$team->googleplus}}"><i class="fab fa-google-plus-g sicon red-icon"></i></a></li>
                                <li><a href="{{@$team->facebook}}"><i class="fab fa-facebook-f sicon red-icon"></i></a></li>
                                <li><a href="{{@$team->pininterest}}"><i class="fab fa-pinterest-p sicon red-icon"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <h3 class="wow fadeInDown" data-wow-delay="1s">{{@$team->name}}</h3>
                    <p class="wow fadeInDown" data-wow-delay="1.5s">{{@$team->designation}}</p>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
    <!-- /Our-team Section-->

  @endsection