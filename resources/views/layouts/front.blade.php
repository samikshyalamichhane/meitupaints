 <!DOCTYPE html>
 <html lang="en">

<head>
    <!--- Basic Page Needs  -->
    <meta charset="UTF-8">
    <title>Meitu Paints | The least expensive,the most performance!.</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Mobile Specific Meta  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Arvo:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
    <!--Icon-->
    <link rel="shortcut icon" type="image/png" href="{{asset('images/thumbnail/'.@$dashboard_setting->fav_icon)}}">
    <!-- CSS -->
    <!--Font-awesome icon-->
    <link rel="stylesheet" href="{{asset('front/css/font-awosome.css')}}">
    <!--Flaticon CSS-->
    <link rel="stylesheet" href="{{asset('front/font/flaticon.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('front/css/animate.min.css')}}">
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="{{asset('front/css/jquery.fancybox.min.css')}}">
    <!-- Jquery Ui CSS -->
    <link rel="stylesheet" href="{{asset('front/css/jquery-ui.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
    <!-- Main StyleSheet CSS -->
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('front/css/responsive.css')}}">

</head>

<body>
    <!--Preloder Section-->
    <div class="preloader">
        <div class="p-wrapper">
            <div class="spinner">
                <i></i>
                <i></i>
                <i></i>
                <i></i>
                <i></i>
                <i></i>
                <i></i>
            </div>
        </div>
    </div>
    <!--/Preloder Section-->
    <!-- Pages Settings -->

  <!-- /Pages Settings -->
    <!--Header Section-->
    <header class="header-area red">
        <div class="container">
            <div class="paint-nav head-6">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                
                    <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('images/thumbnail/'.@$dashboard_setting->logo)}}" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav hp-1-nav red ml-auto mt-2">
                            <li class="nav-item  dropdown">
                                <a class="nav-link" href="{{route('home')}}">Home</a>
                            </li>
                            <li class="nav-item  dropdown">
                                <a class="nav-link"  href="{{route('about')}}">About</a>
                            </li>
                            
                            <li class="nav-item  dropdown">
                                 <a class="nav-link" id="dropdown2" href="{{route('products')}}" data-toggle="dropdown" aria-expanded="true">Categories</a>
                                <ul class="dropdown-menu" aria-labelledby="dropdown1-1">
                                @foreach($dashboard_category as $categories)
                                <li class="dropdown-item"><a href="{{route('productBySlug', $categories->slug)}}">{{$categories->name}}</a></li>
                                @endforeach
                                
                                </ul>
                            </li>
                            
                          
                            <li class="nav-item dropdown">
                                <a class="nav-link"  href="{{route('projects')}}">Project Cases</a>
                            </li>
                              <li class="nav-item  dropdown">
                                <a class="nav-link" href="{{route('contact')}}">Dealership</a>
                            </li>
                            <li class="nav-item  dropdown">
                                <a class="nav-link" href="{{route('whereToBuy')}}">Where To Buy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link last-child" href="tel:{{$dashboard_setting->phone}}">Call : {{$dashboard_setting->phone}}</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!--/Header Section-->


  @yield('content')



 <!--Project Ask Section-->
    <section class="project-ask-red">
        <div class="container">
            <div class="pro-ask-content">
                <h1 data-aos="slide-in-left">Do You Have Any Project?</h1>
                <p>I loved painting and drawing for many reasons. One of them was that all it really required was me, a
                    pencil and a pad. It was something I was passionate about, and still am I loved painting.</p>
                <div class="btn-contact bc-4 wow zoomIn" data-wow-delay=".5s">
                    <span class="con-btn"><a href="{{route('contact')}}">Let's Talk</a></span>
                </div>

            </div>
        </div>
    </section>
    <!--/Project Ask Section-->

    <!--footer-nav Section-->
    <section class="footer-nav">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="subscribe-top sbp-6">
                        <div class="sp-logo">
                            <img src="{{asset('images/thumbnail/'.@$dashboard_setting->footer_logo)}}" alt="">
                        </div>
                        <div class="sp-subscription-form">
                            <div class="sp-input sp-input6">
                                <h4>Subscribe Us Now :</h4>
                                @if(Session::has('subscription_message'))
                                        <div class="alert alert-success alert-dismissible message">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            {!! Session::get('subscription_message') !!}
                                        </div>
                                    @endif
                                    <form action="{{route('subscription')}}" method="post" class="footer-form">
                                    @csrf
                                <div class="input-group">
                                    <input type="email" class="form-control sp-in6" name="email" 
                                        placeholder="Enter Your Email Address" 
                                        >
                                    <div class="input-group-append">
                                        <button class="input-group-text" id="basic-addon5">Subscribe</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="about-company">
                            <h4>About Company</h4>
                            <p>{!!$dashboard_setting->footer_description!!}</p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="about-company">
                            <h4>Products</h4>
                            <ul class="single-footer-widget">
                                @foreach(@$dashboard_product as $products)
                                <li><a href="{{route('products_list', $products->slug)}}">{{$products->title}}</a></li>
                                @endforeach
                                

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="about-company">
                            <h4>Company</h4>
                            <ul class="single-footer-widget">
                                <li><a href="{{route('about')}}">About Us</a></li>
                                <li><a href="{{route('products')}}">Products</a></li>
                                <li><a href="{{route('projects')}}">Project Cases</a></li>
                                <li><a href="{{route('privacyPolicy')}}">Privacy Policy</a></li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="about-company">
                            <h4>Follow Us:</h4>
                            <div class="social-icon">
                                <ul class="sicon-frist">
                                    <li><a href="{{$dashboard_setting->twitter}}" target="_blank"><i class="fab fa-twitter sicon sicon6"></i></a></li>
                                    <li><a href="{{$dashboard_setting->googleplus}}" target="_blank"><i class="fab fa-google-plus-g sicon sicon6"></i></a></li>
                                    <li><a href="{{$dashboard_setting->facebook}}" target="_blank"><i class="fab fa-facebook-f sicon sicon6"></i></a></li>
                                    <li><a href="{{$dashboard_setting->pininterest}}" target="_blank"><i class="fab fa-pinterest-p sicon sicon6"></i></a></li>
                                    <li><a href="{{$dashboard_setting->linkedin}}" target="_blank"><i class="fab fa-linkedin-in sicon sicon6"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--footer-nav Section-->

    <!--Footer Section-->
    @php
       use Carbon\Carbon;
