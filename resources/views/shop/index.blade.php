@extends('layouts.main')

@section('title')
    Brand Bio
@endsection

@section('content')
    <div class="images-slider">
        <button class="slider-arrow left-arrow" id="prev_slide"><p>&#12296;</p></button>
        <button class="slider-arrow right-arrow" id="next_slide"><p>&#12297;</p></button>
        <div id="slide_1" class="slide slick-current" style="background: url('https://yaninayakusheva.com/wp-content/uploads/dsc_5533-kopiya.jpg'); background-size:cover;background-position: center center;">
            <span class="slide-loading"></span>
            <div class="slide-content">
                <h1 class="slide-title"><d>N</d><d>e</d><d>w</d><d style="width: 10px"></d><d>n</d><d>o</d><d>w</d></h1>
                <h1 class="slide-title"><d>O</d><d>u</d><d>r</d><d style="width: 10px"></d><d>n</d><d>e</d><d>w</d><d style="width: 10px"></d><d>p</d><d>r</d><d>o</d><d>d</d><d>u</d><d>c</d><d>u</d><d>c</d><d>t</d><d>s</d></h1>
                <p class="subtitle">We invite you to see our new products</p>
                <a class="button"><p>+ SHOP NOW</p></a>
            </div>
        </div>
        <div id="slide_2" class="slide" style="background: url('https://yaninayakusheva.com/wp-content/uploads/dsc03061.jpg'); background-size:cover;background-position: center center;">
            <span class="slide-loading"></span>
            <div class="slide-content">
                <h1 class="slide-title"><d>F</d><d>I</d><d>N</d><d>D</d><d style="width: 10px"></d><d>U</d><d>S</d></h1>
                <a class="button"><p>View</p></a>
            </div>
        </div>
        <div id="slide_3" class="slide" style="background: url('https://yaninayakusheva.com/wp-content/uploads/112a6323-scaled-1.jpg'); background-size:cover;background-position: center center;">
            <span class="slide-loading"></span>
            <div class="slide-content">
                <h1 class="slide-title"><d>A</d><d>R</d><d>T</d><d style="width: 10px"></d><d>I</d><d>N</d><d style="width: 10px"></d><d>O</d><d>B</d><d>J</d><d>E</d><d>C</d><d>T</d><d>S</d></h1>
                <a class="button"><p>View</p></a>
            </div>
        </div>
        <div id="slide_4" class="slide" style="background: url('https://yaninayakusheva.com/wp-content/uploads/1170.jpg'); background-size:cover;background-position: center center;">
            <span class="slide-loading"></span>
            <div class="slide-content">
                <h1 class="slide-title" style="color: #000"><d>O</d><d>N</d><d>E</d><d style="width: 10px"></d><d>O</d><d>F</d><d style="width: 10px"></d><d>A</d><d style="width: 10px"></d><d>K</d><d>I</d><d>N</d><d>D</d></h1>
                <a class="button"><p>View</p></a>
            </div>
        </div>
    </div>
    <div class="my-8 flex sm:justify-around flex-wrap mt-16">
        <div class="flex items-center lg:w-1/3 w-full my-3">
            <img src="https://yaninayakusheva.com/wp-content/uploads/2018/06/policy-1.png" alt="" class="mr-3">
            <div class="flex flex-col">
                <span class="text-base my-0">{{ __('Free Shipping') }}</span>
                <span class="text-sm my-0 max-w-xs">{{ __('Free shipping on all US order or order above $200') }}</span>
            </div>
        </div>
        <div class="flex items-center lg:w-1/3 w-full my-3">
            <img src="https://yaninayakusheva.com/wp-content/uploads/2018/06/policy-2.png" alt="" class="mr-3">
            <div class="flex flex-col">
                <span class="text-base my-0">{{ __('Support 24/7') }}</span>
                <span class="text-sm my-0 max-w-md">{{ __('Contact us 24 hours a day, 7 days a week') }}</span>
            </div>
        </div>
        <div class="flex items-center lg:w-1/3 w-full my-3">
            <img src="https://yaninayakusheva.com/wp-content/uploads/2018/06/policy-4.png" alt="" class="mr-3">
            <div class="flex flex-col">
                <span class="text-base my-0">{{ __('100% Payment Secure') }}</span>
                <span class="text-sm my-0 max-w-md">{{ __('We ensure secure payment with PEV') }}</span>
            </div>
        </div>
    </div>

    <div class="my-8 text-center heading-title mb-12">
        <div class="text-3xl font-medium mt-16 mb-1">{{ __('Latest Blog Posts') }}</div>
        <span>{{ __('There are latest blog posts') }}</span>
    </div>
    <div class="flex flex-wrap sm:justify-between justify-around">
        @foreach(\App\Models\Article::all() as $article)
            <a href="{{ route('post.show', $article->id) }}">
                <div class="w-96 article" style="background: url('/storage/articles/{{ $article->image }}');
                background-position: center center;background-size: cover;">
                    <div class="article__bottom">
                        <div class="font-medium">{{ $article->getTitle() }}</div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection

@push('scripts')
    <script>
        /*
        $('.images-slider').slick({
            arrows: true,
            autoplay: true,
            autoplaySpeed: 6000,
            slide: "div",
            cssEase: 'linear',
            appendArrows:'.slider-arrows',
            prevArrow:'<span class="slider-arrow"><</span>',
            nextArrow:'<span class="slider-arrow">></span>'
        });*/
    </script>

    <script>
        let i=1;
        let timer=6000;
        let reset_timer=1;

        function incr()
        {
            if(i==4)
                i=1;
            else
                i++;
        }

        function decr()
        {
            if(i==1)
                i=4;
            else
                i--;
        }

        function next_slide()
        {
            incr();
            $('.slick-current').removeClass("slick-current");
            $('#slide_'+i).addClass("slick-current");
            timeout();
        };

        function prev_slide()
        {
            decr();
            $('.slick-current').removeClass("slick-current");
            $('#slide_'+i).addClass("slick-current");
            timeout();
        };

        $('#next_slide').click(function()
        {
            reset_timer=0;
            next_slide();
        });

        $('#prev_slide').click(function()
        {
            reset_timer=0;
            prev_slide();
        });

        function timeout()
        {
            if(reset_timer==1)
            setTimeout(next_slide, timer);
            reset_timer=1;
        }

        timeout();
    </script>

@endpush
