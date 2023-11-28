<div class="container mx-auto sm:mt-[250px] mt-[200px]">
    <div class="w-2/3 h-[2px] bg-[#888] mx-auto my-12"></div>
    <div class="font-bold text-center mb-12 text-3xl mt-0">{{ __('Parfum à choisir') }}</div>
    <div class="flex items-start justify-start md:ml-0 ml-4">
        <div class="block md:h-[375px] md:w-[375px] h-[155px] w-[155px]"
             style="background: url('{{ asset('images/ravena.jpeg') }}');background-size: cover;background-position: center center;"></div>
        <div class="w-1/2 ml-8">
            <p class="text-[#C69B70] text-xl">{{// __("Women's fragrances") }}</p>
            <p class="mt-2 text-sm">{{// __("Women's fragrances with a character. Make your choice.") }}</p>
        </div>
    </div>
    <div class="flex items-start justify-start md:ml-[165px] md:mt-[-100px] mt-[10px] md:ml-0 ml-4">
        <div class="block md:h-[375px] md:w-[375px] h-[155px] w-[155px]"
             style="background: url('{{ asset('images/aron.jpeg') }}');background-size: cover;background-position: center center;"></div>
        <div class="w-1/2 ml-8 md:h-[375px] h-fit flex flex-col justify-center">
            <p class="text-[#C69B70] text-xl">{{// __("Men's fragrances") }}</p>
            <p class="mt-2 text-sm">{{// __("Men's fragrances. Make your choice.") }}</p>
        </div>
    </div>
    <div class="w-2/3 h-[2px] bg-[#888] mx-auto my-12"></div>
    <img src="{{ //asset('images/flacon.png') }}" class="absolute right-0 mt-[-280px] sm:block hidden" alt="">
</div>
