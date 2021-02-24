@extends('layouts.front')
@section('content')
    
    <?php 
        // $color = 'red';
        // dd($dashboard_setting);
        $background_image = $dashboard_setting->contact_banner_image
        ;?>
    <!--About Us-Hero Section-->
    <section class="service-area-red" style="background-image: url(images/main/{{$background_image}});">
        <div class="container">
            <div class="row">
                <h1 class="wow zoomIn" data-wow-delay=".5s">Contact Us</h1>
            </div>
        </div>
    </section>
    <!--/About Us-Hero Section-->

    <!--Contact Us Section-->
    <section class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-contact red">
                        <span class="flaticon-envelope bg-envelope"></span>
                        <div class="sc-icon-inner">
                            <span class="flaticon-envelope"></span>
                        </div>
                        <h5>Send Email Us:</h5>
                        <p>{{$dashboard_setting->email}}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-contact red">
                        <span class="flaticon-placeholder bg-placeholder"></span>
                        <div class="sc-icon-inner">
                            <span class="flaticon-placeholder"></span>
                        </div>
                        <h5>Our Location</h5>
                        <p>Head Office:{{$dashboard_setting->address}}</p>
                        <p>Factory:{{$dashboard_setting->address1}}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-contact red">
                        <span class="flaticon-phone bg-phone"></span>
                        <div class="sc-icon-inner">
                            <span class="flaticon-phone"></span>
                        </div>
                        <h5>Call Us</h5>
                        <p>{{$dashboard_setting->phone}}</p>
                    </div>
                </div>
                
                @if($errors->any())
                        <div class="col-md-8 offset-md-2">
                            <div class="alert alert-success alert-dismissible message">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4>{{$errors->first()}}</h4>
                            </div>
                        </div>
                            @endif
                       
                <div class="col-md-8 offset-md-2">
                    <div class="message">
                        <h1>Drop Us A Message Now:</h1>

                    </div>
                    <div class="message-box">
                        <form class="cf" method="post" action="{{route('contactUs')}}" >
                            {{csrf_field()}}

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Your Name*</label>
                                    <input type="text" class="form-control"  name="name" placeholder="Your Name Here">
                                    
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Email Address*</label>
                                    <input type="email"  name="email" class="form-control" placeholder="Email Address Here">

                                </div>
                                <div class="form-group col-md-6">
                                    <label>Subject Line*</label>
                                    <input type="text" class="form-control"  name="subject" placeholder="Subject Of Massage">

                                </div>

                                <div class="form-group col-md-6">
                                    <label>Telephone Number*</label>
                                    <input type="number" name="phone" class="form-control" placeholder="Phone Number">

                                </div>
                                <div class="form-group col-md-12">
                                    <label>Your Message</label>
                                    <textarea rows="6" class="form-control"  name="message_detail" placeholder="Write Your Message"></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <button type="submit" class="cf-btn btn btn-dark">Send Now</button>
                                    </div>
                                    
                                </div>
                                <div class="col-md-12 text-center">
                                    <div class="cf-msg"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Contact Us Section-->


  @endsection