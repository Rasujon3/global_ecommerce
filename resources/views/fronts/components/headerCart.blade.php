<div class="header-right ml-4">
    <div class="header-call d-xs-show d-lg-flex align-items-center">
        <a href="tel:#{{ setting()->phone ?? '' }}" class="w-icon-call"></a>
        <div class="call-info d-lg-show">
            <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                <a href="https://portotheme.com/cdn-cgi/l/email-protection#99ba" class="text-capitalize">Phone</a>
            </h4>
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
        {{--                <a href="{{url('/carts')}}" class="cart-toggle label-down link">--}}
        <a href="#" class="cart-toggle label-down link">
            <i class="w-icon-cart">
                <span class="cart-count">{{ $countCart ?? 0}}</span>
            </i>
            <span class="cart-label">Cart</span>
        </a>
        <div class="dropdown-box" id="cart-dropdown-box">
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
                <a href="{{ url('/carts') }}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                <a href="{{ url('/checkout') }}" class="btn btn-primary  btn-rounded">Checkout</a>
            </div>
        </div>
        <!-- End of Dropdown Box -->
    </div>
</div>
