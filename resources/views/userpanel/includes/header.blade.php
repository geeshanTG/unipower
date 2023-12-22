<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Meta Tags -->
    @php
            if (HeaderHelper::activateMenu('HomeController') == 'active') {
                $meta = HeaderHelper::getMeta('Home');
            } elseif (HeaderHelper::activateMenu('ContactController') == 'active') {
                $meta = HeaderHelper::getMeta('Contact Us');
            } elseif (HeaderHelper::activateMenu('AboutController') == 'active') {
                $meta = HeaderHelper::getMeta('About Us');
            } elseif (HeaderHelper::activateMenu('NewsAndEventController') == 'active') {
                $meta = HeaderHelper::getMeta('News And Event');
            } elseif (HeaderHelper::activateMenu('ServiceController') == 'active') {
                $meta = HeaderHelper::getMeta('Services');
            }else {
                $meta = HeaderHelper::getMeta('Home');
            }
            if (HeaderHelper::activateMenu('ProductController') == 'active') {
                if (Request::segment(1)) {
                    $meta = HeaderHelper::getMeta('Products');
                }
                if (Request::segment(2)) {
                    $meta->page_title = str_replace('-', ' ', ucwords(Request::segment(2))) . ' |Unipower | Power to Grow';
                    $meta->description = str_replace('-', ' ', ucwords(Request::segment(2)));
                    $meta->og_title = str_replace('-', ' ', ucwords(Request::segment(2))) . ' |Unipower | Power to Grow';
                    $meta->og_description = str_replace('-', ' ', ucwords(Request::segment(2)));
                }
    
                // if (Request::segment(3)) {
                //     $meta->page_title = str_replace('-', ' ', ucwords(Request::segment(3))) . ' | ' . str_replace('-', ' ', ucwords(Request::segment(2))) . ' | Tyre Manufacturers in Sri Lanka';
                //     $meta->description = str_replace('-', ' ', ucwords(Request::segment(2))) . ', ' . str_replace('-', ' ', ucwords(Request::segment(3)));
                //     $meta->og_title = str_replace('-', ' ', ucwords(Request::segment(3))) . ' | ' . str_replace('-', ' ', ucwords(Request::segment(2))) . ' | Tyre Manufacturers in Sri Lanka';
                //     $meta->og_description = str_replace('-', ' ', ucwords(Request::segment(2))) . ', ' . str_replace('-', ' ', ucwords(Request::segment(3)));
                // // }
            }
    
            // if (HeaderHelper::activateMenu('Product_frontContoller') == 'active') {
            //     $meta->page_title = str_replace('-', ' ', ucwords(Request::segment(4))) . ' | Unipower | Power to Grow';
            //     $meta->description = str_replace('-', ' ', ucwords(Request::segment(2))) . ', ' . str_replace('-', ' ', ucwords(Request::segment(3))) . ', ' . str_replace('-', ' ', ucwords(Request::segment(4)));
            //     $meta->og_title = str_replace('-', ' ', ucwords(Request::segment(4))) . ' | Tyre Manufacturers Unipower | Power to Growin Sri Lanka';
            //     $meta->og_description = str_replace('-', ' ', ucwords(Request::segment(2))) . ', ' . str_replace('-', ' ', ucwords(Request::segment(3))) . ', ' . str_replace('-', ' ', ucwords(Request::segment(4)));
            // }
        @endphp

    <meta name="description" content="{{ $meta->description }}" />
    <link rel="canonical" href="" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $meta->og_description }}" />
    <meta property="og:description" content="{{ $meta->og_description }}" />
    <meta property="og:url" content="{{ $meta->og_url }}" />
    <meta property="og:site_name" content="{{ $meta->og_sitename }}" />
    <meta name="og:image" content="{{ asset('storage/app/' . $meta->og_image) }}" />
    <meta name="twitter:card" content="{{ $meta->twitter_card }}" />
    <meta name="twitter:description" content="{{ $meta->twitter_description }}" />
    <meta name="twitter:title" content="{{ $meta->twitter_title }}" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link href="{{ asset('public/frontend/css/unipower.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/mediaquery.css') }}" rel="stylesheet">
    <!-- Custom CSS -->

    <title>Unipower | Power to Grow</title>

    <!--favicon-->
    <link rel="shortcut icon" href="{{ asset('public/frontend/images/favicon.png') }}" />
    <!--favicon-->

    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Add icon library -->

    <!--loading effect-->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/loading_styles.css') }}" type="text/css"
        media="screen" />
    <link rel="stylesheet" href="{{ asset('public/frontend/css/aos.css') }}" type="text/css" media="screen" />
    <!--loading effect-->

    <!-- owl carousel -->
    <link href="{{ asset('public/frontend/owl/owl.carousel.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/owl/owl_css.css') }}">
    <!-- owl carousel -->

    <!--jarallax js & css-->
    <link href="{{ asset('public/frontend/jarallax/jarallax_css.css') }}" rel="stylesheet" type="text/css"
        media="screen">
    <!--jarallax js & css-->

    <!-- animate -->
    <link rel='stylesheet' href='{{ asset('public/frontend/css/animate.min.css') }}'>
    <!-- animate -->

    <!-- Timeline -->
    <link rel='stylesheet' href='{{ asset('public/frontend/timeline/style.css') }}'>
    <!-- Timeline -->
    <!-- Image Gallery  -->
    <link rel='stylesheet' href='{{ asset('public/frontend/gallery/baguetteBox.min.css') }}'>
    <!-- Image Gallery  -->


    <!--scroll bar style-->
    <style>
        ::-webkit-scrollbar {
            background: #000000;
            height: 5px;
            width: 5px;
        }

        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 2px #00732E;
        }

        ::-webkit-scrollbar-thumb {
            background: #00732E;
            border-radius: 2px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #00732E;
        }
    </style>
    <!--scroll bar style-->

    <!-- Image Gallery  -->
    <link rel='stylesheet' href='{{ asset('public/frontend/gallery/baguetteBox.min.css') }}'>
    <!-- Image Gallery  -->
    <!-- Timeline -->
    <link rel='stylesheet' href='{{ asset('public/frontend/timeline/style.css') }}'>
    <!-- Timeline -->