$current_year = Carbon::now()->format('Y');;
       @endphp
<footer>
        <p>© {{$current_year}} All Rights Reserved By Meitu Paints</p>
                <p>Website By: Web House Nepal </p>

    </footer>
    <!--/Footer Section-->

    <!--Script-->
    <!--Main JS -->
    <script src="{{asset('front/js/jquery-3.4.1.min.js')}}"></script>
    <!-- Animation plugin JS -->
    <script src="{{asset('front/js/wow.min.js')}}"></script>
    <!-- Countdown plugin JS -->
    <script src="{{asset('front/js/countdown.js')}}"></script>
    <!-- Counterup plugin JS -->
    <script src="{{asset('front/js/jquery.counterup.min.js')}}"></script>
    <!-- Shuffle plugin JS -->
    <script src="{{asset('front/js/shuffle.js')}}"></script>
    <!-- Waypoint plugin JS -->
    <script src="{{asset('front/js/waypoints.min.js')}}"></script>
    <!-- jquery Ui plugin JS -->
    <script src="{{asset('front/js/jquery-ui.js')}}"></script>
    <!-- Fancybox plugin JS -->
    <script src="{{asset('front/js/jquery.fancybox.min.js')}}"></script>
    <!--Bootstrap JS-->
    <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
    <!--Custom JS-->
    <script src="{{asset('front/js/custom.js')}}"></script>
    @stack('scripts')
</body>

</html>