@extends('front_master')
@section('front_content')
<main class="main">
    <section class="boost-section pt-10 pb-10">
            <div class="container mt-10 mb-9">
              <div class="row align-items-center mb-10">
                <div class="col-md-6 mb-8">
                  <figure class="br-lg">
                    <img
{{--                      src="assets/images/pages/about_us/3.jpg"--}}
                      src="{{ asset('assets/images/pages/about_us/3.jpg') }}"
                      alt="Banner"
                      width="610"
                      height="450"
                      style="background-color: #9e9da2"
                    />
                  </figure>
                </div>
                <div class="col-md-6 pl-lg-8 mb-8">
                  <h4 class="title text-left">
                    We Boost Our Clients’ Bottom Line by Optimizing Their Growth
                    Potential
                  </h4>
                  <p class="mb-6">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                    do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Venenatis tellus in. metus vulputate eu scelerisque
                    felis. Vel pretium lectus qua . Arpis massa. Nunc id cursus
                    metus ididunt ut labore metus vulputate episcing.
                  </p>
                  <a href="#" class="btn btn-dark btn-rounded"
                    >Visit Our Store</a
                  >
                </div>
              </div>
            </div>
          </section>
</main>
@endsection
