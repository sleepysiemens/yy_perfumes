@extends('layouts.land')

@section('title')
    Brand Bio
@endsection

@section('content')
    <div class="flex flex-col items-start h-[520px] mt-[168px] w-full" style="background: rgba(222, 208, 208, .3);">
        <div class="flex justify-center w-fit mx-auto mt-[-100px]">
            <div class="w-[283px] h-[351px] mr-3"
                 style="background: url('{{ asset('images/gideon.jpeg') }}');background-size: cover;background-position: center center;"></div>
            <div class="w-[283px] h-[351px] mr-3"
                 style="background: url('{{ asset('images/ravena.jpeg') }}');background-size: cover;background-position: center center;"></div>
            <div class="w-[283px] h-[351px] mr-3"
                 style="background: url('{{ asset('images/william.jpeg') }}');background-size: cover;background-position: center center;"></div>
        </div>
        <div class="w-fit text-center mx-auto mt-11">
            <h2 class="font-bold italic text-xl">Yanina Yakusheva Perfumes</h2>
            <p class="w-fit mx-auto text-center mt-2">Fragrance is a silent and invisible companion. <br>
                In the era of loneliness and imaginary communication, fantasies become more material.</p>
            <hr class="my-2">
            <p class="w-fit mx-auto text-center mt-2">The founder of the brand – perfumer Yanina Yakusheva. <br>
                The main idea of her brand is to demonstrate the individuality of each person with the help of the perfume,
                <br>
                to reveal perfume not only as an item for personal use but as an artistic creation that is able
                to interact with other objects, society and you.</p>
            <hr class="my-2">
        </div>
    </div>
    <div class="flex flex-col justify-end h-[246px] mt-0 w-full"
         style="background: url('{{ asset('images/pexels-mario-cuadros-4608979-1-2048x1400.jpg') }}');background-size: cover;background-position: center center;">
        <div class="flex justify-center w-fit mx-auto mb-[-100px]">
            <div class="w-[175px] h-[222px] mr-3"
                 style="background: url('{{ asset('images/https-yaninayakusheva-com-wp-content-uploads-img-2-768x961.jpeg') }}');background-size: cover;background-position: center center;"></div>
            <div class="w-[175px] h-[222px] mr-3"
                 style="background: url('{{ asset('images/image00062-400x600.jpg') }}');background-size: cover;background-position: center center;"></div>
            <div class="w-[175px] h-[222px] mr-3"
                 style="background: url('{{ asset('images/img_20201001_215447_969-768x960.jpg') }}');background-size: cover;background-position: center center;"></div>
        </div>
    </div>
    <div class="container mx-auto mt-[350px]">
        <div class="flex items-start justify-start">
            <div class="block h-[375px] w-[375px]"
                 style="background: url('{{ asset('images/ravena.jpeg') }}');background-size: cover;background-position: center center;"></div>
            <div class="w-1/2 ml-8">
                <p class="text-[#C69B70] text-xl">Women's fragrances</p>
                <p class="mt-2 text-sm">Women's fragrances with a character. Make your choice.</p>
            </div>
        </div>
        <div class="flex items-start justify-start ml-[165px] mt-[-100px]">
            <div class="block h-[375px] w-[375px]"
                 style="background: url('{{ asset('images/aron.jpeg') }}');background-size: cover;background-position: center center;"></div>
            <div class="w-1/2 ml-8 h-[375px] flex flex-col justify-center">
                <p class="text-[#C69B70] text-xl">Men's fragrances</p>
                <p class="mt-2 text-sm">Men's fragrances. Make your choice.</p>
            </div>
        </div>
        <img src="{{ asset('images/flacon.png') }}" class="absolute right-0 mt-[-280px]" alt="">
    </div>
    <div class="container mx-auto flex justify-center flex-col items-center mt-[217px]">
        <h2 class="font-medium text-2xl">Our fragrances</h2>
        <hr class="my-3 w-1/3">
        <p class="text-sm text-center w-3/4 font-light">
            Each fragrance has its own individual character describing character traits. <br>
            There are 4 characters of women's and men's fragrances in the assortment.
        </p>
    </div>
    <div class="container mx-auto flex justify-center mt-[85px]">
        <div class="flex flex-col">
            <div class="h-[201px] w-[222px]"
                 style="background: url('{{ asset('images/aron-thumbnail.jpg') }}');background-size: cover;background-position: center center;"></div>
            <p class="text-base text-center mb-1 mt-3">Aron – Eau De Parfum</p>
            <div class="flex justify-between items-center mb-4">
                <p>50$</p>
                <div class="w-full h-[2px] bg-[#000000] mx-3 opacity-25"></div>
                <p>100ml</p>
            </div>
            <a href="" class="py-1 px-4 border border-[#000] w-fit text-sm">Перейти в магазин</a>
        </div>
        <div class="h-[371px] mt-[-30px] w-[2px] bg-[#000] mx-8"></div>
        <div class="flex flex-col">
            <div class="h-[201px] w-[222px]"
                 style="background: url('{{ asset('images/gideon-thumbnail.jpg') }}');background-size: cover;background-position: center center;"></div>
            <p class="text-base text-center mb-1 mt-3">Gideon – Eau De Parfum</p>
            <div class="flex justify-between items-center mb-4">
                <p>50$</p>
                <div class="w-full h-[2px] bg-[#000000] mx-3 opacity-25"></div>
                <p>100ml</p>
            </div>
            <a href="" class="py-1 px-4 border border-[#000] w-fit text-sm">Перейти в магазин</a>
        </div>
        <div class="h-[371px] mt-[-30px] w-[2px] bg-[#000] mx-8"></div>
        <div class="flex flex-col">
            <div class="h-[201px] w-[222px]"
                 style="background: url('{{ asset('images/ravenna-thumbnail-600x700.jpg') }}');background-size: cover;background-position: center center;"></div>
            <p class="text-base text-center mb-1 mt-3">Ravenna – Eau De Parfum</p>
            <div class="flex justify-between items-center mb-4">
                <p>50$</p>
                <div class="w-full h-[2px] bg-[#000000] mx-3 opacity-25"></div>
                <p>100ml</p>
            </div>
            <a href="" class="py-1 px-4 border border-[#000] w-fit text-sm">Перейти в магазин</a>
        </div>
        <div class="h-[371px] mt-[-30px] w-[2px] bg-[#000] mx-8"></div>
        <div class="flex flex-col">
            <div class="h-[201px] w-[222px] bg-[#D2CCC3]"
                 style="background: url('{{ asset('images/william-thumbnail.jpg') }}');background-size: cover;background-position: center center;"></div>
            <p class="text-base text-center mb-1 mt-3">William – Eau De Parfum</p>
            <div class="flex justify-between items-center mb-4">
                <p>50$</p>
                <div class="w-full h-[2px] bg-[#000000] mx-3 opacity-25"></div>
                <p>100ml</p>
            </div>
            <a href="" class="py-1 px-4 border border-[#000] w-fit text-sm">Перейти в магазин</a>
        </div>
    </div>
    <div class="container mx-auto flex justify-center mt-[250px]">
        <div class="w-[375px] h-[222px]">
            <div class="border-[3px] mt-[-33px] ml-[-36px] border-[#D2CCC3] w-[375px] h-[222px] absolute"></div>
            <div class="h-full w-full"
                 style="background: url('{{ asset('images/perfumer.jpg') }}');background-size: cover;background-position: center -50px;"></div>
        </div>
        <div class="w-2/4 ml-8 flex flex-col justify-end relative ">
            <h3 class="text-2xl mb-2">Perfumer</h3>
            <p class="mb-12">The founder of the brand Yanina Yakusheva is such a creator.
                The main idea of her brand is to demonstrate the individuality of each person with the help of the
                perfume, to reveal perfume not only as an item for personal use but as an artistic creation that is able
                to interact with other objects and society.</p>
            <p class="text-[#C69B70] absolute right-[20px] rotate-[-8deg] mt-[20px]"
                style="font-family: 'Marck Script';font-size: 47px;">Yanina</p>
        </div>
    </div>
    <div class="container mx-auto relative h-[116px]">
        <div class="w-[2px] h-full bg-[#000] absolute ml-[300px]"></div>
    </div>
    <div class="container mx-auto relative">
        <div class="px-20">
            <div class="border-[3px] border-[#D2CCC3] mx-auto flex flex-col items-center justify-center p-8 pb-20 relative w-5/6">
                <p class="text-2xl font-medium italic text-center w-2/3">
                    Each fragrance can tell about any person. <br>
                    Ravenna is a perfume that speaks of status, femininity and self-sufficiency
                </p>
                <p class="text-base font-regular italic text-center w-3/4 mt-6">
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
                    Ravena is so far the only brand that produces various perfumes for all occasions and contains all the
                    components that everyone will like.Expanded range of smells. <br><br>
                    The smell does not fade for about two days.The only drawback was that there was no delivery to my city,
                    I had to pick it up through a friend.
                </p>
                <div class="absolute rounded-[50%] w-[92px] h-[92px] bottom-0 translate-y-[45px]"
                    style="background: url('{{ asset('images/client.jpg') }}');
                        background-size: cover;background-position: center center;"></div>
            </div>
        </div>
    </div>
    <footer class="w-100 bg-[#D2CCC3] mt-[250px] relative pb-[100px]">
        <div class="container mx-auto relative block">
            <div class="flex justify-between w-[90%] mx-auto translate-y-[-80px]">
                <div class="h-[148px] w-[150px]"
                     style="background: url('{{ asset('images/posters/dsc09904-scaled.jpg') }}');
                        background-size: cover;background-position: center center;"></div>
                <div class="h-[148px] w-[150px]"
                     style="background: url('{{ asset('images/posters/dsc09915-scaled.jpg') }}');
                        background-size: cover;background-position: center center;"></div>
                <div class="h-[148px] w-[150px]"
                     style="background: url('{{ asset('images/posters/dsc09961-scaled.jpg') }}');
                        background-size: cover;background-position: center center;"></div>
                <div class="h-[148px] w-[150px]"
                     style="background: url('{{ asset('images/posters/dsc_5544.jpg') }}');
                        background-size: cover;background-position: center center;"></div>
                <div class="h-[148px] w-[150px]"
                     style="background: url('{{ asset('images/posters/img_20201007_075234_213.jpg') }}');
                        background-size: cover;background-position: center center;"></div>
                <div class="h-[148px] w-[150px]"
                     style="background: url('{{ asset('images/posters/dsc01890.jpg') }}');
                        background-size: cover;background-position: center center;"></div>
            </div>
            <div class="flex justify-between w-[90%] mx-auto">
                <div class="flex justify-between">
                    <div class="w-1/2 mr-5">
                        <p class="text-2xl mb-3">Yanina Yakusheva Perfumes</p>
                        <p class="text-base mt-3 w-2/3">
                            Fragrance is a silent and invisible companion. In the era of loneliness and imaginary
                            communication, fantasies become more material.
                        </p>
                        <ul class="social-icons flex items-center mt-4">
                            <li>
                                <a class="facebook social-icon" href="https://www.facebook.com/profile.php?id=100004700704305" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li class="ml-4">
                                <a class="instagram social-icon" href="https://www.instagram.com/yaninayakusheva/" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="flex w-2/4">
                        <div class="w-1/2 flex flex-col">
                            <p class="text-2xl mb-3">Information</p>
                            <a href="" class="mb-2">Privacy Policy</a>
                            <a href="" class="mb-2">Terms and conditions</a>
                            <a href="" class="mb-2">Contact</a>
                        </div>
                        <div class="w-1/2 flex flex-col">
                            <p class="text-2xl mb-3">Our Offers</p>
                            <a href="" class="mb-2">News</a>
                            <a href="" class="mb-2">Shop</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <style>
        hr {
            border-top-width: 2px;
            border-top-color: rgba(217, 217, 217, .2);
        }
    </style>
@endsection
