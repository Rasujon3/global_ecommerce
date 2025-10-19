@extends('front_master')
@section('front_content')
<div class="container">
                @include('fronts.components.intro')
                <!-- End of Iocn Box Wrapper -->

                @include('fronts.components.bannerOne')
                <!-- End of Category Banner Wrapper -->

{{--                @include('fronts.components.deals')--}}
            </div>

{{--            @include('fronts.components.topCat')--}}

            @include('fronts.components.arrivalProducts')
            @include('fronts.components.bestSellerProducts')

            <!-- End of .category-section top-category -->

            @include('fronts.components.featuredProducts')
@endsection

@push('scripts')
 <script>
   $(document).ready(function(){
      let product_id;
      $(document).on('click', '.add-to-cart', function(e){
         e.preventDefault();
         product_id = $(this).data('id');
         $.ajax({

            url: "{{url('/add-to-cart')}}",

                 type:"GET",
                 data:{'use_for':'product','element_id':product_id},
                 dataType:"json",
                 success:function(data) {
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true,
                        "positionClass": "toast-bottom-left",
                        "timeOut": "3000"
                    };
                    if(data.status == false){

                        toastr.error(data.message);
                    }else{
                        $('.cart-count').text(data.cart_count);
                        toastr.success(data.message);
                    }
            },

         });
      });

      $(document).on('click', '.add-wishlist', function(e){
         e.preventDefault();
         product_id = $(this).data('id');
         $.ajax({

            url: "{{url('/add-wishlist')}}/"+product_id,

                 type:"GET",
                 dataType:"json",
                 success:function(data) {
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true,
                        "positionClass": "toast-bottom-left",
                        "timeOut": "3000"
                    };
                    if(data.status == false){

                        toastr.error(data.message);
                    }else{
                        //$('.cart-count').text(data.cart_count);
                        toastr.success(data.message);
                    }
            },

         });
      });

   });
 </script>
@endpush
