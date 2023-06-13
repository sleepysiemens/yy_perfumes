@extends('layouts.main')

@section('title')
    {{ __('Perfumer') }}
@endsection

@section('content')
    <h2 class="font-bold text-2xl text-center mt-6 sm:mb-4 mb-8">{{ __('Perfumer') }}</h2>

    <div class="position-relative page-content">
        <img src="{{ asset('images/perfumer.jpg') }}" alt="" class="sm:float-left sm:mx-0 mx-auto sm:mr-8 sm:mb-2 mb-8">

        <p class="text-justify">A perfumer is a kind of  <b class="font-italic">Creator</b>  who has impeccable taste, the ability to compose
            and remember different flavors, as well as the talent to anticipate fashion trends
            in perfume.

            The founder of the brand Yanina Yakusheva is such a creator.
            The main idea of her brand is to demonstrate the individuality of each
            person with the help of the perfume, to reveal perfume not only as an item for
            personal use but as an artistic creation that i s able to interact with other objects
            and society.</p>

        <p class="text-justify">
            Having obtained a medical education, Yakusheva worked as a doctor for several years, while retaining her
            desire to return to experimental research activities. Her acquaintance with perfumery ingredients occurred
            in 2014. The essence of the interest was based on the attempt to use them as a basis, as a material for
            creating a new individual perfume form.

            Perfumery has become an area in which the lines of design, aesthetics and biological essence interact with
            each other.
            The key role in the perfume brand of Yanina Yakusheva plays the liveliness.

            Since Yanina Yakusheva is a very versatile person, she harmoniously combines medicine, perfumery and art in
            her work. She is an author, co-author and participant in many well-known events, namely:
        </p>

        <ul>
            <li>2015 – Y. Yakusheva studied “The art and technology of perfumery” in Perfumers World International School in Bangkok;</li>
            <li>2017 – Y. Yakusheva studied the technology of production of the perfumery and cosmetic products in Kuban State Technological University;</li>
            <li>2018 -participation in the international exhibition The Scent, Dubai. This was an art project to create olfactory sculptures for 5 scents. One of them is the first olfactory experience of a person “The Smell of mother and milk“, which will be lost in the future. This fragrance was accompanied by a modern breast sculpture.</li>
            <li>2019 Personal exhibition in Paris—Idol Gallery, dedicated to the idols of the past and their impact on modern society. It was a fantastic combination of The Past and The Present which appeared in new fragrance line. The famous people of the past such as Marylin Monroe, Lenin and Rudolf Nureyev were inspirators for this project. The perfumer wanted to express meaning of memories in our life, the perception of Past in a new and expressive Present way.</li>
            <li>2015–2019 – this timeframe involves work on art projects in the field of perfumery. Among them is the creation of scents for the theater of modern choreography and olfactory profile of 2 performances in Krasnodar.</li>
            <li>2019-2020- the creation of the first line of fragrances, also with an artistic history. This line was created in the land of fragrances in France and is available to everyone.</li>
            <li>2020- Winner <b>FiFi Russian Fragrance Awards 2020.  LOCAL NICHE – William</b>.</li>
        </ul>
        <p>There is no limit to perfection, and there are many new fragrances in the future intertwined with interesting art projects.</p>
    </div>
@endsection

@push('scripts')
    <style>
        .page-content ul {
            padding-left: 15px;
            list-style: circle;
        }
    </style>
@endpush
