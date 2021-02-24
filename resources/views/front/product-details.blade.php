@extends('layouts.front')
@section('content')

    <!--Service-area Section-->
    <section class="service-area-red ser-2" style="background-image: ;">
        <div class="container">
            <div class="row">
                <h1 class="wow zoomIn" data-wow-delay=".5s">{{$product->title}}</h1>
            </div>
        </div>
    </section>
    <!--/Service-area Section-->
 
    <!--Wall Painting Section-->
    <section class="wall-painting">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="painting wow fadeInLeft" data-wow-delay=".3s">
                        <img src="{{asset('images/main/'.@$product->image)}}" alt="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="paint-about wow fadeInLeft" data-wow-delay="1s">
                        <h1>Details About {{$product->title}}</h1>

                        <p>{!!$product->description!!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Wall Painting Section-->

    <section class="wall-p-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="w-p-text red">
                        <p>For people like me, book are something solid and real whereas digital stuff is a bit more
                            ethereal. I like the trophy my shelf
                            the presence in my home. A nice book is just as valuable as a. Let's face it, a hell of a
                            lot more useful. For people like book
                            are something solid and real where digital stuff is a bit more ethereal for people like me.
                            For people like book are something
                            solid and real whereas digital stuff is a bit more ethereal. I like the trophy on my shelf,
                            the presence in my home. A nice
                            is just as valuable as a. Let's face it, a hell of a lot more useful. For people like me.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Wall Painting Contaent Section-->
    <?php //dd('e4r2334') ?>
    
 @endsection