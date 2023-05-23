@extends('layouts.land')

@section('title')
    {{ __('Brand Bio') }}
@endsection

@section('content')
    <div class="flex flex-col items-start sm:h-fit h-fit mt-[168px] w-full md:pt-0" style="background: #DED0D0;">
        <div class="flex justify-center w-fit mx-auto mt-[-100px]">
            <div class="lg:w-[283px] lg:h-[351px] sm:w-[200px] sm:h-[251px] h-[200px] w-[150px] mr-3"
                 style="background: url('{{ asset('images/gideon.jpeg') }}');background-size: cover;background-position: center center;"></div>
            <div class="lg:w-[283px] lg:h-[351px] sm:w-[200px] sm:h-[251px] h-[200px] w-[150px] mr-3"
                 style="background: url('{{ asset('images/ravena.jpeg') }}');background-size: cover;background-position: center center;"></div>
            <div class="lg:w-[283px] lg:h-[351px] sm:w-[200px] sm:h-[251px] mr-3 sm:block hidden"
                 style="background: url('{{ asset('images/william.jpeg') }}');background-size: cover;background-position: center center;"></div>
        </div>
        <div class="w-fit text-center mx-auto mt-11">
            <h2 class="font-bold italic text-xl">{{ __('Yanina Yakusheva Perfumes') }}</h2>
            <p class="sm:w-2/3 w-full mx-auto text-center mt-2">{{ __('Fragrance is a silent and invisible companion. In the era of loneliness and imaginary communication, fantasies become more material.') }}
            </p>
            <hr class="my-2">
            <p class="sm:w-1/2 w-full mx-auto text-center mt-2">{{ __('The founder of the brand – perfumer Yanina Yakusheva. The main idea of her brand is to demonstrate the individuality of each person with the help of the perfume, to reveal perfume not only as an item for personal use but as an artistic creation that is able to interact with other objects, society and you.') }} <br>
            </p>
            <hr class="my-2">
        </div>
    </div>
    <div class="flex flex-col justify-end h-[500px] mt-0 w-full"
         style="background: url('{{ asset('images/dsc_5533-kopiya.jpg') }}');background-size: cover;background-position: center -100px;background-repeat: no-repeat;">
        <div class="flex justify-center w-fit mx-auto mb-[-100px] sm:mt-0 mt-[-200px]">
            <div class="w-[175px] h-[222px] mr-3 sm:block"
                 style="background: url('{{ asset('images/https-yaninayakusheva-com-wp-content-uploads-img-2-768x961.jpeg') }}');background-size: cover;background-position: center center;"></div>
            <div class="w-[175px] h-[222px] mr-3 sm:block"
                 style="background: url('{{ asset('images/image00062-400x600.jpg') }}');background-size: cover;background-position: center center;"></div>
            <div class="w-[175px] h-[222px] mr-3 sm:block hidden"
                 style="background: url('{{ asset('images/img_20201001_215447_969-768x960.jpg') }}');background-size: cover;background-position: center center;"></div>
        </div>
    </div>
    <div class="container mx-auto sm:mt-[250px] mt-[200px]">
        <div class="w-2/3 h-[2px] bg-[#888] mx-auto my-12"></div>
        <div class="font-bold text-center mb-12 text-3xl mt-0">{{ __('Parfum à choisir') }}</div>
        <div class="flex items-start justify-start md:ml-0 ml-4">
            <div class="block md:h-[375px] md:w-[375px] h-[155px] w-[155px]"
                 style="background: url('{{ asset('images/ravena.jpeg') }}');background-size: cover;background-position: center center;"></div>
            <div class="w-1/2 ml-8">
                <p class="text-[#C69B70] text-xl">{{ __("Women's fragrances") }}</p>
                <p class="mt-2 text-sm">{{ __("Women's fragrances with a character. Make your choice.") }}</p>
            </div>
        </div>
        <div class="flex items-start justify-start md:ml-[165px] md:mt-[-100px] mt-[10px] md:ml-0 ml-4">
            <div class="block md:h-[375px] md:w-[375px] h-[155px] w-[155px]"
                 style="background: url('{{ asset('images/aron.jpeg') }}');background-size: cover;background-position: center center;"></div>
            <div class="w-1/2 ml-8 md:h-[375px] h-fit flex flex-col justify-center">
                <p class="text-[#C69B70] text-xl">{{ __("Men's fragrances") }}</p>
                <p class="mt-2 text-sm">{{ __("Men's fragrances. Make your choice.") }}</p>
            </div>
        </div>
        <div class="w-2/3 h-[2px] bg-[#888] mx-auto my-12"></div>
        <img src="{{ asset('images/flacon.png') }}" class="absolute right-0 mt-[-280px] sm:block hidden" alt="">
    </div>
    <div class="container mx-auto flex justify-center flex-col items-center md:mt-[150px] sm:mt-[200px] mt-[100px]">
        <h2 class="font-medium text-2xl">{{ __('Our fragrances') }}</h2>
        <hr class="my-3 w-1/3">
        <p class="text-sm text-center sm:w-1/2 w-full font-light">
            {{ __("Each fragrance has its own individual character describing character traits. There are 4 characters of women's and men's fragrances in the assortment.") }}
        </p>
    </div>
    <div class="container mx-auto flex lg:justify-center justify-around flex-wrap mt-[55px]">
        @php
            $items = \App\Models\Product::limit(4)->orderByDesc('created_at')->get();
        @endphp
        @for($i = 0; $i < $items->count(); $i++)
            <div class="flex flex-col mb-8">
                <div class="h-[201px] w-[222px]"
                     style="background: url('{{ asset($items[$i]->getImage()) }}');background-size: cover;background-position: center center;"></div>
                <a target="_blank" href="{{ route('catalogue.show', $items[$i]['slug']) }}" class="text-base text-center mb-1 mt-3">
                    {{ $items[$i]->getTitle() }}
                </a>
                <div class="flex justify-between items-center mb-4">
                    <p>{{ $items[$i]['cost'] }}$</p>
                    <div class="w-full h-[2px] bg-[#000000] mx-3 opacity-25"></div>
                    <p>100ml</p>
                </div>
                <a target="_blank" href="{{ route('catalogue.show', $items[$i]['slug']) }}" class="py-1 px-4 border border-[#000] w-fit text-sm">{{ __('Go to shop') }}</a>
            </div>
            @if($i < ($items->count() - 1))
                <div class="h-[371px] mt-[-30px] w-[2px] bg-[#000] mx-8 lg:block hidden"></div>
            @endif
        @endfor
    </div>
    <div class="container mx-auto flex md:justify-center md:flex-row flex-col sm:mt-[150px] mt-[100px]">
        <div class="w-[375px] h-[222px] mx-auto sm:order-1 order-2">
            <div class="border-[3px] mt-[-33px] ml-[-36px] border-[#D2CCC3] w-[375px] h-[222px] absolute"></div>
            <div class="h-full w-full"
                 style="background: url('{{ asset('images/perfumer.jpg') }}');background-size: cover;background-position: center -50px;"></div>
        </div>
        <div class="md:w-2/4 w-3/4 ml-8 flex flex-col justify-end relative md:mb-0 mb-20 sm:order-2 order-1">
            <h3 class="text-2xl mb-2">{{ __('Perfumer') }}</h3>
            <p class="mb-12">{{ __("The founder of the brand Yanina Yakusheva is such a creator. The main idea of her brand is to demonstrate the individuality of each person with the help of the perfume, to reveal perfume not only as an item for personal use but as an artistic creation that is able to interact with other objects and society.") }}</p>
            <p class="text-[#C69B70] absolute right-[20px] rotate-[-8deg] mt-[20px]"
                style="font-family: 'Marck Script';font-size: 47px;">Yanina</p>
        </div>
    </div>
    <div class="container mx-auto relative h-[116px]">
        <div class="w-[2px] h-full bg-[#000] absolute ml-[300px]"></div>
    </div>
    <div class="container mx-auto relative">
        <div class="sm:px-20 px-2">
            <div class="border-[3px] border-[#D2CCC3] mx-auto flex flex-col items-center justify-center p-8 pb-20 relative sm:w-5/6 w-full">
                <p class="text-2xl font-medium italic text-center sm:w-3/4 w-full">
                    {{ __('Each fragrance can tell about any person. Ravenna is a perfume that speaks of status, femininity and self-sufficiency') }}
                </p>
                <p class="text-base font-regular italic text-center sm:w-3/4 w-full mt-6">
{{--                    Ravena is an absolutely stunning perfume for women. It is perfect for those who are looking for a--}}
{{--                    unique and elegant scent that is sure to turn heads. The scent is a combination of floral, fruity--}}
{{--                    and spicy notes, creating a truly mesmerizing fragrance that is both sophisticated and alluring.--}}
{{--                    <br><br>--}}
{{--                    The top notes of Ravena are a beautiful blend of blackcurrant, peach, and pink pepper, which give the--}}
{{--                    perfume a fruity and spicy aroma. The heart notes are comprised of jasmine, lily-of-the-valley,--}}
{{--                    and rose, which add a touch of femininity and elegance to the fragrance. The base notes are a warm--}}
{{--                    and sensual blend of vanilla, musk, and patchouli, which give the perfume a deep and lasting finish.--}}
{{--                    <br><br>--}}
{{--                    One of the things I love about Ravena is how long-lasting the scent is. Even after a long day, the fragrance lingers on the skin, leaving a subtle and sophisticated scent that is sure to leave a lasting impression.--}}
{{--                    <br><br>--}}
{{--                    Overall, I would highly recommend Ravena to any woman who is looking for a unique and elegant fragrance that is perfect for any occasion. It is a truly mesmerizing perfume that is sure to turn heads and leave a lasting impression.--}}
                    {{ __("Ravena is so far the only brand that produces various perfumes for all occasions and contains all the components that everyone will like.Expanded range of smells.") }} <br><br>
                    {{ __("The smell does not fade for about two days.The only drawback was that there was no delivery to my city, I had to pick it up through a friend.") }}
                </p>
                <div class="absolute rounded-[50%] w-[92px] h-[92px] bottom-0 translate-y-[45px]"
                    style="background: url('{{ asset('images/client.jpg') }}');
                        background-size: cover;background-position: center center;"></div>
            </div>
        </div>
    </div>

    <style>
        hr {
            border-top-width: 2px;
            border-top-color: rgba(217, 217, 217, .2);
        }
    </style>
@endsection
