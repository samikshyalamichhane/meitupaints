@extends('layouts.front')
<style>
    .dealer-wrapper .flaticon-phone, .dealer-wrapper .flaticon-envelope, .dealer-wrapper .flaticon-placeholder{
        margin-right:15px;
        color:#fff;
        font-size:14px;
    }
</style>
@section('content')
<?php 
        // $color = 'red';
        // dd($dashboard_setting);
        $background_image = $dashboard_setting->buy_banner_image
        ;?>
 <section class="service-area-red" style="background-image:linear-gradient(to bottom, rgba(255,0,0,0), rgba(255,0,0,.6)), url(images/main/{{$background_image}});">
        <div class="container">
            <div class="row">
                <h1 class="wow zoomIn" data-wow-delay=".5s">Where To Buy</h1>
                <p>contact our Dealers to Buys our Products</p>
            </div>
        </div>
    </section>
<section class="dealer-wrapper">
    <div class="conatiner">
        <div class="row">
         @foreach($dealers as $key=>$dealer)
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="single-service ss-2 ss-home66 wow fadeInUp" data-wow-delay="1s" style="visibility: visible; animation-delay: 1s; animation-name: fadeInUp;">
                    <div class="dealer-shop-image">
                        <img src="{{asset('images/main/'.@$dealer->image)}}" alt="dealer one image">
                    </div>
                    <h3> {{$dealer->name}}</h3>
                    <a href="tel:+977{{$dealer->phone}}"><i class="flaticon-phone"></i>{{$dealer->phone}}</a>
                    <a href="mailto:{{$dealer->email}}"><i class="flaticon-envelope"></i>{{$dealer->email}}</a>
                   <p><i class="flaticon-placeholder"></i>{{$dealer->address}}</p> 
                </div>
            </div>
            @endforeach
            
            
        </div>
    </div>
</section>

@endsection