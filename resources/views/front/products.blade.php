@extends('layouts.front')
@section('content')

<?php $background_image = $dashboard_setting->products_banner_image;
// dd($background_image) ?>
    <!--Service-area Section-->
    <section class="service-area-red" style="background-image:linear-gradient(to bottom, rgba(255,0,0,0), rgba(255,0,0,.6)), url(../images/main/{{$background_image}}); background-repeat:no-repeat;">
        <div class="container">
       
            <div class="row">
                <h1 class="wow zoomIn" data-wow-delay=".3s">Our Products</h1>
            </div>
        </div>
    </section>
    <!--/Service-area Section-->

    <!--Our-service Section-->
    <section class="our-service">
        <div class="container">
            <div class="Exclusive-service">
                <div class="row">
                     
                    @foreach($products as $key=>$product)
                    
                    
                   @if($key+1<=6)
                    <div class="col-md-4">
                        <div class="s-2-single-service">
                            <div class="s-2-image wow fadeInUp" data-wow-delay=".5s">
                                <img src="{{asset('images/listing/'.@$product->image)}}" alt="">
                            </div>
                            <div class="ss-2-content red wow fadeInDown" data-wow-delay=".5s">
                                <h3>{{$product->title}}</h3>
                                <p>{{$product->short_description}}</p>
                                <?php //dd($catSlug, $product->slug) ?>

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

    <!--/Our-service Section-->

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

    </section>
    <!-- /Video Section-->


    <!-- Our snav-item-->
    <section class="our-snav-item">
        <div class="container">
            <div class="row">
                @foreach($products as $key=>$product)
                    @if($key+1>6)
                <div class="col-md-4">
                    <div class="s-2-single-service">
                        <div class="s-2-image wow fadeInUp" data-wow-delay=".5s">
                                <img src="{{asset('images/listing/'.@$product->image)}}" alt="">
                        </div>
                        <div class="ss-2-content red wow fadeInDown" data-wow-delay=".5s">
                            <h3>{{$product->title}}</h3>
                            <p>{{$product->short_description}}</p>
                            <a href="{{route('productInner',$product->slug)}}">Read More</a>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                
            </div>
        </div>
    </section>
    
    <!-- Oue snav-item-->
 

@endsection
@push('scripts')
<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
<script language="javascript" type="text/javascript">
$(function(){
    $('#pause-button').click(function(){ 
       $('iframe').attr('src', $('iframe').attr('src'));
        // location.reload();

    });
});
</script>
@endpush