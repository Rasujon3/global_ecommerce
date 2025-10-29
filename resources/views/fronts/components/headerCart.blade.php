<div class="header-right ml-4" id="header-right">
    <div class="header-call d-xs-show d-lg-flex align-items-center">
        <a href="tel:#{{ setting()->phone ?? '' }}" class="w-icon-call"></a>
        <div class="call-info d-lg-show">
            <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                <a href="#" class="text-capitalize">Phone</a>
            </h4>
            <a href="tel:#{{ setting()->phone ?? '' }}" class="phone-number font-weight-bolder ls-50">
                {{ setting()->phone ?? '' }}
            </a>
        </div>
    </div>
    <a class="wishlist label-down link d-xs-show" href="{{url('/wishlists')}}">
        <i class="w-icon-heart"></i>
        <span class="wishlist-label d-lg-show">Wishlist</span>
    </a>
    @include('fronts.components.cart-dropdown')
</div>

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

