<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from portotheme.com/html/wolmart/{{url('/')}} by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Oct 2025 04:50:26 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Glamours World</title>

    <meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
    <meta name="description"
        content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
    <meta name="author" content="D-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset(setting()->favicon ?? 'front/assets/images/icons/favicon.png')}}" />

    <link rel="stylesheet" href="{{asset('custom/toastr.css')}}">

    <!-- WebFont.js -->
    <script>
        WebFontConfig = {
            google: { families: ['Poppins:400,500,600,700,800'] }
        };
        (function (d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = 'front/assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <link rel="preload" href="{{asset('front/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2')}}" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{asset('front/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2')}}" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{asset('front/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2')}}" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{asset('front/assets/fonts/wolmart87d5.woff?png09e')}}" as="font" type="font/woff" crossorigin="anonymous">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/vendor/fontawesome-free/css/all.min.css')}}">

    <!-- Plugins CSS -->
    <!-- <link rel="stylesheet" href="front/assets/vendor/swiper/swiper-bundle.min.css"> -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/vendor/animate/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/vendor/magnific-popup/magnific-popup.min.css')}}">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/vendor/swiper/swiper-bundle.min.css')}}">

    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/demo1.min.css')}}">

    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/style.min.css')}}">

    <style>
        .login.sign-in:hover, .login.register:hover, .my-account:hover, .user-logout:hover {
            color: #fff !important;
        }
        .search-results-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 1px solid #e0e0e0;
            border-top: none;
            border-radius: 0 0 8px 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-height: 400px;
            overflow-y: auto;
            z-index: 1000;
            display: none;
        }

        .search-results-dropdown.show {
            display: block;
        }

        .search-result-item {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            border-bottom: 1px solid #f0f0f0;
            cursor: pointer;
            transition: background 0.2s ease;
            text-decoration: none;
            color: inherit;
        }

        .search-result-item:last-child {
            border-bottom: none;
        }

        .search-result-item:hover {
            background: #f8f9fa;
        }

        .search-result-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 6px;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .search-result-info {
            flex: 1;
            min-width: 0;
        }

        .search-result-title {
            font-size: 14px;
            font-weight: 500;
            color: #333;
            margin: 0 0 4px 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .search-result-price {
            font-size: 14px;
            font-weight: 600;
            color: #28a745;
            margin: 0;
        }

        .search-result-category {
            font-size: 12px;
            color: #999;
            margin: 0;
        }

        .search-no-results {
            padding: 20px;
            text-align: center;
            color: #999;
            font-size: 14px;
        }

        .search-loading {
            padding: 20px;
            text-align: center;
            color: #666;
        }

        /* Make parent form position relative */
        .header-search {
            position: relative;
        }

        /* Scrollbar styling */
        .search-results-dropdown::-webkit-scrollbar {
            width: 6px;
        }

        .search-results-dropdown::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .search-results-dropdown::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 3px;
        }

        .search-results-dropdown::-webkit-scrollbar-thumb:hover {
            background: #999;
        }
        /* Mobile Search Form - Make it relative for dropdown positioning */
        .mobile-search-form {
            position: relative;
        }

        /* Mobile Search Results Dropdown */
        .mobile-menu-container .search-results-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 1px solid #e0e0e0;
            border-top: none;
            border-radius: 0 0 8px 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            max-height: 350px;
            overflow-y: auto;
            z-index: 1001;
            display: none;
        }

        .mobile-menu-container .search-results-dropdown.show {
            display: block;
        }

        .mobile-menu-container .search-result-item {
            display: flex;
            align-items: center;
            padding: 10px 12px;
            border-bottom: 1px solid #f0f0f0;
            cursor: pointer;
            transition: background 0.2s ease;
            text-decoration: none;
            color: inherit;
        }

        .mobile-menu-container .search-result-item:last-child {
            border-bottom: none;
        }

        .mobile-menu-container .search-result-item:hover,
        .mobile-menu-container .search-result-item:active {
            background: #f8f9fa;
        }

        .mobile-menu-container .search-result-img {
            width: 45px;
            height: 45px;
            object-fit: cover;
            border-radius: 6px;
            margin-right: 10px;
            flex-shrink: 0;
        }

        .mobile-menu-container .search-result-info {
            flex: 1;
            min-width: 0;
        }

        .mobile-menu-container .search-result-title {
            font-size: 13px;
            font-weight: 500;
            color: #333;
            margin: 0 0 3px 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .mobile-menu-container .search-result-price {
            font-size: 13px;
            font-weight: 600;
            color: #28a745;
            margin: 0;
        }

        .mobile-menu-container .search-result-category {
            font-size: 11px;
            color: #999;
            margin: 0;
        }

        .mobile-menu-container .search-no-results {
            padding: 20px;
            text-align: center;
            color: #999;
            font-size: 14px;
        }

        .mobile-menu-container .search-loading {
            padding: 20px;
            text-align: center;
            color: #666;
            font-size: 14px;
        }

        /* Scrollbar for mobile */
        .mobile-menu-container .search-results-dropdown::-webkit-scrollbar {
            width: 5px;
        }

        .mobile-menu-container .search-results-dropdown::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .mobile-menu-container .search-results-dropdown::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 3px;
        }
    </style>

    <!-- Meta Pixel Code -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var pixelId = {{ setting()->meta_pixel_script ?? null }};

            if (pixelId) {
                !function(f,b,e,v,n,t,s)
                {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                    n.queue=[];t=b.createElement(e);t.async=!0;
                    t.src=v;s=b.getElementsByTagName(e)[0];
                    s.parentNode.insertBefore(t,s)}(window, document,'script',
                    'https://connect.facebook.net/en_US/fbevents.js');
                fbq('init', pixelId);
                fbq('track', 'PageView');
            } else {
                console.warn("⚠️ Meta Pixel ID not found in .env");
            }
        });
    </script>

    <noscript>
        <img height="1" width="1" style="display:none"
             src="https://www.facebook.com/tr?id={{ setting()->meta_pixel_script ?? '' }}&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Meta Pixel Code -->


