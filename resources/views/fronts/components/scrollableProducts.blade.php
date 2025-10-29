<!-- Scrollable products -->
<div class="cart-content">
    <div class="products" id="cart-products-list">
        @forelse($carts as $cart)
            <div class="product product-cart" data-cart-id="{{ $cart->id }}">
                <div class="product-detail">
                    <a href="{{ url('/product-details/'.$cart->product->id) }}" class="product-name">
                        {{ $cart->product->product_name }}
                    </a>
                    <div class="price-box">
                        <div class="quantity-controls">
                            <button type="button" class="btn-quantity btn-decrease" data-cart-id="{{ $cart->id }}" title="Decrease quantity">
                                <i class="w-icon-minus"></i>
                            </button>
                            <span class="product-quantity">{{ $cart->cart_qty }}</span>
                            <button type="button" class="btn-quantity btn-increase" data-cart-id="{{ $cart->id }}" title="Increase quantity">
                                <i class="w-icon-plus"></i>
                            </button>
                        </div>
                        <span class="product-price">{{ discount($cart->product) }} BDT</span>
                    </div>
                </div>
                <figure class="product-media">
                    <button type="button" class="btn-remove-cart" data-cart-id="{{ $cart->id }}" title="Remove from cart">
                        <i class="w-icon-times"></i>
                    </button>
                    <a href="{{ url('/product-details/'.$cart->product->id) }}">
                        <img src="{{ URL::to($cart->product->images[0]->image) }}" alt="product" height="84" width="94" />
                    </a>
                </figure>
            </div>
        @empty
            <p class="text-center py-3">No products in cart</p>
        @endforelse
    </div>
</div>

<!-- Fixed footer -->
<div class="cart-footer">
    <div class="cart-total">
        <label>Subtotal:</label>
        <span class="price" id="cart-subtotal">{{ $sum }} BDT</span>
    </div>
    <div class="cart-action">
        <a href="{{ url('/carts') }}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
        <a href="{{ url('/checkout') }}" class="btn btn-primary btn-rounded">Checkout</a>
    </div>
</div>

<style>
    /* Quantity controls styling */
    .quantity-controls {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 5px;
    }

    .btn-quantity {
        width: 24px;
        height: 24px;
        border: 1px solid #ddd;
        background: #fff;
        border-radius: 3px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        padding: 0;
    }

    .btn-quantity:hover {
        background: #ff6b6b;
        border-color: #ff6b6b;
        color: #fff;
    }

    .btn-quantity:active {
        transform: scale(0.95);
    }

    .btn-quantity i {
        font-size: 12px;
    }

    .product-quantity {
        font-weight: 600;
        min-width: 20px;
        text-align: center;
    }

    /* Remove button styling */
    .product-media {
        position: relative;
    }

    .btn-remove-cart {
        position: absolute;
        top: -5px;
        left: -5px;
        width: 20px;
        height: 20px;
        background: #ff4444;
        color: #fff;
        border: none;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 10;
        transition: all 0.3s ease;
        opacity: 0;
    }

    .product-cart:hover .btn-remove-cart {
        opacity: 1;
    }

    .btn-remove-cart:hover {
        background: #cc0000;
        transform: scale(1.1);
    }

    .btn-remove-cart i {
        font-size: 12px;
    }

    /* Price box layout */
    .price-box {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .product-price {
        font-weight: 600;
        color: #ff6b6b;
    }

    /* Loading state */
    .cart-updating {
        opacity: 0.6;
        pointer-events: none;
    }
</style>

@push('scripts')
    <script src="{{asset('front/assets/vendor/jquery/jquery.min.js')}}"></script>
    <script>
        $(document).ready(function() {

            // Prevent dropdown from closing when clicking inside
            $('#cart-dropdown-box').on('click', function(e) {
                e.stopPropagation();
            });

            // Increase quantity
            $(document).on('click', '.btn-increase', function(e) {
                console.log('btn-increase')
                e.preventDefault();
                e.stopPropagation();

                const cartId = $(this).data('cart-id');
                updateCartQuantity(cartId, 'increase');
            });

            // Decrease quantity
            $(document).on('click', '.btn-decrease', function(e) {
                console.log('btn-decrease')
                e.preventDefault();
                e.stopPropagation();

                const cartId = $(this).data('cart-id');
                updateCartQuantity(cartId, 'decrease');
            });

            // Remove from cart
            $(document).on('click', '.btn-remove-cart', function(e) {
                console.log('remove-cart')
                e.preventDefault();
                e.stopPropagation();

                const cartId = $(this).data('cart-id');
                removeFromCart(cartId);
            });

            // Update cart quantity function
            function updateCartQuantity(cartId, action) {
                // Add loading state
                $('#cart-content-wrapper').addClass('cart-updating');

                $.ajax({
                    url: '{{ url("/cart-update-quantity") }}',
                    type: 'POST',
                    data: {
                        cart_id: cartId,
                        action: action,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.status) {
                            // Update cart content without closing dropdown
                            $('#cart-content-wrapper').html(response.cart_html);
                            $('#header-cart-count').text(response.cart_count);

                            // Show success message (optional)
                            // toastr.success(response.message);
                        } else {
                            toastr.error(response.message || 'Failed to update cart');
                        }
                    },
                    error: function(xhr) {
                        toastr.error('An error occurred while updating cart');
                        console.error('Cart update error:', xhr);
                    },
                    complete: function() {
                        $('#cart-content-wrapper').removeClass('cart-updating');
                    }
                });
            }

            // Remove from cart function
            function removeFromCart(cartId) {
                // Confirm before removing
                if (!confirm('Are you sure you want to remove this item from cart?')) {
                    return;
                }

                // Add loading state
                $('#cart-content-wrapper').addClass('cart-updating');

                $.ajax({
                    url: '{{ url("/cart-delete") }}/' + cartId,
                    type: 'GET',
                    success: function(response) {
                        if (response.status) {
                            // Update cart content
                            $('#cart-content-wrapper').html(response.cart_html);
                            $('#header-cart-count').text(response.cart_count);

                            toastr.success(response.message || 'Item removed from cart');
                        } else {
                            toastr.error(response.message || 'Failed to remove item');
                        }
                    },
                    error: function(xhr) {
                        toastr.error('An error occurred while removing item');
                        console.error('Cart delete error:', xhr);
                    },
                    complete: function() {
                        $('#cart-content-wrapper').removeClass('cart-updating');
                    }
                });
            }

            // Optional: Empty cart button (if you want to add it)
            $(document).on('click', '.btn-empty-cart', function(e) {
                e.preventDefault();

                if (!confirm('Are you sure you want to empty your cart?')) {
                    return;
                }

                $.ajax({
                    url: '{{ url("/cart-empty") }}',
                    type: 'GET',
                    success: function(response) {
                        if (response.status) {
                            $('#cart-content-wrapper').html(response.cart_html);
                            $('#header-cart-count').text(0);
                            toastr.success('Cart emptied successfully');
                        }
                    },
                    error: function(xhr) {
                        toastr.error('Failed to empty cart');
                    }
                });
            });
        });
    </script>
@endpush
