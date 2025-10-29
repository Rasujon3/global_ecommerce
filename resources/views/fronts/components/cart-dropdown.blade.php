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
    <a href="#" class="cart-toggle label-down link">
        <i class="w-icon-cart">
            <span class="cart-count" id="header-cart-count">{{ $carts->count() }}</span>
        </i>
        <span class="cart-label">Cart</span>
    </a>
    <div class="dropdown-box" id="cart-dropdown-box">
        <div class="cart-header">
            <span>Shopping Cart</span>
            <a href="#" class="btn-close cart-close-btn" data-target="cart">
                Close <i class="w-icon-long-arrow-right"></i>
            </a>
        </div>
        <div id="cart-content-wrapper">
            @include('fronts.components.scrollableProducts')
        </div>
    </div>
</div>

<style>
    #cart-dropdown-box {
        display: flex;
        flex-direction: column;
        max-height: 100%;
        width: 320px;
    }

    .cart-content {
        overflow-y: auto;
        flex: 1;
        padding-right: 6px;
        margin-bottom: 10px;
    }

    .cart-footer {
        border-top: 1px solid #eee;
        background: #fff;
        padding: 12px;
        flex-shrink: 0;
        position: sticky;
        bottom: 0;
    }

    .cart-content::-webkit-scrollbar {
        width: 6px;
    }
    .cart-content::-webkit-scrollbar-thumb {
        background-color: #ccc;
        border-radius: 3px;
    }
</style>

@push('scripts')
    <script src="{{asset('front/assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('front/assets/js/main.min.js')}}"></script>
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
