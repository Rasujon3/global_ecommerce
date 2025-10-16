<!-- Start of Mobile Menu -->
<div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay"></div>
    <!-- End of .mobile-menu-overlay -->

    <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
    <!-- End of .mobile-menu-close -->

    <div class="mobile-menu-container scrollable">
        <form method="get" action="{{url('product-lists')}}" class="input-wrapper">
            <input type="text" class="form-control" name="search_product" autocomplete="off" placeholder="Search"
                   required />
            <button class="btn btn-search" type="submit">
                <i class="w-icon-search"></i>
            </button>
            <div id="mobileSearchSuggestions" class="suggestion-box"></div>
        </form>
        <!-- End of Search Form -->
        <div class="tab">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a href="#main-menu" class="nav-link active">Main Menu</a>
                </li>
                <li class="nav-item">
                    <a href="#categories" class="nav-link">Categories</a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="main-menu">
                <ul class="mobile-menu">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>
                        <a href="#">Brands</a>
                        <ul>
                            @if(isset($menuBrands))
                                @foreach($menuBrands as $brand)
                                    <li>
                                        <a href="#">{{ $brand->brand_name }}</a>
                                        <ul>
                                            @foreach($brand->products as $product)
                                                <li>
                                                    <a href="{{ url('/product-details/'.$product->id) }}">
                                                        {{ $product->product_name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    <li><a href="{{url('/about')}}">About Us</a></li>
                    <li><a href="{{url('/contact')}}">Contact Us</a></li>
                    @if(Auth::check())
                        <li>
                            <a href="{{ route('my-account') }}" class="">My Account</a>
                        </li>
                        <li>
                            <a href="{{'/user-logout'}}" class="">{{Auth::user()->name}} ( Logout )</a>
                        </li>
                    @else
                        <li>
                            <a href="{{url('/login-register')}}" class="login sign-in"><i class="w-icon-account"></i>Sign In</a>
                        </li>
                        <li>
                            <a href="{{url('/login-register')}}" class="ml-0 login register">Register</a>
                        </li>
                    @endif

                </ul>
            </div>
            <div class="tab-pane" id="categories">
                <ul class="mobile-menu">
                    @foreach($topCategories as $category)
                        <li>
                            <a href="{{url('/product-lists?category_id='.$category->id)}}">
                                {{ $category->category_name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End of Mobile Menu -->
<script>
(function() {
    // Ensure the script runs after the page is fully loaded
    window.addEventListener('load', function() {
        var searchInput = document.querySelector('.mobile-menu-container input[name="search_product"]');
        var body = document.body;
        var isSearchFocused = false;

        if (!searchInput) {
            console.log('Mobile menu search input not found.');
            return;
        }

        // Flag when the search input is focused
        searchInput.addEventListener('focus', function() {
            isSearchFocused = true;
        });

        searchInput.addEventListener('blur', function() {
            isSearchFocused = false;
        });

        // Create an observer to watch for class changes on the body
        var observer = new MutationObserver(function(mutations) {
            // Only act if the search input is focused
            if (isSearchFocused) {
                mutations.forEach(function(mutation) {
                    // Check if the 'class' attribute was changed
                    if (mutation.attributeName === 'class') {
                        var targetNode = mutation.target;

                        // If the 'mmenu-active' class was removed, add it back
                        if (!targetNode.classList.contains('mmenu-active')) {
                            targetNode.classList.add('mmenu-active');
                        }
                    }
                });
            }
        });

        // Start observing the body for attribute changes
        observer.observe(body, {
            attributes: true
        });
    });
})();
</script>
