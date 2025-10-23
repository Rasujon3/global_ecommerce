@php
    use App\Models\Cart;
    $carts = Cart::with('product','productvariant', 'product.images')
                ->where('cart_session_id',Session::get('cart_session_id'))
                ->latest()
                ->get();

    $sum = Cart::where('cart_session_id',Session::get('cart_session_id'))
        ->sum('unit_total');
@endphp

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
            <a href="#" class="btn-close" data-target="cart">
                Close <i class="w-icon-long-arrow-right"></i>
            </a>
        </div>

        <!-- Scrollable products -->
        <div class="cart-content">
            <div class="products">
                @foreach($carts as $cart)
                    <div class="product product-cart">
                        <div class="product-detail">
                            <a href="{{ url('/product-details/'.$cart->product->id) }}" class="product-name">
                                {{ $cart->product->product_name }}
                            </a>
                            <div class="price-box">
                                <span class="product-quantity">{{ $cart->cart_qty }} </span>
                                <span class="product-price">{{ discount($cart->product) }} BDT</span>
                            </div>
                        </div>
                        <figure class="product-media">
                            <a href="{{ url('/product-details/'.$cart->product->id) }}">
                                <img src="{{ URL::to($cart->product->images[0]->image) }}" alt="product" height="84" width="94" />
                            </a>
                        </figure>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Fixed footer -->
        <div class="cart-footer">
            <div class="cart-total">
                <label>Subtotal:</label>
                <span class="price">{{ $sum }} BDT</span>
            </div>
            <div class="cart-action">
                <a href="{{ url('/carts') }}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                <a href="{{ url('/checkout') }}" class="btn btn-primary btn-rounded">Checkout</a>
            </div>
        </div>
    </div>
    <!-- End of Dropdown Box -->
</div>

<style>
    /* Ensure dropdown-box has a proper height */
    #cart-dropdown-box {
        display: flex;
        flex-direction: column;
        max-height: 100%; /* Adjust as needed */
        width: 320px; /* optional, for consistent layout */
    }

    /* Scrollable middle area */
    .cart-content {
        overflow-y: auto;
        flex: 1;
        padding-right: 6px; /* avoid scrollbar overlap */
        margin-bottom: 10px;
    }

    /* Fix footer to bottom */
    .cart-footer {
        border-top: 1px solid #eee;
        background: #fff;
        padding: 12px;
        flex-shrink: 0;
        position: sticky;
        bottom: 0;
    }

    /* Optional: make smooth scrolling look nice */
    .cart-content::-webkit-scrollbar {
        width: 6px;
    }
    .cart-content::-webkit-scrollbar-thumb {
        background-color: #ccc;
        border-radius: 3px;
    }
</style>

@push('scripts')

@endpush