</head>

<body>

    <header>

        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #fff;">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('/storage/app/') . '/' . $contactInfo->logo }}" alt=""
                        class="d-block top_logo w-100">
                </a>
                <div class="position-relative">
                    <div class="d-lg-none d-block">
                        <a class="nav-link mob_search" href="#">
                            <div><i class="fa fa-search" aria-hidden="true"></i></div>
                        </a>
                    </div>
                    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse flex-grow-1 text-right navbar_main" id="navbarNav">
                    <ul class="navbar-nav ms-auto main_nav_bar">
                        <li class="nav-item">
                            <a class="nav-link active d-flex align-items-center" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="#">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="#">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="#">News & Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="#">Contact us</a>
                        </li>
                        <li class="nav-item d-lg-block d-none">
                            <a class="nav-link search_nav d-flex align-items-center" href="#">
                                <div><i class="fa fa-search" aria-hidden="true"></i></div>
                            </a>
                        </li>
                    </ul>

                    <!-- <form>
              <input type="search" placeholder="Search">
            </form> -->
                </div>
            </div>
        </nav>

        <div id="search-wrap">
            <div class="close-btn"><span></span><span></span></div>
            <div class="search-area">
                <form role="search" method="post" id="form-submit" action="{{ route('search_result') }}">
                    @csrf
                    <input type="text" value="" name="text" id="search-text" placeholder="Search...">
                    <!-- <input type="submit" id="searchsubmit" value=""> -->
                </form>

            </div>
        </div>

        <!-- ========================== -->
        <!-- ========================== -->

    </header>
