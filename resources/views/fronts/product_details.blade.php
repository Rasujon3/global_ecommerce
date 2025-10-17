@extends('front_master')
@section('front_content')
 <!-- Start of Main -->
        <main class="main mb-10 pb-1">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav container">
                <ul class="breadcrumb bb-no">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Products</li>
                </ul>
                <ul class="product-nav list-style-none d-none">
                    <li class="product-nav-prev">
                        <a href="#">
                            <i class="w-icon-angle-left"></i>
                        </a>
                        <span class="product-nav-popup">
                            <img src="{{asset('front/assets')}}/images/products/product-nav-prev.jpg" alt="Product" width="110"
                                height="110" />
                            <span class="product-name">{{$product->product_name}}</span>
                        </span>
                    </li>
                    <li class="product-nav-next">
                        <a href="#">
                            <i class="w-icon-angle-right"></i>
                        </a>
                        <span class="product-nav-popup">
                            <img src="{{asset('front/assets')}}/images/products/product-nav-next.jpg" alt="Product" width="110"
                                height="110" />
                            <span class="product-name">{{$product->product_name}}</span>
                        </span>
                    </li>
                </ul>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Page Content -->
            <div class="page-content">
                <div class="container">
                    <div class="row gutter-lg">
                        <div class="main-content">
                            <div class="product product-single row">
                                <div class="col-md-6 mb-6">
                                    <div class="product-gallery product-gallery-sticky">
                                        <div class="swiper-container product-single-swiper swiper-theme nav-inner" data-swiper-options="{
                                            'navigation': {
                                                'nextEl': '.swiper-button-next',
                                                'prevEl': '.swiper-button-prev'
                                            }
                                        }">
                                            <div class="swiper-wrapper row cols-1 gutter-no">
                                                @if($product->images && count($product->images) > 0)
                                                    @foreach($product->images as $image)
                                                        <div class="swiper-slide">
                                                            <figure class="product-image">
                                                                <img src="{{ URL::to($image->image) }}" data-zoom-image="{{ URL::to($image->image) }}" alt="{{ $product->product_name }}" width="800" height="900">
                                                            </figure>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="swiper-slide">
                                                        <figure class="product-image">
                                                            <img src="{{ URL::to(setting()->no_img) }}" alt="Default Product Image" width="800" height="900">
                                                        </figure>
                                                    </div>
                                                @endif
                                                @if(count($product->productvariants) > 0)
                                                    @foreach($product->productvariants as $variant)
                                                        <div class="swiper-slide">
                                                            <figure class="product-image">
                                                                <img src="{{URL::to($variant->image)}}" data-zoom-image="{{URL::to($variant->image)}}" alt="Electronics Black Wrist Watch" width="488" height="549">
                                                            </figure>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <button class="swiper-button-next"></button>
                                            <button class="swiper-button-prev"></button>
                                            <a href="#" class="product-gallery-btn product-image-full"><i class="w-icon-zoom"></i></a>
                                        </div>
                                        <div class="product-thumbs-wrap swiper-container" data-swiper-options="{
                                            'navigation': {
                                                'nextEl': '.swiper-button-next',
                                                'prevEl': '.swiper-button-prev'
                                            }
                                        }">
                                            <div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">
                                                @if($product->images && count($product->images) > 0)
                                                    @foreach($product->images as $image)
                                                        <div class="product-thumb swiper-slide">
                                                            <img src="{{ URL::to($image->image) }}" alt="{{ $product->product_name }}" width="800" height="900">
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="product-thumb swiper-slide">
                                                        <img src="{{ URL::to($product->image) }}" alt="Default Product Image" width="800" height="900">
                                                    </div>
                                                @endif
                                                @if(count($product->productvariants) > 0)
                                                    @foreach($product->productvariants as $variant)
                                                        <div class="product-thumb swiper-slide">
                                                            <img src="{{URL::to($variant->image)}}" alt="Product Thumb" width="800" height="900">
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <button class="swiper-button-next"></button>
                                            <button class="swiper-button-prev"></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 mb-md-6">
                                    <div class="product-details" data-sticky-options="{'minWidth': 767}">
                                        <h1 class="product-title">{{$product->product_name}}</h1>
                                        <div class="product-bm-wrapper">
                                            <figure class="brand">
                                                <img src="{{URL::to($product->brand->image ?? '')}}" alt="Brand"
                                                    width="102" height="48" />
                                            </figure>
                                            <div class="product-meta">
                                                <div class="product-categories">
                                                    Brand:
                                                    <span class="product-category">
                                                        <a href="{{ ($product->brand && $product->brand->id) ? url('/product-lists?brand_id='.$product->brand?->id) : '#' }}">{{ $product->brand?->brand_name ?? '' }}</a>
                                                    </span>
                                                </div>
                                                <div class="product-sku d-none">
                                                    SKU: <span>MS46891340</span>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="product-divider">

                                        <div class="product-price">
                                          @if($product->discount > 0)
                                            <ins class="new-price">{{discount($product)}} BDT</ins><del
                                                class="old-price">{{$product->product_price}}BDT</del>
                                          @else
                                            <ins class="new-price">{{$product->product_price}} BDT</ins>
                                          @endif
                                        </div>

                                        <div class="ratings-container d-none">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 80%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="#" class="rating-reviews scroll-to">(3
                                                Reviews)</a>
                                        </div>

                                        <div class="product-short-desc d-none">
                                            <ul class="list-type-check list-style-none">
                                                <li>Ultrices eros in cursus turpis massa cursus mattis.</li>
                                                <li>Volutpat ac tincidunt vitae semper quis lectus.</li>
                                                <li>Aliquam id diam maecenas ultricies mi eget mauris.</li>
                                            </ul>
                                        </div>
                                        @if(count($variants) > 0)
                                        <hr class="product-divider">
                                        @foreach($variants as $variant)
                                        @if($variant->variant_name == 'Color' || $variant->variant_name == 'color')
                                        <div class="product-form product-variation-form product-color-swatch">
                                            <label>{{$variant->variant_name}}:</label>
                                            <div class="d-flex align-items-center product-variations">
                                            	@foreach($variant->productvariants as $row)
                                                <a href="#" class="color select-variant" style="background-color: {{$row->variant_value}}" data-id="{{$row->id}}"></a>
                                                @endforeach
                                            </div>
                                        </div>
                                        @else

                                        <div class="product-form product-variation-form product-size-swatch">
					                        <label class="mb-1">{{$variant->variant_name}}:</label>
					                        <div class="flex-wrap d-flex align-items-center product-variations">
					                          @foreach($variant->productvariants as $row)
					                            <a href="#" class="size select-variant"  data-id="{{$row->id}}">{{$row->variant_value}}</a>
					                          @endforeach
					                        </div>
					                        <a href="#" class="product-variation-clean">Clean All</a>
					                    </div>

					                    @endif

					                    @endforeach

                                       @endif


                                        <div class="product-variant-price">
                                            <span></span>
                                        </div>

                                        <div class="fix-bottom product-sticky-content sticky-content">
                                            <div class="product-form container">
                                                <div class="product-qty-form">
                                                    <div class="input-group">
                                                        <input class="quantity form-control" type="number" min="1"
                                                            max="10000000">
                                                        <button class="quantity-plus w-icon-plus"></button>
                                                        <button class="quantity-minus w-icon-minus"></button>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary btn-cart add-cart" type="button" data-id="{{$product->id}}">
                                                    <i class="w-icon-cart"></i>
                                                    <span>Add to Cart</span>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="social-links-wrapper d-none">
                                            <div class="social-links">
                                                <div class="social-icons social-no-color border-thin">
                                                    <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                                    <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                                    <a href="#"
                                                        class="social-icon social-pinterest fab fa-pinterest-p"></a>
                                                    <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                                                    <a href="#"
                                                        class="social-icon social-youtube fab fa-linkedin-in"></a>
                                                </div>
                                            </div>
                                            <span class="divider d-xs-show"></span>
                                            <div class="product-link-wrapper d-flex">
                                                <a href="#"
                                                    class="btn-product-icon btn-wishlist w-icon-heart"><span></span></a>
                                                <a href="#"
                                                    class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="frequently-bought-together mt-5 d-none">
                                <h2 class="title title-underline">Frequently Bought Together</h2>
                                <div class="bought-together-products row mt-8 pb-4">
                                    <div class="product product-wrap text-center">
                                        <figure class="product-media">
                                            <img src="{{asset('front/assets')}}/images/products/default/bought-1.jpg" alt="Product"
                                                width="138" height="138" />
                                            <div class="product-checkbox">
                                                <input type="checkbox" class="custom-checkbox" id="product_check1"
                                                    name="product_check1">
                                                <label></label>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name">
                                                <a href="#">Electronics Black Wrist Watch</a>
                                            </h4>
                                            <div class="product-price">$40.00</div>
                                        </div>
                                    </div>
                                    <div class="product product-wrap text-center">
                                        <figure class="product-media">
                                            <img src="{{asset('front/assets')}}/images/products/default/bought-2.jpg" alt="Product"
                                                width="138" height="138" />
                                            <div class="product-checkbox">
                                                <input type="checkbox" class="custom-checkbox" id="product_check2"
                                                    name="product_check2">
                                                <label></label>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name">
                                                <a href="#">Apple Laptop</a>
                                            </h4>
                                            <div class="product-price">$1,800.00</div>
                                        </div>
                                    </div>
                                    <div class="product product-wrap text-center">
                                        <figure class="product-media">
                                            <img src="{{asset('front/assets')}}/images/products/default/bought-3.jpg" alt="Product"
                                                width="138" height="138" />
                                            <div class="product-checkbox">
                                                <input type="checkbox" class="custom-checkbox" id="product_check3"
                                                    name="product_check3">
                                                <label></label>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name">
                                                <a href="#">White Lenovo Headphone</a>
                                            </h4>
                                            <div class="product-price">$34.00</div>
                                        </div>
                                    </div>
                                    <div class="product-button">
                                        <div class="bought-price font-weight-bolder text-primary ls-50">$1,874.00</div>
                                        <div class="bought-count">For 3 items</div>
                                        <a href="cart.html" class="btn btn-dark btn-rounded">Add All To Cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab tab-nav-boxed tab-nav-underline product-tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a href="#product-tab-description" class="nav-link active">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#review-tab" class="nav-link">Review</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a href="#product-tab-specification" class="nav-link">Specification</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#product-tab-vendor" class="nav-link">Vendor Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#product-tab-reviews" class="nav-link">Customer Reviews (3)</a>
                                    </li> --}}
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="product-tab-description">
                                        <div class="row mb-4">
                                            <div class="col-md-12 mb-5">
                                                <h4 class="title tab-pane-title font-weight-bold mb-2">Detail</h4>
                                                {!!$product->description!!}
                                            </div>
                                            <div class="col-md-6 mb-5 d-none">
                                                <div class="banner banner-video product-video br-xs">
                                                    <figure class="banner-media">
                                                        <a href="#">
                                                            <img src="{{asset('front/assets')}}/images/products/video-banner-610x300.jpg"
                                                                alt="banner" width="610" height="300"
                                                                style="background-color: #bebebe;">
                                                        </a>
                                                        <a class="btn-play-video btn-iframe"
                                                            href="{{asset('front/assets')}}/video/memory-of-a-woman.mp4"></a>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row cols-md-3 d-none">
                                            <div class="mb-3">
                                                <h5 class="sub-title font-weight-bold"><span class="mr-3">1.</span>Free
                                                    Shipping &amp; Return</h5>
                                                <p class="detail pl-5">We offer free shipping for products on orders
                                                    above 50$ and offer free delivery for all orders in US.</p>
                                            </div>
                                            <div class="mb-3">
                                                <h5 class="sub-title font-weight-bold"><span>2.</span>Free and Easy
                                                    Returns</h5>
                                                <p class="detail pl-5">We guarantee our products and you could get back
                                                    all of your money anytime you want in 30 days.</p>
                                            </div>
                                            <div class="mb-3">
                                                <h5 class="sub-title font-weight-bold"><span>3.</span>Special Financing
                                                </h5>
                                                <p class="detail pl-5">Get 20%-50% off items over 50$ for a month or
                                                    over 250$ for a year with our special credit card.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="review-tab">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h4 class="title tab-pane-title font-weight-bold mb-4">Customer Reviews</h4>
                                                <ul class="comments list-style-none">
                                                    @forelse($product->reviews->where('status', 'approved') as $review)
                                                        <li class="comment">
                                                            <div class="comment-body">
                                                                <figure class="comment-avatar">
                                                                    <img src="{{ asset('defaults/profile.png') }}" alt="avatar" width="90" height="90">
                                                                </figure>
                                                                <div class="comment-content">
                                                                    <h4 class="comment-author">
                                                                        <a href="#">{{ $review->user->name }}</a>
                                                                        <span class="comment-date">{{ $review->created_at->format('M d, Y') }}</span>
                                                                    </h4>
                                                                    <div class="ratings-container comment-rating">
                                                                        <div class="ratings-full">
                                                                            <span class="ratings" style="width: {{ $review->rating * 20 }}%;"></span>
                                                                            <span class="tooltiptext tooltip-top"></span>
                                                                        </div>
                                                                    </div>
                                                                    <p>{{ $review->description }}</p>
                                                                    @if($review->image)
                                                                        <a href="{{ asset($review->image) }}" target="_blank">
                                                                            <img src="{{ asset($review->image) }}" alt="review image" width="100">
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @empty
                                                        <li class="comment">
                                                            <p>No reviews for this product yet.</p>
                                                        </li>
                                                    @endforelse
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <hr class="mt-6 mb-6">
                                                @auth
                                                    <h4 class="title tab-pane-title font-weight-bold mb-4">Add a Review</h4>
                                                    <form action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data" class="review-form">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        <div class="form-group">
                                                            <label>Your rating for this product</label>
                                                            <div class="ratings-container">
                                                                <div class="rating-stars">
                                                                    <a class="star-1" href="#">1</a>
                                                                    <a class="star-2" href="#">2</a>
                                                                    <a class="star-3" href="#">3</a>
                                                                    <a class="star-4" href="#">4</a>
                                                                    <a class="star-5" href="#">5</a>
                                                                </div>
                                                                <input type="hidden" name="rating" id="rating-value" required>
                                                                @error('rating')
                                                                <span class="alert alert-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description">Your review</label>
                                                            <textarea id="description" name="description" cols="30" rows="6" class="form-control" required></textarea>
                                                            @error('bkash_no')
                                                            <span class="alert alert-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="image">Upload Image (optional)</label>
                                                            <input type="file" id="image" name="image" class="form-control">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Submit Review</button>
                                                    </form>
                                                @else
                                                    <p>Please <a class="login sign-in" href="{{ url('/login-register') }}">login</a> to write a review.</p>
                                                @endauth
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <section class="vendor-product-section d-none">
                                <div class="title-link-wrapper mb-4">
                                    <h4 class="title text-left">More Products From This Vendor</h4>
                                    <a href="#" class="btn btn-dark btn-link btn-slide-right btn-icon-right">More
                                        Products<i class="w-icon-long-arrow-right"></i></a>
                                </div>
                                <div class="swiper-container swiper-theme" data-swiper-options="{
                                    'spaceBetween': 20,
                                    'slidesPerView': 2,
                                    'breakpoints': {
                                        '576': {
                                            'slidesPerView': 3
                                        },
                                        '768': {
                                            'slidesPerView': 4
                                        },
                                        '992': {
                                            'slidesPerView': 3
                                        }
                                    }
                                }">
                                    <div class="swiper-wrapper row cols-lg-3 cols-md-4 cols-sm-3 cols-2">
                                      @foreach($relatedProducts as $product)
                                        <div class="swiper-slide product">
                                            <figure class="product-media">
                                                <a href="product-default.html">
                                                    <img src="{{URL::to($product->image)}}" alt="Product"
                                                        width="300" height="338" />
                                                    <img src="{{URL::to($product->image)}}" alt="Product"
                                                        width="300" height="338" />
                                                </a>
                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                        title="Add to cart"></a>
                                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                        title="Add to wishlist"></a>
                                                </div>
                                                <div class="product-action d-none">
                                                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                        View</a>
                                                </div>
                                            </figure>
                                            <div class="product-details d-none">
                                                <div class="product-cat"><a href="shop-banner-sidebar.html">Accessories</a>
                                                </div>
                                                <h4 class="product-name"><a href="product-default.html">Sticky Pencil</a>
                                                </h4>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 100%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                                </div>
                                                <div class="product-pa-wrapper">
                                                    <div class="product-price">$20.00</div>
                                                </div>
                                            </div>
                                        </div>
                                      @endforeach
                                    </div>
                                </div>
                            </section>

                            <section class="related-product-section">
                                <div class="title-link-wrapper mb-4">
                                    <h4 class="title">Related Products</h4>
                                    <a href="#" class="btn btn-dark btn-link btn-slide-right btn-icon-right">
                                        More Products<i class="w-icon-long-arrow-right"></i>
                                    </a>
                                </div>

                                <div class="swiper-container swiper-theme" data-swiper-options="{
        'spaceBetween': 20,
        'slidesPerView': 2,
        'breakpoints': {
            '576': { 'slidesPerView': 3 },
            '768': { 'slidesPerView': 4 },
            '992': { 'slidesPerView': 3 }
        }
    }">
                                    <div class="swiper-wrapper row cols-lg-3 cols-md-4 cols-sm-3 cols-2">
                                        @foreach($relatedProducts as $product)
                                            <div class="swiper-slide product">
                                                <figure class="product-media">

                                                    {{-- Inner Swiper for multiple product images --}}
                                                    <div class="swiper-container inner-swiper" data-swiper-options="{
                            'slidesPerView': 1,
                            'spaceBetween': 0,
                            'pagination': {
                                'el': '.swiper-pagination-{{ $product->id }}',
                                'clickable': true
                            },
                            'navigation': {
                                'nextEl': '.swiper-button-next-{{ $product->id }}',
                                'prevEl': '.swiper-button-prev-{{ $product->id }}'
                            }
                        }">
                                                        <div class="swiper-wrapper">
                                                            @if($product->images && count($product->images) > 0)
                                                                @foreach($product->images as $image)
                                                                    <div class="swiper-slide">
                                                                        <a href="{{ url('/product-details/'.$product->id) }}">
                                                                            <img src="{{ URL::to($image->image) }}"
                                                                                 alt="{{ $product->product_name }}"
                                                                                 width="300" height="338">
                                                                        </a>
                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                <div class="swiper-slide">
                                                                    <a href="{{ url('/product-details/'.$product->id) }}">
                                                                        <img src="{{ URL::to(setting()->no_img) }}"
                                                                             alt="Default Product Image"
                                                                             width="300" height="338">
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        </div>

                                                        <!-- Pagination -->
                                                        <div class="swiper-pagination swiper-pagination-{{ $product->id }}"></div>

                                                        <!-- Navigation -->
                                                        <div class="swiper-button-next swiper-button-next-{{ $product->id }}"></div>
                                                        <div class="swiper-button-prev swiper-button-prev-{{ $product->id }}"></div>
                                                    </div>
                                                    {{-- End inner swiper --}}

                                                    <div class="product-action-vertical">
                                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart add-to-cart"
                                                           title="Add to cart" data-id="{{ $product->id }}"></a>
                                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                           title="Add to wishlist"></a>
                                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare d-none"
                                                           title="Add to Compare"></a>
                                                    </div>
                                                </figure>

                                                <div class="product-details">
                                                    <h4 class="product-name">
                                                        <a href="{{ url('/product-details/'.$product->id) }}">{{ $product->product_name }}</a>
                                                    </h4>

                                                    <div class="product-pa-wrapper">
                                                        <div class="product-price">
                                                            @if($product->discount > 0)
                                                                <ins class="new-price">{{ discount($product) }} BDT</ins>
                                                                <del class="old-price">{{ $product->product_price }} BDT</del>
                                                            @else
                                                                <ins class="new-price">{{ $product->product_price }} BDT</ins>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </section>

                        </div>
                        <!-- End of Main Content -->
                        <aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">
                            <div class="sidebar-overlay"></div>
                            <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                            <a href="#" class="sidebar-toggle d-flex d-lg-none"><i class="fas fa-chevron-left"></i></a>
                            <div class="sidebar-content scrollable">
                                <div class="sticky-sidebar">
                                    <div class="widget widget-icon-box mb-6">
                                        <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-truck"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <h4 class="icon-box-title">Free Shipping & Returns</h4>
                                                <p>For all orders over $99</p>
                                            </div>
                                        </div>
                                        <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-bag"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <h4 class="icon-box-title">Secure Payment</h4>
                                                <p>We ensure secure payment</p>
                                            </div>
                                        </div>
                                        <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-money"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <h4 class="icon-box-title">Money Back Guarantee</h4>
                                                <p>Any back within 30 days</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Widget Icon Box -->

                                    <div class="widget widget-banner mb-9 d-none">
                                        <div class="banner banner-fixed br-sm">
                                            <figure>
                                                <img src="{{asset('front/assets')}}/images/shop/banner3.jpg" alt="Banner" width="266"
                                                    height="220" style="background-color: #1D2D44;" />
                                            </figure>
                                            <div class="banner-content">
                                                <div class="banner-price-info font-weight-bolder text-white lh-1 ls-25">
                                                    40<sup class="font-weight-bold">%</sup><sub
                                                        class="font-weight-bold text-uppercase ls-25">Off</sub>
                                                </div>
                                                <h4
                                                    class="banner-subtitle text-white font-weight-bolder text-uppercase mb-0">
                                                    Ultimate Sale</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Widget Banner -->

                                    <div class="widget widget-products d-none">
                                        <div class="title-link-wrapper mb-2">
                                            <h4 class="title title-link font-weight-bold">More Products</h4>
                                        </div>

                                        <div class="swiper nav-top">
                                            <div class="swiper-container swiper-theme nav-top" data-swiper-options = "{
                                                'slidesPerView': 1,
                                                'spaceBetween': 20,
                                                'navigation': {
                                                    'prevEl': '.swiper-button-prev',
                                                    'nextEl': '.swiper-button-next'
                                                }
                                            }">
                                                <div class="swiper-wrapper">
                                                    <div class="widget-col swiper-slide">
                                                        <div class="product product-widget">
                                                            <figure class="product-media">
                                                                <a href="#">
                                                                    <img src="{{asset('front/assets')}}/images/shop/13.jpg" alt="Product"
                                                                        width="100" height="113" />
                                                                </a>
                                                            </figure>
                                                            <div class="product-details">
                                                                <h4 class="product-name">
                                                                    <a href="#">Smart Watch</a>
                                                                </h4>
                                                                <div class="ratings-container">
                                                                    <div class="ratings-full">
                                                                        <span class="ratings" style="width: 100%;"></span>
                                                                        <span class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="product-price">$80.00 - $90.00</div>
                                                            </div>
                                                        </div>
                                                        <div class="product product-widget">
                                                            <figure class="product-media">
                                                                <a href="#">
                                                                    <img src="{{asset('front/assets')}}/images/shop/14.jpg" alt="Product"
                                                                        width="100" height="113" />
                                                                </a>
                                                            </figure>
                                                            <div class="product-details">
                                                                <h4 class="product-name">
                                                                    <a href="#">Sky Medical Facility</a>
                                                                </h4>
                                                                <div class="ratings-container">
                                                                    <div class="ratings-full">
                                                                        <span class="ratings" style="width: 80%;"></span>
                                                                        <span class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="product-price">$58.00</div>
                                                            </div>
                                                        </div>
                                                        <div class="product product-widget">
                                                            <figure class="product-media">
                                                                <a href="#">
                                                                    <img src="{{asset('front/assets')}}/images/shop/15.jpg" alt="Product"
                                                                        width="100" height="113" />
                                                                </a>
                                                            </figure>
                                                            <div class="product-details">
                                                                <h4 class="product-name">
                                                                    <a href="#">Black Stunt Motor</a>
                                                                </h4>
                                                                <div class="ratings-container">
                                                                    <div class="ratings-full">
                                                                        <span class="ratings" style="width: 60%;"></span>
                                                                        <span class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="product-price">$374.00</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="widget-col swiper-slide">
                                                        <div class="product product-widget">
                                                            <figure class="product-media">
                                                                <a href="#">
                                                                    <img src="{{asset('front/assets')}}/images/shop/16.jpg" alt="Product"
                                                                        width="100" height="113" />
                                                                </a>
                                                            </figure>
                                                            <div class="product-details">
                                                                <h4 class="product-name">
                                                                    <a href="#">Skate Pan</a>
                                                                </h4>
                                                                <div class="ratings-container">
                                                                    <div class="ratings-full">
                                                                        <span class="ratings" style="width: 100%;"></span>
                                                                        <span class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="product-price">$278.00</div>
                                                            </div>
                                                        </div>
                                                        <div class="product product-widget">
                                                            <figure class="product-media">
                                                                <a href="#">
                                                                    <img src="{{asset('front/assets')}}/images/shop/17.jpg" alt="Product"
                                                                        width="100" height="113" />
                                                                </a>
                                                            </figure>
                                                            <div class="product-details">
                                                                <h4 class="product-name">
                                                                    <a href="#">Modern Cooker</a>
                                                                </h4>
                                                                <div class="ratings-container">
                                                                    <div class="ratings-full">
                                                                        <span class="ratings" style="width: 80%;"></span>
                                                                        <span class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="product-price">$324.00</div>
                                                            </div>
                                                        </div>
                                                        <div class="product product-widget">
                                                            <figure class="product-media">
                                                                <a href="#">
                                                                    <img src="{{asset('front/assets')}}/images/shop/18.jpg" alt="Product"
                                                                        width="100" height="113" />
                                                                </a>
                                                            </figure>
                                                            <div class="product-details">
                                                                <h4 class="product-name">
                                                                    <a href="#">CT Machine</a>
                                                                </h4>
                                                                <div class="ratings-container">
                                                                    <div class="ratings-full">
                                                                        <span class="ratings" style="width: 100%;"></span>
                                                                        <span class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="product-price">$236.00</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="swiper-button-next"></button>
                                                <button class="swiper-button-prev"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>
                        <!-- End of Sidebar -->
                    </div>
                </div>
            </div>
            <!-- End of Page Content -->
        </main>
        <!-- End of Main -->
