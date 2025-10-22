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
            @include('fronts.components.headerTop')
            <!-- End of Header Top -->

            @include('fronts.components.headerMiddle')
            <!-- End of Header Middle -->

            @include('fronts.components.innerNav')
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

        @include('fronts.components.footer')
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

    @include('fronts.components.newsletterPopup')

    @include('fronts.components.quickView')

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



{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            var $searchProduct = $('#search-product');--}}
{{--            var $suggestionsContainer = $('#search-suggestions-container');--}}

{{--            $searchProduct.on('keyup', function() {--}}
{{--                var query = $(this).val();--}}

{{--                if (query.length > 2) {--}}
{{--                    $.ajax({--}}
{{--                        url: '{{ route("search.suggestions") }}',--}}
{{--                        data: { q: query },--}}
{{--                        success: function(data) {--}}
{{--                            $suggestionsContainer.html('').hide();--}}

{{--                            if (data.length) {--}}
{{--                                $.each(data, function(index, item) {--}}
{{--                                    var suggestion = '' +--}}
{{--                                        '<div class="suggestion-item" data-id="' + item.id + '">' +--}}
{{--                                        '<a href="/product-details/' + item.id + '">' + item.product_name + '</a>' +--}}
{{--                                        '</div>';--}}
{{--                                    $suggestionsContainer.append(suggestion);--}}
{{--                                });--}}
{{--                                $suggestionsContainer.show();--}}
{{--                            }--}}
{{--                        }--}}
{{--                    });--}}
{{--                } else {--}}
{{--                    $suggestionsContainer.hide();--}}
{{--                }--}}
{{--            });--}}

{{--            $(document).on('click', function(e) {--}}
{{--                if (!$(e.target).closest('.header-search').length) {--}}
{{--                    $suggestionsContainer.hide();--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
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

<!-- Mirrored from portotheme.com/html/wolmart/by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Oct 2025 04:52:13 GMT -->
</html>