</head>

<body class="home">
    <div class="page-wrapper">
        <h1 class="d-none">Glamours World - Responsive Marketplace HTML Template</h1>
        <!-- Start of Header -->
        <header class="header">
            <div class="header-top" style="background-color: #e5757e !important;">
                <div class="container">
                    <div class="header-left">
                        <p class="welcome-msg">{{ setting()->welcome_msg ?? 'Welcome to Glamours World message or remove it!' }}</p>
                    </div>
                    <div class="header-right">
                        <div class="dropdown d-none">
                            <a href="#currency">BDT</a>
                        </div>
                        <!-- End of DropDown Menu -->

                        <div class="dropdown d-none">
                            <a href="#language"><img src="{{asset('front/assets/images/flags/eng.png')}}" alt="ENG Flag" width="14"
                                    height="8" class="dropdown-image" /> ENG</a>
                            <div class="dropdown-box">
                                <a href="#ENG">
                                    <img src="{{asset('front/assets/images/flags/eng.png')}}" alt="ENG Flag" width="14" height="8"
                                        class="dropdown-image" />
                                    ENG
                                </a>
                            </div>
                        </div>
                        <!-- End of Dropdown Menu -->
                        <span class="divider d-lg-show d-none"></span>
                        <a href="{{ route('contact') }}" class="d-lg-show d-none">Contact Us</a>
                        @if(Auth::check())
                          <a href="{{ route('my-account') }}" class="d-lg-show my-account">My Account</a>

                         <a href="{{'/user-logout'}}" class="d-lg-show user-logout">{{Auth::user()->name}} ( Logout )</a>

                        @else
                        {{-- <a href="front/assets/ajax/login.html" class="d-lg-show login sign-in"><i
                                class="w-icon-account"></i>Sign In</a> --}}

                        <a href="{{url('/login-register')}}" class="d-lg-show login sign-in" style=":hover{color:#fff !important;}">
                            <i class="w-icon-account"></i>
                            Sign In
                        </a>
                        <span class="delimiter d-lg-show ">/</span>
                        <a href="{{url('/login-register')}}" class="ml-0 d-lg-show login register">Register</a>
                        @endif

                    </div>
                </div>
            </div>
            <!-- End of Header Top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left mr-md-4">
                        <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
                        </a>
                        <a href="{{ url('/') }}" class="logo ml-lg-0">
                            <img src="{{ asset(setting()->logo ?? 'front/assets/images/logo.png') }}" alt="logo" width="144" height="45" />
                        </a>
{{--                        <div style="position: relative;">--}}
                        <form method="get" action="{{url('product-lists')}}"
                              class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                            <div class="select-box">
                                <select id="category" name="category" class="form-control">
                                    <option value="" selected disabled>All Categories</option>
                                    @foreach($topCategories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="text" class="form-control" name="search_product" id="search-product"
                                   placeholder="Search in..." autocomplete="off" />
                            <button class="btn btn-search" type="submit">
                                <i class="w-icon-search"></i>
                            </button>

                            <!-- Search Results Dropdown -->
                            <div class="search-results-dropdown" id="searchResults">
                                <!-- Loading State -->
                                <div class="search-loading" id="searchLoading" style="display: none;">
                                    <i class="fa fa-spinner fa-spin"></i> Searching...
                                </div>

                                <!-- Results List -->
                                <div id="searchResultsList" style="display: none;">
                                    <!-- Results will be populated here -->
                                </div>

                                <!-- No Results State -->
                                <div class="search-no-results" id="noResults" style="display: none;">
                                    <i class="w-icon-exclamation-triangle"></i>
                                    <p>No products found</p>
                                </div>
                            </div>
                        </form>
                            <div id="search-suggestions-container" class="suggestions-container"></div>
{{--                        </div>--}}
                    </div>
                    <div id="searchSuggestions" class="suggestion-box"></div>
                    <div class="header-right ml-4">
                        <div class="header-call d-xs-show d-lg-flex align-items-center">
                            <a href="tel:#{{ setting()->phone ?? '' }}" class="w-icon-call"></a>
                            <div class="call-info d-lg-show">
                                <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                                    <a href="https://portotheme.com/cdn-cgi/l/email-protection#99ba" class="text-capitalize">Live Chat</a> or :</h4>
                                <a href="tel:#{{ setting()->phone ?? '' }}" class="phone-number font-weight-bolder ls-50">{{ setting()->phone ?? '' }}</a>
                            </div>
                        </div>
                        <a class="wishlist label-down link d-xs-show" href="{{url('/wishlists')}}">
                            <i class="w-icon-heart"></i>
                            <span class="wishlist-label d-lg-show">Wishlist</span>
                        </a>
                        <a class="compare label-down link d-xs-show d-none" href="compare.html">
                            <i class="w-icon-compare"></i>
                            <span class="compare-label d-lg-show">Compare</span>
                        </a>
                        <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                            <div class="cart-overlay"></div>
                            <a href="{{url('/carts')}}" class="cart-toggle label-down link">
                                <i class="w-icon-cart">
                                    <span class="cart-count">{{$countCart??0}}</span>
                                </i>
                                <span class="cart-label">Cart</span>
                            </a>
                            <div class="dropdown-box">
                                <div class="cart-header">
                                    <span>Shopping Cart</span>
                                    <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
                                </div>

                                <div class="products">
                                    <div class="product product-cart">
                                        <div class="product-detail">
                                            <a href="product-default.html" class="product-name">Beige knitted
                                                elas<br>tic
                                                runner shoes</a>
                                            <div class="price-box">
                                                <span class="product-quantity">1</span>
                                                <span class="product-price">$25.68</span>
                                            </div>
                                        </div>
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="front/assets/images/cart/product-1.jpg" alt="product" height="84"
                                                    width="94" />
                                            </a>
                                        </figure>
                                        <button class="btn btn-link btn-close" aria-label="button">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>

                                    <div class="product product-cart">
                                        <div class="product-detail">
                                            <a href="product-default.html" class="product-name">Blue utility
                                                pina<br>fore
                                                denim dress</a>
                                            <div class="price-box">
                                                <span class="product-quantity">1</span>
                                                <span class="product-price">$32.99</span>
                                            </div>
                                        </div>
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="front/assets/images/cart/product-2.jpg" alt="product" width="84"
                                                    height="94" />
                                            </a>
                                        </figure>
                                        <button class="btn btn-link btn-close" aria-label="button">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="cart-total">
                                    <label>Subtotal:</label>
                                    <span class="price">$58.67</span>
                                </div>

                                <div class="cart-action">
                                    <a href="{{url('/carts')}}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                                    <a href="checkout.html" class="btn btn-primary  btn-rounded">Checkout</a>
                                </div>
                            </div>
                            <!-- End of Dropdown Box -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Header Middle -->

            <div class="header-bottom sticky-content fix-top sticky-header has-dropdown">
                <div class="container">
                    <div class="inner-wrap">
                        <div class="header-left">
                           @if(Route::currentRouteName() == 'home')
                            <div class="dropdown category-dropdown has-border" data-visible="true">
                                <a href="#" class="category-toggle text-dark" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="true" data-display="static"
                                    title="Browse Categories">
                                    <i class="w-icon-category"></i>
                                    <span>Browse Categories</span>
                                </a>

                                <div class="dropdown-box">
                                    <ul class="menu vertical-menu category-menu">
                                    @if(isset($menuCategories))
                                    @foreach($menuCategories as $menuCategory)
                                     @if(count($menuCategory->subcategories) > 0)
                                        <li>

                                            <a href="{{url('/product-lists?category_id='.$menuCategory->id)}}">
                                                <i class="w-icon-list"></i>{{$menuCategory->category_name}}
                                            </a>
                                            <ul class="megamenu">
                                             @foreach($menuCategory->subcategories as $subcatgory)
                                                <li>
                                                    <h4 class="menu-title">{{$subcatgory->subcategory_name}}</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                      @foreach($subcatgory->products as $product)
                                                        <li><a href="{{url('/product-details/'.$product->id)}}">{{$product->product_name}}</a>
                                                     @endforeach
                                                    </ul>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                      @else
                                        <li>
                                            <a href="{{url('/product-lists?category_id='.$menuCategory->id)}}">
                                                <i class="w-icon-list"></i>{{$menuCategory->category_name}}
                                            </a>
                                        </li>
                                     @endif
                                     @endforeach
                                    @endif

                                        <li class="d-none">
                                            <a href="shop-banner-sidebar.html"
                                                class="font-weight-bold text-primary text-uppercase ls-25">
                                                View All Categories<i class="w-icon-angle-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                           @else
                            <div class="dropdown category-dropdown has-border" data-visible="true">
                                <a href="#" class="category-toggle text-dark" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="true" data-display="static"
                                    title="Browse Categories">
                                    <i class="w-icon-category"></i>
                                    <span>Browse Categories</span>
                                </a>

                                <div class="dropdown-box" style="display:none;">
                                    <ul class="menu vertical-menu category-menu">
                                    @if(isset($menuCategories))
                                    @foreach($menuCategories as $menuCategory)
                                     @if(count($menuCategory->subcategories) > 0)
                                        <li>

                                            <a href="{{url('/product-lists?category_id='.$menuCategory->id)}}">
                                                <i class="w-icon-list"></i>{{$menuCategory->category_name}}
                                            </a>
                                            <ul class="megamenu">
                                             @foreach($menuCategory->subcategories as $subcatgory)
                                                <li>
                                                    <h4 class="menu-title">{{$subcatgory->subcategory_name}}</h4>
                                                    <hr class="divider">
                                                    <ul>
                                                      @foreach($subcatgory->products as $product)
                                                        <li><a href="{{url('/product-details/'.$product->id)}}">{{$product->product_name}}</a>
                                                     @endforeach
                                                    </ul>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                      @else
                                        <li>
                                            <a href="{{url('/product-lists?category_id='.$menuCategory->id)}}">
                                                <i class="w-icon-list"></i>{{$menuCategory->category_name}}
                                            </a>
                                        </li>
                                     @endif
                                     @endforeach
                                    @endif

                                        <li class="d-none">
                                            <a href="shop-banner-sidebar.html"
                                                class="font-weight-bold text-primary text-uppercase ls-25">
                                                View All Categories<i class="w-icon-angle-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                           @endif
                            <nav class="main-nav">
                                <ul class="menu active-underline">
                                    <li class="active">
                                        <a href="{{url('/')}}">Home</a>
                                    </li>
                                    <li>
                                        <a href="#">Brand</a>

                                        <!-- Start of Megamenu -->
                                        <ul class="megamenu">
                                        @if(isset($menuBrands))
                                          @foreach($menuBrands as $brand)
                                            <li>
                                                <h4 class="menu-title">{{$brand->brand_name}}</h4>
                                                <ul>
                                                  @foreach($brand->products as $product)
                                                    <li><a href="{{url('/product-details/'.$product->id)}}">{{$product->product_name}}</a></li>
                                                  @endforeach
                                                </ul>
                                            </li>
                                          @endforeach
                                        @endif
                                        </ul>
                                        <!-- End of Megamenu -->
                                    </li>
                                    <li>
                                        <a href="{{ route('about') }}">About Us</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact') }}">Contact Us</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header-right d-none">
                            <a href="#" class="d-xl-show"><i class="w-icon-map-marker mr-1"></i>Track Order</a>
                            <a href="#"><i class="w-icon-sale"></i>Daily Deals</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- End of Header -->

        <!-- Start of Main-->
        <main class="main">
           @if(Route::currentRouteName() == 'home')
            <x-slider/>
           @endif
            <!-- End of .intro-section -->

            @yield('front_content')
        </main>
        <!-- End of Main -->

        <!-- Start of Footer -->
        <footer class="footer appear-animate" data-animation-options="{
            'name': 'fadeIn'
        }">
            <div class="footer-newsletter bg-primary">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-xl-5 col-lg-6">
                            <div class="icon-box icon-box-side text-white">
                                <div class="icon-box-icon d-inline-flex">
                                    <i class="w-icon-envelop3"></i>
                                </div>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title text-white text-uppercase font-weight-bold">Subscribe To
                                        Our Newsletter</h4>
                                    <p class="text-white">Get all the latest information on Events, Sales and Offers.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-9 mt-4 mt-lg-0 ">
                            <form action="#" method="get"
                                class="input-wrapper input-wrapper-inline input-wrapper-rounded">
                                <input type="email" class="form-control mr-2 bg-white" name="email" id="email"
                                    placeholder="Your E-mail Address" />
                                <button class="btn btn-dark btn-rounded" type="submit">Subscribe<i
                                        class="w-icon-long-arrow-right"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="widget widget-about">
                                <a href="{{url('/')}}" class="logo-footer">
                                    <img src="{{ asset(setting()->logo ?? 'front/assets/images/logo_footer.png') }}" alt="logo-footer" width="144"
                                        height="45" />
                                </a>
                                <div class="widget-body">
                                    <p class="widget-about-title">{{ setting()->footer_title ?? 'Got Question? Call us 24/7'}}</p>
                                    <a href="tel:{{ setting()->phone ?? '' }}" class="widget-about-call">{{ setting()->phone ?? '' }}</a>
                                    <p class="widget-about-desc">{{ setting()->footer_description ?? 'Register now to get updates on pronot get up icons & coupons ster now toon.'}}
                                    </p>

                                    <div class="social-icons social-icons-colored">
                                        <a href="{{ setting()->facebook ?? '' }}" class="social-icon social-facebook w-icon-facebook"></a>
                                        <a href="{{ setting()->twitter ?? '' }}" class="social-icon social-twitter w-icon-twitter"></a>
                                        <a href="{{ setting()->instagram ?? '' }}" class="social-icon social-instagram w-icon-instagram"></a>
                                        <a href="{{ setting()->youtube ?? '' }}" class="social-icon social-youtube w-icon-youtube"></a>
                                        <a href="{{ setting()->pinterest ?? '' }}" class="social-icon social-pinterest w-icon-pinterest"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h3 class="widget-title">Company</h3>
                                <ul class="widget-body">
                                    <li><a href="{{ route('about') }}">About Us</a></li>
{{--                                    <li><a href="#">Team Member</a></li>--}}
{{--                                    <li><a href="#">Career</a></li>--}}
                                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
{{--                                    <li><a href="#">Affilate</a></li>--}}
{{--                                    <li><a href="#">Order History</a></li>--}}
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">My Account</h4>
                                <ul class="widget-body">
                                    @if(Auth::check())
                                    <li><a href="{{ route('my-account') }}">Track My Order</a></li>
                                    @endif
                                    <li><a href="{{url('/carts')}}">View Cart</a></li>
{{--                                    <li><a href="#">Sign In</a></li>--}}
{{--                                    <li><a href="#">Help</a></li>--}}
                                    <li><a href="{{url('/wishlists')}}">My Wishlist</a></li>
{{--                                    <li><a href="#">Privacy Policy</a></li>--}}
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">Customer Service</h4>
                                <ul class="widget-body">
                                    <li><a href="{{ route('bank.info') }}">Payment Methods (Bank)</a></li>
                                    <li><a href="{{ route('bkash.info') }}">Payment Methods (BKash)</a></li>
{{--                                    <li><a href="#">Support Center</a></li>--}}
{{--                                    <li><a href="#">Term and Conditions</a></li>--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-middle d-none">
                    <div class="widget widget-category">
                        <div class="category-box">
                            <h6 class="category-name">Consumer Electric:</h6>
                            <a href="#">TV Television</a>
                            <a href="#">Air Condition</a>
                            <a href="#">Refrigerator</a>
                            <a href="#">Washing Machine</a>
                            <a href="#">Audio Speaker</a>
                            <a href="#">Security Camera</a>
                            <a href="#">View All</a>
                        </div>
                        <div class="category-box">
                            <h6 class="category-name">Clothing & Apparel:</h6>
                            <a href="#">Men's T-shirt</a>
                            <a href="#">Dresses</a>
                            <a href="#">Men's Sneacker</a>
                            <a href="#">Leather Backpack</a>
                            <a href="#">Watches</a>
                            <a href="#">Jeans</a>
                            <a href="#">Sunglasses</a>
                            <a href="#">Boots</a>
                            <a href="#">Rayban</a>
                            <a href="#">Acccessories</a>
                        </div>
                        <div class="category-box">
                            <h6 class="category-name">Home, Garden & Kitchen:</h6>
                            <a href="#">Sofa</a>
                            <a href="#">Chair</a>
                            <a href="#">Bed Room</a>
                            <a href="#">Living Room</a>
                            <a href="#">Cookware</a>
                            <a href="#">Utensil</a>
                            <a href="#">Blender</a>
                            <a href="#">Garden Equipments</a>
                            <a href="#">Decor</a>
                            <a href="#">Library</a>
                        </div>
                        <div class="category-box">
                            <h6 class="category-name">Health & Beauty:</h6>
                            <a href="#">Skin Care</a>
                            <a href="#">Body Shower</a>
                            <a href="#">Makeup</a>
                            <a href="#">Hair Care</a>
                            <a href="#">Lipstick</a>
                            <a href="#">Perfume</a>
                            <a href="#">View all</a>
                        </div>
                        <div class="category-box">
                            <h6 class="category-name">Jewelry & Watches:</h6>
                            <a href="#">Necklace</a>
                            <a href="#">Pendant</a>
                            <a href="#">Diamond Ring</a>
                            <a href="#">Silver Earing</a>
                            <a href="#">Leather Watcher</a>
                            <a href="#">Rolex</a>
                            <a href="#">Gucci</a>
                            <a href="#">Australian Opal</a>
                            <a href="#">Ammolite</a>
                            <a href="#">Sun Pyrite</a>
                        </div>
                        <div class="category-box">
                            <h6 class="category-name">Computer & Technologies:</h6>
                            <a href="#">Laptop</a>
                            <a href="#">iMac</a>
                            <a href="#">Smartphone</a>
                            <a href="#">Tablet</a>
                            <a href="#">Apple</a>
                            <a href="#">Asus</a>
                            <a href="#">Drone</a>
                            <a href="#">Wireless Speaker</a>
                            <a href="#">Game Controller</a>
                            <a href="#">View all</a>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="footer-left">
                        <p class="copyright">{{setting()->copyright_msg ?? 'Copyright © 2025 Glamours World. All Rights Reserved.'}}</p>
                    </div>
                    <div class="footer-right d-none">
                        <span class="payment-label mr-lg-8">We're using safe payment for</span>
                        <figure class="payment">
                            <img src="front/assets/images/payment.png" alt="payment" width="159" height="25" />
                        </figure>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->
    </div>
    <!-- End of Page-wrapper-->

    <!-- Start of Sticky Footer -->
    <div class="sticky-footer sticky-content fix-bottom d-none">
        <a href="{{url('/')}}" class="sticky-link active">
            <i class="w-icon-home"></i>
            <p>Home</p>
        </a>
        <a href="shop-banner-sidebar.html" class="sticky-link">
            <i class="w-icon-category"></i>
            <p>Shop</p>
        </a>
        <a href="my-account.html" class="sticky-link">
            <i class="w-icon-account"></i>
            <p>Account</p>
        </a>
        <div class="cart-dropdown dir-up">
            <a href="{{url('/carts')}}" class="sticky-link">
                <i class="w-icon-cart"></i>
                <p>Cart</p>
            </a>
            <div class="dropdown-box">
                <div class="products">
                    <div class="product product-cart">
                        <div class="product-detail">
                            <h3 class="product-name">
                                <a href="product-default.html">Beige knitted elas<br>tic
                                    runner shoes</a>
                            </h3>
                            <div class="price-box">
                                <span class="product-quantity">1</span>
                                <span class="product-price">$25.68</span>
                            </div>
                        </div>
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="front/assets/images/cart/product-1.jpg" alt="product" height="84" width="94" />
                            </a>
                        </figure>
                        <button class="btn btn-link btn-close" aria-label="button">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <div class="product product-cart">
                        <div class="product-detail">
                            <h3 class="product-name">
                                <a href="product-default.html">Blue utility pina<br>fore
                                    denim dress</a>
                            </h3>
                            <div class="price-box">
                                <span class="product-quantity">1</span>
                                <span class="product-price">$32.99</span>
                            </div>
                        </div>
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="front/assets/images/cart/product-2.jpg" alt="product" width="84" height="94" />
                            </a>
                        </figure>
                        <button class="btn btn-link btn-close" aria-label="button">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="cart-total">
                    <label>Subtotal:</label>
                    <span class="price">$58.67</span>
                </div>

                <div class="cart-action">
                    <a href="{{url('/carts')}}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                    <a href="checkout.html" class="btn btn-primary  btn-rounded">Checkout</a>
                </div>
            </div>
            <!-- End of Dropdown Box -->
        </div>

        <div class="header-search hs-toggle dir-up">
            <a href="#" class="search-toggle sticky-link">
                <i class="w-icon-search"></i>
                <p>Search</p>
            </a>
            <form action="#" class="input-wrapper">
                <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
                    required />
                <button class="btn btn-search" type="submit">
                    <i class="w-icon-search"></i>
                </button>
            </form>
        </div>
    </div>
    <!-- End of Sticky Footer -->

    <!-- Start of Scroll Top -->
    <a id="scroll-top" class="scroll-top" href="#top" title="Top" role="button"> <i class="w-icon-angle-up"></i> <svg
            version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70">
            <circle id="progress-indicator" fill="transparent" stroke="#000000" stroke-miterlimit="10" cx="35" cy="35"
                r="34" style="stroke-dasharray: 16.4198, 400;"></circle>
        </svg> </a>
    <!-- End of Scroll Top -->

    @include('mobileMenu')

    <!-- Start of Newsletter popup -->
    <div class="newsletter-popup mfp-hide" hidden="">
        <div class="newsletter-content">
            <h4 class="text-uppercase font-weight-normal ls-25">Get Up to<span class="text-primary">25% Off</span></h4>
            <h2 class="ls-25">Sign up to Wolmart</h2>
            <p class="text-light ls-10">Subscribe to the Wolmart market newsletter to
                receive updates on special offers.</p>
            <form action="#" method="get" class="input-wrapper input-wrapper-inline input-wrapper-round">
                <input type="email" class="form-control email font-size-md" name="email" id="email2"
                    placeholder="Your email address" required="">
                <button class="btn btn-dark" type="submit">SUBMIT</button>
            </form>
            <div class="form-checkbox d-flex align-items-center">
                <input type="checkbox" class="custom-checkbox" id="hide-newsletter-popup" name="hide-newsletter-popup"
                    required="">
                <label for="hide-newsletter-popup" class="font-size-sm text-light">Don't show this popup again.</label>
            </div>
        </div>
    </div>
    <!-- End of Newsletter popup -->

    <!-- Start of Quick View -->
    <div class="product product-single product-popup">
        <div class="row gutter-lg">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="product-gallery product-gallery-sticky">
                    <div class="swiper-container product-single-swiper swiper-theme nav-inner">
                        <div class="swiper-wrapper row cols-1 gutter-no">
                            <div class="swiper-slide">
                                <figure class="product-image">
                                    <img src="front/assets/images/products/popup/1-440x494.jpg"
                                        data-zoom-image="front/assets/images/products/popup/1-800x900.jpg"
                                        alt="Water Boil Black Utensil" width="800" height="900">
                                </figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="product-image">
                                    <img src="front/assets/images/products/popup/2-440x494.jpg"
                                        data-zoom-image="front/assets/images/products/popup/2-800x900.jpg"
                                        alt="Water Boil Black Utensil" width="800" height="900">
                                </figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="product-image">
                                    <img src="front/assets/images/products/popup/3-440x494.jpg"
                                        data-zoom-image="front/assets/images/products/popup/3-800x900.jpg"
                                        alt="Water Boil Black Utensil" width="800" height="900">
                                </figure>
                            </div>
                            <div class="swiper-slide">
                                <figure class="product-image">
                                    <img src="front/assets/images/products/popup/4-440x494.jpg"
                                        data-zoom-image="front/assets/images/products/popup/4-800x900.jpg"
                                        alt="Water Boil Black Utensil" width="800" height="900">
                                </figure>
                            </div>
                        </div>
                        <button class="swiper-button-next"></button>
                        <button class="swiper-button-prev"></button>
                    </div>
                    <div class="product-thumbs-wrap swiper-container" data-swiper-options="{
                        'navigation': {
                            'nextEl': '.swiper-button-next',
                            'prevEl': '.swiper-button-prev'
                        }
                    }">
                        <div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">
                            <div class="product-thumb swiper-slide">
                                <img src="front/assets/images/products/popup/1-103x116.jpg" alt="Product Thumb" width="103"
                                    height="116">
                            </div>
                            <div class="product-thumb swiper-slide">
                                <img src="front/assets/images/products/popup/2-103x116.jpg" alt="Product Thumb" width="103"
                                    height="116">
                            </div>
                            <div class="product-thumb swiper-slide">
                                <img src="front/assets/images/products/popup/3-103x116.jpg" alt="Product Thumb" width="103"
                                    height="116">
                            </div>
                            <div class="product-thumb swiper-slide">
                                <img src="front/assets/images/products/popup/4-103x116.jpg" alt="Product Thumb" width="103"
                                    height="116">
                            </div>
                        </div>
                        <button class="swiper-button-next"></button>
                        <button class="swiper-button-prev"></button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 overflow-hidden p-relative">
                <div class="product-details scrollable pl-0">
                    <h2 class="product-title">Electronics Black Wrist Watch</h2>
                    <div class="product-bm-wrapper">
                        <figure class="brand">
                            <img src="front/assets/images/products/brand/brand-1.jpg" alt="Brand" width="102" height="48" />
                        </figure>
                        <div class="product-meta">
                            <div class="product-categories">
                                Category:
                                <span class="product-category"><a href="#">Electronics</a></span>
                            </div>
                            <div class="product-sku">
                                SKU: <span>MS46891340</span>
                            </div>
                        </div>
                    </div>

                    <hr class="product-divider">

                    <div class="product-price">$40.00</div>

                    <div class="ratings-container">
                        <div class="ratings-full">
                            <span class="ratings" style="width: 80%;"></span>
                            <span class="tooltiptext tooltip-top"></span>
                        </div>
                        <a href="#" class="rating-reviews">(3 Reviews)</a>
                    </div>

                    <div class="product-short-desc">
                        <ul class="list-type-check list-style-none">
                            <li>Ultrices eros in cursus turpis massa cursus mattis.</li>
                            <li>Volutpat ac tincidunt vitae semper quis lectus.</li>
                            <li>Aliquam id diam maecenas ultricies mi eget mauris.</li>
                        </ul>
                    </div>

                    <hr class="product-divider">

                    <div class="product-form product-variation-form product-color-swatch">
                        <label>Color:</label>
                        <div class="d-flex align-items-center product-variations">
                            <a href="#" class="color" style="background-color: #ffcc01"></a>
                            <a href="#" class="color" style="background-color: #ca6d00;"></a>
                            <a href="#" class="color" style="background-color: #1c93cb;"></a>
                            <a href="#" class="color" style="background-color: #ccc;"></a>
                            <a href="#" class="color" style="background-color: #333;"></a>
                        </div>
                    </div>
                    <div class="product-form product-variation-form product-size-swatch">
                        <label class="mb-1">Size:</label>
                        <div class="flex-wrap d-flex align-items-center product-variations">
                            <a href="#" class="size">Small</a>
                            <a href="#" class="size">Medium</a>
                            <a href="#" class="size">Large</a>
                            <a href="#" class="size">Extra Large</a>
                        </div>
                        <a href="#" class="product-variation-clean">Clean All</a>
                    </div>

                    <div class="product-variation-price">
                        <span></span>
                    </div>

                    <div class="product-form">
                        <div class="product-qty-form">
                            <div class="input-group">
                                <input class="quantity form-control" type="number" min="1" max="10000000">
                                <button class="quantity-plus w-icon-plus"></button>
                                <button class="quantity-minus w-icon-minus"></button>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-cart">
                            <i class="w-icon-cart"></i>
                            <span>Add to Cart</span>
                        </button>
                    </div>

                    <div class="social-links-wrapper">
                        <div class="social-links">
                            <div class="social-icons social-no-color border-thin">
                                <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                <a href="#" class="social-icon social-pinterest fab fa-pinterest-p"></a>
                                <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                                <a href="#" class="social-icon social-youtube fab fa-linkedin-in"></a>
                            </div>
                        </div>
                        <span class="divider d-xs-show"></span>
                        <div class="product-link-wrapper d-flex">
                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"><span></span></a>
                            <a href="#"
                                class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- End of Quick view -->

    <!-- Plugin JS File -->
{{--    <script data-cfasync="false" src="{{asset('../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script>--}}
    <script src="{{asset('front/assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('front/assets/vendor/jquery.plugin/jquery.plugin.min.js')}}"></script>
    <script src="{{asset('front/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('front/assets/vendor/zoom/jquery.zoom.js')}}"></script>
    <script src="{{asset('front/assets/vendor/jquery.countdown/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('front/assets/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('front/assets/vendor/skrollr/skrollr.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Swiper JS -->
    <script src="{{asset('front/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>


    <!-- Main JS -->
    <script src="{{asset('front/assets/js/main.min.js')}}"></script>

    <script src="{{asset('custom/toastr.js')}}"></script>

      @if(Session::has('messege'))
        @toastr("{{ Session::get('messege') }}")
      @endif

    @stack('scripts')

    @if(Route::currentRouteName() != 'home')
     <script>
       $(document).ready(function(){
          $('.category-toggle, .has-submenu, .dropdown-box').hover(
            function() {
                $('.dropdown-box').stop(true, true).fadeIn(200);
            },
            function() {
                $('.dropdown-box').stop(true, true).fadeOut(200);
            }
        );


       });
     </script>
    @endif

    <script>
      $(function () {
        var base_url = "{{url('/')}}";
        localStorage.setItem('base_url', base_url);
      })
    </script>

    <style>
        .suggestions-container {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: #fff;
            border: 1px solid #ddd;
            border-top: 0;
            display: none;
            z-index: 1000;
        }
        .suggestion-item {
            padding: 10px;
            cursor: pointer;
        }
        .suggestion-item:hover {
            background: #f0f0f0;
        }
    </style>

    <script>
        $(document).ready(function() {
            var $searchProduct = $('#search-product');
            var $suggestionsContainer = $('#search-suggestions-container');

            $searchProduct.on('keyup', function() {
                var query = $(this).val();

                if (query.length > 2) {
                    $.ajax({
                        url: '{{ route("search.suggestions") }}',
                        data: { q: query },
                        success: function(data) {
                            $suggestionsContainer.html('').hide();

                            if (data.length) {
                                $.each(data, function(index, item) {
                                    var suggestion = '' +
                                        '<div class="suggestion-item" data-id="' + item.id + '">' +
                                        '<a href="/product-details/' + item.id + '">' + item.product_name + '</a>' +
                                        '</div>';
                                    $suggestionsContainer.append(suggestion);
                                });
                                $suggestionsContainer.show();
                            }
                        }
                    });
                } else {
                    $suggestionsContainer.hide();
                }
            });

            $(document).on('click', function(e) {
                if (!$(e.target).closest('.header-search').length) {
                    $suggestionsContainer.hide();
                }
            });
        });
    </script>
</body>

 <script>
    $(document).ready(function(){

        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });

        $(document).on('submit','#signupUser',function(e){
            e.preventDefault();
            let name_1 = $('#name_1').val();
            let email_1 = $('#email_1').val();
            let phone_1 = $('#phone_1').val();
            let password_1 = $('#password_1').val();
            let password_2 = $('#password_2').val();
            // let redirectUrl = "{{url('/')}}/"+"user-dashboard";
            let redirectUrl = "{{url('/')}}";
            $.ajax({

                url: "{{url('user-signup')}}",

                    type:"POST",

                    data:{'name_1':name_1,'email_1':email_1,'phone_1':phone_1,'password_1':password_1,'password_2':password_2},
                    dataType:"json",
                    success:function(data) {
                        if(data.status == true){
                            $('#name_1').val('');
                            $('#email_1').val('');
                            $('#phone_1').val('');
                            $('#password_1').val('');
                            $('#password_2').val('');
                            toastr.success(data.message);
                            setTimeout(function() {
                                window.location.href = redirectUrl;
                            }, 1000);
                        }else{
                            toastr.error(data.message);
                        }

                },

            });
        });

        $(document).on('submit','#signinUser',function(e){
            e.preventDefault();
            let email_or_phone = $('#email_or_phone').val();
            let password = $('#password').val();
            // let redirectUrl = "{{url('/')}}/"+"user-dashboard";
            let sessionGet = "{{Session::get('page')}}";
            let redirectUrl;
            if(sessionGet == 'checkout'){
                redirectUrl = "{{url('/')}}/checkout";
            }else{
                redirectUrl = "{{url('/')}}";
            };
            $.ajax({

                url: "{{url('user-signin')}}",

                    type:"POST",

                    data:{'email_or_phone':email_or_phone,'password':password},
                    dataType:"json",
                    success:function(data) {
                        if(data.status == true){
                            $('#email_or_phone').val('');
                            $('#password').val('');
                            toastr.success(data.message);
                            setTimeout(function() {
                                window.location.href = redirectUrl;
                            }, 1000);
                        }else{
                            toastr.error(data.message);
                        }

                },

            });
        });

    });
 </script>
<script>
    // document.addEventListener("DOMContentLoaded", function() {
    //     // Disable the newsletter popup trigger entirely
    //     if (typeof Wolmart !== "undefined") {
    //         Wolmart.popup = function() {
    //             console.log("Newsletter popup disabled.");
    //         };
    //     }
    // });
</script>
<script>
    $(document).ready(function(){
        $('#category').on('change', function(){
            var categoryId = $(this).val();
            if(categoryId){
                window.location.href = "{{ url('/product-lists') }}?category_id=" + categoryId;
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Set the cookie to true immediately when page loads
        Wolmart.setCookie("hideNewsletterPopup", true, 7);
    });
</script>
<!--
<script>
    document.addEventListener("DOMContentLoaded", function() {

        function setupSearch(inputSelector, resultsDropdownSelector) {
            const input = document.querySelector(inputSelector);
            const resultsDropdown = document.querySelector(resultsDropdownSelector);
            const resultsList = resultsDropdown?.querySelector('#searchResultsList');
            const loadingState = resultsDropdown?.querySelector('#searchLoading');
            const noResultsState = resultsDropdown?.querySelector('#noResults');

            if (!input || !resultsDropdown) return;

            let searchTimeout;

            input.addEventListener('input', function() {
                const query = this.value.trim();

                // Hide dropdown if query is too short
                if (query.length < 2) {
                    resultsDropdown.classList.remove('show');
                    return;
                }

                // Clear previous timeout
                clearTimeout(searchTimeout);

                // Show loading state
                loadingState.style.display = 'block';
                resultsList.style.display = 'none';
                noResultsState.style.display = 'none';
                resultsDropdown.classList.add('show');

                // Debounce search
                searchTimeout = setTimeout(() => {
                    fetch(`{{ route('search.suggestions') }}?q=${encodeURIComponent(query)}`)
                        .then(res => res.json())
                        .then(data => {
                            loadingState.style.display = 'none';

                            if (data.length === 0) {
                                resultsList.style.display = 'none';
                                noResultsState.style.display = 'block';
                            } else {
                                noResultsState.style.display = 'none';
                                resultsList.style.display = 'block';

                                resultsList.innerHTML = data.map(item => `
                                    <a href="{{ url('/product-details') }}/${item.id}" class="search-result-item">
                                        <div class="search-result-info">
                                            <p class="search-result-title">${item.product_name}</p>
                                        </div>
                                    </a>
                                `).join('');
                            }
                        })
                        .catch(err => {
                            console.error('Error:', err);
                            loadingState.style.display = 'none';
                            resultsList.style.display = 'none';
                            noResultsState.innerHTML = '<i class="w-icon-exclamation-triangle"></i><p>Error loading results</p>';
                            noResultsState.style.display = 'block';
                        });
                }, 300); // 300ms debounce
            });

            // Show dropdown when input is focused and has value
            input.addEventListener('focus', function() {
                if (this.value.trim().length >= 2) {
                    resultsDropdown.classList.add('show');
                }
            });

            // Hide dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!input.contains(e.target) && !resultsDropdown.contains(e.target)) {
                    resultsDropdown.classList.remove('show');
                }
            });

            // Prevent form submission on Enter if dropdown is visible
            input.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' && resultsDropdown.classList.contains('show')) {
                    const firstResult = resultsList.querySelector('.search-result-item');
                    if (firstResult) {
                        e.preventDefault();
                        window.location.href = firstResult.getAttribute('href');
                    }
                }
            });
        }

        // Desktop search
        setupSearch('#search-product', '#searchResults');

        // Mobile search (if you have mobile search)
        setupSearch('.mobile-menu-container input[name="search_product"]', '#mobileSearchResults');
    });
