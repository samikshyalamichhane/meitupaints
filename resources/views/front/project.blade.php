 @extends('layouts.front')
@section('content')

<?php 
        // $color = 'red';
        // dd($dashboard_setting);
        $background_image = $dashboard_setting->projects_banner_image
        ;?>
  <!--Service-area Section-->
    <section class="service-area-red" style="background-image: url(images/main/{{$background_image}});">
        <div class="container">
            <div class="row">
                <h1 class="wow zoomIn" data-wow-delay=".3s">Our Recent Projects</h1>
            </div>
        </div>
    </section>
    <!--/Service-area Section-->
  <!--Our-service Section-->
    <section class="our-service">
        <div class="container">
            <div class="Exclusive-service">
                <div class="row">

                    @foreach($projects as $project)
                    
                    <div class="col-md-4">
                        <div class="s-2-single-service">
                            <div class="s-2-image wow fadeInUp" data-wow-delay=".5s">
                                <img src="{{asset('images/listing/'.@$project->image)}}" alt="">
                            </div>
                            <div class="ss-2-content red wow fadeInDown" data-wow-delay=".5s">
                                <h3>{{$project->title}}</h3>
                                <p>{!!$project->description!!}</p>
                                
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </section>
    <!--/Our-service Section-->

    @endsection