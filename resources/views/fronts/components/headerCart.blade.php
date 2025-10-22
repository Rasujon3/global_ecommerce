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
    @include('fronts.components.cart-dropdown')
</div>