</script>
-->

<script>
    document.addEventListener("DOMContentLoaded", function() {

        function setupSearch(inputSelector, resultsDropdownSelector, resultsListSelector, loadingSelector, noResultsSelector) {
            const input = document.querySelector(inputSelector);
            const resultsDropdown = document.querySelector(resultsDropdownSelector);
            const resultsList = document.querySelector(resultsListSelector);
            const loadingState = document.querySelector(loadingSelector);
            const noResultsState = document.querySelector(noResultsSelector);

            if (!input || !resultsDropdown) return;

            let searchTimeout;

            input.addEventListener('input', function() {
                const query = this.value.trim();

                if (query.length < 2) {
                    resultsDropdown.classList.remove('show');
                    return;
                }

                clearTimeout(searchTimeout);

                loadingState.style.display = 'block';
                resultsList.style.display = 'none';
                noResultsState.style.display = 'none';
                resultsDropdown.classList.add('show');

                searchTimeout = setTimeout(() => {
                    fetch(`{{ route('search.suggestions') }}?q=${encodeURIComponent(query)}`)
                        .then(res => res.json())
                        .then(data => {
                            loadingState.style.display = 'none';

                            if (data.length === 0) {
                                resultsList.style.display = 'none';
                                noResultsState.style.display = 'block';
                            } else {
                                noResultsState.style.display = 'none';
                                resultsList.style.display = 'block';

                                resultsList.innerHTML = data.map(item => `
                                    <a href="{{ url('/product-details') }}/${item.id}" class="search-result-item">
                                            <p class="search-result-title">${item.product_name}</p>
                                        </div>
                                    </a>
                                `).join('');
                            }
                        })
                        .catch(err => {
                            console.error('Error:', err);
                            loadingState.style.display = 'none';
                            resultsList.style.display = 'none';
                            noResultsState.innerHTML = '<i class="w-icon-exclamation-triangle"></i><p>Error loading results</p>';
                            noResultsState.style.display = 'block';
                        });
                }, 300);
            });

            input.addEventListener('focus', function() {
                if (this.value.trim().length >= 2) {
                    resultsDropdown.classList.add('show');
                }
            });

            document.addEventListener('click', function(e) {
                if (!input.contains(e.target) && !resultsDropdown.contains(e.target)) {
                    resultsDropdown.classList.remove('show');
                }
            });

            input.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' && resultsDropdown.classList.contains('show')) {
                    const firstResult = resultsList.querySelector('.search-result-item');
                    if (firstResult) {
                        e.preventDefault();
                        window.location.href = firstResult.getAttribute('href');
                    }
                }
            });
        }

        // Desktop search
        setupSearch(
            '#search-product',
            '#searchResults',
            '#searchResultsList',
            '#searchLoading',
            '#noResults'
        );

        // Mobile search
        setupSearch(
            '#mobile-search-input',
            '#mobileSearchResults',
            '#mobileSearchResultsList',
            '#mobileSearchLoading',
            '#mobileNoResults'
        );
    });
</script>





<!-- Mirrored from portotheme.com/html/wolmart/{{url('/')}} by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Oct 2025 04:52:13 GMT -->
</html>
