@extends('layouts.land')

@section('title')
    Brand Bio
@endsection

@section('content')
    <div class="flex flex-col items-start h-[520px] mt-[168px] w-full" style="background: rgba(222, 208, 208, .3);">
        <div class="flex justify-center w-fit mx-auto mt-[-100px]">
            <div class="w-[283px] h-[351px] bg-[#DED0D0] mr-3"></div>
            <div class="w-[283px] h-[351px] bg-[#DED0D0] mr-3"></div>
            <div class="w-[283px] h-[351px] bg-[#DED0D0] mr-3"></div>
        </div>
        <div class="w-fit text-center mx-auto mt-11">
            <h2 class="font-bold italic text-xl">Заголовок</h2>
            <p class="w-fit mx-auto text-center mt-2">Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда
                <br> приемлемые модификации, например, юмористические вставки.</p>
            <hr class="my-2">
            <p class="w-fit mx-auto text-center mt-2">Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда
                <br> приемлемые модификации, например, юмористические вставки.</p>
            <hr class="my-2">
        </div>
    </div>
    <div class="flex flex-col justify-end h-[246px] mt-0 w-full" style="background: rgba(208, 212, 215, .3);">
        <div class="flex justify-center w-fit mx-auto mb-[-100px]">
            <div class="w-[175px] h-[222px] bg-[#D2CCC3] mr-3"></div>
            <div class="w-[175px] h-[222px] bg-[#D2CCC3] mr-3"></div>
            <div class="w-[175px] h-[222px] bg-[#D2CCC3] mr-3"></div>
        </div>
    </div>
    <div class="container mx-auto mt-[350px]">
        <div class="flex items-start justify-start">
            <div class="block bg-[#E7E7E7] h-[375px] w-[375px]"></div>
            <div class="w-1/2 ml-8">
                <p class="text-[#C69B70] text-xl">Женские ароматы</p>
                <p class="mt-2 text-sm">Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например,
                    юмористические вставки или слова, которые даже отдалённо не напоминают латынь.</p>
            </div>
        </div>
        <div class="flex items-start justify-start ml-[165px] mt-[-100px]">
            <div class="block bg-[#D9D9D9] h-[375px] w-[375px]"></div>
            <div class="w-1/2 ml-8 h-[375px] flex flex-col justify-center">
                <p class="text-[#C69B70] text-xl">Мужские ароматы</p>
                <p class="mt-2 text-sm">Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например,
                    юмористические вставки или слова, которые даже отдалённо не напоминают латынь.</p>
            </div>
        </div>
        <img src="{{ asset('images/flacon.png') }}" class="absolute right-0 mt-[-280px]" alt="">
    </div>
    <div class="container mx-auto flex justify-center flex-col items-center mt-[217px]">
        <h2 class="font-medium text-2xl">Some big title</h2>
        <hr class="my-3 w-1/3">
        <p class="text-sm text-center w-3/4 font-light">Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь. Если вам нужен Lorem Ipsum для серьёзного проекта, вы наверняка не хотите какой-нибудь шутки, скрытой в середине абзаца. Также все другие известные генераторы</p>
    </div>
    <div class="container mx-auto flex justify-center mt-[85px]">
        <div class="flex flex-col">
            <div class="h-[201px] w-[222px] bg-[#D2CCC3]"></div>
            <p class="text-base text-center mb-1 mt-3">Название</p>
            <div class="flex justify-between items-center mb-4">
                <p>50$</p>
                <div class="w-full h-[2px] bg-[#000000] mx-3 opacity-25"></div>
                <p>100mg</p>
            </div>
            <a href="" class="py-1 px-4 border border-[#000] w-fit text-sm">Перейти в магазин</a>
        </div>
        <div class="h-[371px] mt-[-30px] w-[2px] bg-[#000] mx-8"></div>
        <div class="flex flex-col">
            <div class="h-[201px] w-[222px] bg-[#D2CCC3]"></div>
            <p class="text-base text-center mb-1 mt-3">Название</p>
            <div class="flex justify-between items-center mb-4">
                <p>50$</p>
                <div class="w-full h-[2px] bg-[#000000] mx-3 opacity-25"></div>
                <p>100mg</p>
            </div>
            <a href="" class="py-1 px-4 border border-[#000] w-fit text-sm">Перейти в магазин</a>
        </div>
        <div class="h-[371px] mt-[-30px] w-[2px] bg-[#000] mx-8"></div>
        <div class="flex flex-col">
            <div class="h-[201px] w-[222px] bg-[#D2CCC3]"></div>
            <p class="text-base text-center mb-1 mt-3">Название</p>
            <div class="flex justify-between items-center mb-4">
                <p>50$</p>
                <div class="w-full h-[2px] bg-[#000000] mx-3 opacity-25"></div>
                <p>100mg</p>
            </div>
            <a href="" class="py-1 px-4 border border-[#000] w-fit text-sm">Перейти в магазин</a>
        </div>
        <div class="h-[371px] mt-[-30px] w-[2px] bg-[#000] mx-8"></div>
        <div class="flex flex-col">
            <div class="h-[201px] w-[222px] bg-[#D2CCC3]"></div>
            <p class="text-base text-center mb-1 mt-3">Название</p>
            <div class="flex justify-between items-center mb-4">
                <p>50$</p>
                <div class="w-full h-[2px] bg-[#000000] mx-3 opacity-25"></div>
                <p>100mg</p>
            </div>
            <a href="" class="py-1 px-4 border border-[#000] w-fit text-sm">Перейти в магазин</a>
        </div>
    </div>
    <div class="container mx-auto flex justify-center mt-[250px]">
        <div class="w-[375px] h-[222px]">
            <div class="border-[3px] mt-[-33px] ml-[-36px] border-[#D2CCC3] w-[375px] h-[222px] absolute"></div>
            <div class="h-full w-full bg-[#BEBEBE]"></div>
        </div>
        <div class="w-2/4 ml-8 flex flex-col justify-end relative ">
            <h3 class="text-2xl mb-2">Some big title</h3>
            <p class="mb-8">Есть много вариантов Lorem Ipsum, но большинство из них имеет
                не всегда приемлемые модификации, например, юмористические вставки или слова,
                которые даже отдалённо не напоминают латынь. Если вам нужен Lorem Ipsum для серьёзного </p>
            <p class="text-[#C69B70] text-3xl absolute right-[20px] rotate-[-8deg] mt-[20px]">Yanina</p>
        </div>
    </div>
    <div class="container mx-auto relative h-[116px]">
        <div class="w-[2px] h-full bg-[#000] absolute ml-[300px]"></div>
    </div>
    <div class="container mx-auto relative">
        <div class="px-20">
            <div class="border-[3px] border-[#D2CCC3] mx-auto flex flex-col items-center justify-center p-8 pb-20 relative w-5/6">
                <p class="text-2xl font-medium italic text-center w-2/3">
                    Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда
                </p>
                <p class="text-base font-medium italic text-center w-3/4 mt-6">
                    Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации,
                    например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь. Если вам
                    нужен Lorem Ipsum для серьёзного
                </p>
                <div class="absolute rounded-[50%] bg-[#BEBEBE] w-[92px] h-[92px] bottom-0 translate-y-[45px]"></div>
            </div>
        </div>
    </div>
    <footer class="w-100 bg-[#D2CCC3] mt-[250px] relative">
        <div class="container mx-auto relative block">
            <div class="flex justify-between w-[90%] mx-auto translate-y-[-80px]">
                <div class="h-[148px] w-[150px] bg-[#D9D9D9]"></div>
                <div class="h-[148px] w-[150px] bg-[#D9D9D9]"></div>
                <div class="h-[148px] w-[150px] bg-[#D9D9D9]"></div>
                <div class="h-[148px] w-[150px] bg-[#D9D9D9]"></div>
                <div class="h-[148px] w-[150px] bg-[#D9D9D9]"></div>
                <div class="h-[148px] w-[150px] bg-[#D9D9D9]"></div>
            </div>
            <div class="flex justify-between w-[90%] mx-auto">
                <div class="flex justify-between">
                    <div class="w-1/2 mr-5">
                        <p class="text-2xl mb-3">Text</p>
                        <p class="text-base mt-3 w-2/3">Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые
                            модификации, например, юмористические вставки или слова, которые даже отдалённо.</p>
                    </div>
                    <div class="flex w-2/4">
                        <div class="w-1/2 flex flex-col">
                            <p class="text-2xl mb-3">Колонка 1</p>
                            <a href="" class="mb-2">Ссылка</a>
                            <a href="" class="mb-2">Ссылка</a>
                            <a href="" class="mb-2">Ссылка</a>
                            <a href="" class="mb-2">Ссылка</a>
                            <a href="" class="mb-2">Ссылка</a>
                        </div>
                        <div class="w-1/2 flex flex-col">
                            <p class="text-2xl mb-3">Колонка 1</p>
                            <a href="" class="mb-2">Ссылка</a>
                            <a href="" class="mb-2">Ссылка</a>
                            <a href="" class="mb-2">Ссылка</a>
                            <a href="" class="mb-2">Ссылка</a>
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
