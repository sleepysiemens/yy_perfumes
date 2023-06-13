@extends('layouts.main')
@section('title')
    {{ __('Philosophy') }}
@endsection

@section('content')
    <h2 class="font-bold text-2xl text-center my-6 mb-10">{{ __('Philosophy') }}</h2>

    <p>Every day we see hundreds of perfume bottles in stores and thousands of pictures of them on social media. Sometimes we keep their names in memory, sometimes it doesn’t take long for us to forget. We can get to know them personally or we can pass by. But what will make us stay? Whose name will cause our interest? Can a perfume become a symbol of more meaningful and sensual liaison?</p>
    <div class="position-relative mt-4 sm:block flex flex-column flex-wrap">
        <img src="{{ asset('nude-woman.jpg') }}" class="sm:float-left mr-5 order-last sm:mt-0 mt-10" alt="">

        <p class="">In the era of loneliness and imaginary communication, fantasies become more material.  They occupy a place in our mind, at our home, office or on a family trip. They acquire real personalities and their own life.

            <span class="text-lg block my-4">ON THE VERGE OF AUTHORIAL FANTASY AND DISTORTED REALITY NEW STORIES AND HEROES ARE BROUGHT TO LIFE.</span>

            Perfume is a disembodied living being, created by the intention of a perfumer. It has its character and traits, a set of features that produce its own visual models — a living person with a certain destiny. The personalities are the material embodiments of the scent. They are real, alive, they live in accordance with their nature and structure of the created fragrance, being completely subordinate and limited by it.</p>
    </div>
@endsection