@endsection

@push('scripts')
 <script>
 	let variant_id;
 	let productvariant_ids = [];
 	let base_url = "{{url('/')}}";

   $(document).ready(function(){
   	 $(document).on('click', '.select-variant', function(e){
   	 	e.preventDefault();
   	 	variant_id = $(this).data('id');
   	 	$.ajax({

            url: "{{url('/product-variant-details')}}/"+variant_id,

                type:"GET",
                dataType:"json",
                success:function(data) {
                	if(data.status == true){
                        var newImage = base_url + '/' + data.variant.image;
                        var $productImage = $('.product-single-swiper .swiper-slide:first-child .product-image img');
                        $productImage.attr('src', newImage);
                        $productImage.attr('data-zoom-image', newImage);

                        // Update swiper
                        if (Wolmart.slider) {
                            var $slider = $('.product-single-swiper');
                            if ($slider.data('slider')) {
                                $slider.data('slider').update();
                            }
                        }
                	}

                    productvariant_ids.push(variant_id);

            },

	    });

   	 });

   	 $(document).on('click', '.product-variation-clean', function(e){
   	 	e.preventDefault();
   	 	productvariant_ids = [];
   	 });

   	 $(document).on('click', '.add-cart', function(e){
   	 	e.preventDefault();
   	 	let product_id = $(this).data('id');
   	 	//alert(product_id);
   	 	let use_for = "product";
   	 	let qty = $('.quantity').val();
   	 	let redirectUrl = base_url+"/carts";
   	 	$.ajax({

            url: "{{url('/add-to-cart')}}",

                type:"GET",
                data:{'element_id':product_id,'productvariant_ids':productvariant_ids,'use_for':use_for,'qty':qty},
                dataType:"json",
                success:function(data) {
                	toastr.success(data.message);
                	setTimeout(function() {
					    window.location.href = redirectUrl;
					}, 1000);
            },

	    });

   	 });
      	 });
    </script>
   <script>
       // Simple star rating script
       document.addEventListener('DOMContentLoaded', function() {
           var stars = document.querySelectorAll('.rating-stars a');
           var ratingInput = document.getElementById('rating-value');

           if (stars.length && ratingInput) {
               stars.forEach(function(star, index) {
                   star.addEventListener('click', function(e) {
                       e.preventDefault();
                       ratingInput.value = index + 1;

                       // Visual feedback
                       stars.forEach(function(s, i) {
                           if (i <= index) {
                               s.classList.add('active');
                           } else {
                               s.classList.remove('active');
                           }
                       });
                   });
               });
           }
       });
   </script>
   @endpush
