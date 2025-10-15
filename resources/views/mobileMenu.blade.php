<!-- Start of Mobile Menu -->
<div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay"></div>
    <!-- End of .mobile-menu-overlay -->

    <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
    <!-- End of .mobile-menu-close -->

    <div class="mobile-menu-container scrollable">
        <form method="get" action="{{url('product-lists')}}" class="input-wrapper d-none">
            <input type="text" class="form-control" name="search_product" autocomplete="off" placeholder="Search"
                   required />
            <button class="btn btn-search" type="submit">
                <i class="w-icon-search"></i>
            </button>
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
                        <a href="#">Shop</a>
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
