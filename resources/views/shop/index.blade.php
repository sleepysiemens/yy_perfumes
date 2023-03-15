@extends('layouts.main')

@section('title')
    Brand Bio
@endsection

@section('content')
    <div class="images-slider">
        <div class="slide" style="background: url('https://yaninayakusheva.com/wp-content/uploads/dsc03061.jpg');
                                    background-size:cover;background-position: center center;">
            <div class="heading">

            </div>
        </div>
        <div class="slide" style="background: url('https://yaninayakusheva.com/wp-content/uploads/1170.jpg');
                                    background-size:cover;background-position: center center;">

        </div>
    </div>

    <div class="my-8 flex sm:justify-around mt-16">
        <div class="flex items-center">
            <img src="https://yaninayakusheva.com/wp-content/uploads/2018/06/policy-1.png" alt="" class="mr-3">
            <div class="flex flex-col">
                <span class="text-base my-0">Free Shipping</span>
                <span class="text-sm my-0">Free shipping on all US order or order above $200</span>
            </div>
        </div>
        <div class="flex items-center">
            <img src="https://yaninayakusheva.com/wp-content/uploads/2018/06/policy-2.png" alt="" class="mr-3">
            <div class="flex flex-col">
                <span class="text-base my-0">Support 24/7</span>
                <span class="text-sm my-0">Contact us 24 hours a day, 7 days a week</span>
            </div>
        </div>
        <div class="flex items-center">
            <img src="https://yaninayakusheva.com/wp-content/uploads/2018/06/policy-4.png" alt="" class="mr-3">
            <div class="flex flex-col">
                <span class="text-base my-0">100% Payment Secure</span>
                <span class="text-sm my-0">We ensure secure payment with PEV</span>
            </div>
        </div>
    </div>

    <div class="my-8 text-center heading-title">
        <div class="text-3xl font-medium mt-16">Latest Blog Posts</div>
        <span>There are latest blog posts</span>
    </div>
@endsection

@push('scripts')
    <script>
        $('.images-slider').slick({
            arrows: false,
            autoplay: true,
            autoplaySpeed: 4000,
            cssEase: 'linear'
        });
    </script>
@endpush
