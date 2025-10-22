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
            <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
        </div>

        <div class="products">
            @forelse($carts as $cart)
                <div class="product product-cart">
                    <div class="product-detail">
                        <a href="{{url('/product-details/'.$cart->product->id)}}"
                           class="product-name">
                            {{$cart->product->product_name}} @if($cart->productvariant != null)( {{$cart->productvariant->variant_value}} )@endif
                        </a>
                        <div class="price-box">
                            <span class="product-quantity">
                                {{$cart->cart_qty}}
                            </span>
                            <span class="product-price">
                                @if($cart->productvariant == null)
                                    {{discount($cart->product)}} BDT
                                @else
                                    {{$cart->productvariant->pricevariant_price}} BDT
                                @endif
                            </span>
                        </div>
                    </div>
                    <figure class="product-media">
                        <a href="{{url('/product-details/'.$cart->product->id)}}">
                            <img
                                src="{{URL::to($cart->product->images[0]->image)}}"
                                alt="product"
                                height="84"
                                width="94"
                            />
                        </a>
                    </figure>
                    <button
                        class="btn btn-link btn-close remove-cart"
                        aria-label="button"
                        data-id="{{ $cart->id }}"
                    >
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            @empty
                <p class="text-center p-3">Cart is empty.</p>
            @endforelse
        </div>

        <div class="cart-total">
            <label>Subtotal:</label>
            <span class="price">{{ $sum }} BDT</span>
        </div>

        <div class="cart-action">
            <a href="{{ url('/carts') }}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
            <a href="{{ url('/checkout') }}" class="btn btn-primary  btn-rounded">Checkout</a>
        </div>
    </div>
    <!-- End of Dropdown Box -->
</div>

<script>
    $(document).on('click', '.remove-cart', function(e){
        e.preventDefault();
        cart_id = $(this).data('id');
        if(confirm('Do you want to delete this?'))
        {
            $.ajax({

                url: "{{url('/cart-delete')}}/"+cart_id,

                type:"GET",
                dataType:"json",
                success:function(data) {

                    $('#cart_'+cart_id).remove();
                    $('.cart-count').text(data.cart_count);
                    cartCal();
                    toastr.success(data.message);

                },

            });
        }
    });
</script>
