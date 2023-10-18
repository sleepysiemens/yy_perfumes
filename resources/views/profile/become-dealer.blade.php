@extends('layouts.main')

@section('content')
    <div class="flex flex-wrap sm:flex-row items-center flex-col justify-between w-1/2 mx-auto">
        <a href="{{ route('home') }}">{{ __('My orders') }}</a>
        <a href="">{{ __('Actions') }}</a>
        @if (Auth::user()->type == 'dealer')
            <a href="{{ route('become-dealer') }}">{{ __('Dealer') }}</a>
        @else
            <a href="{{ route('become-dealer') }}" class="underline">{{ __('Become dealer') }}</a>
        @endif
    </div>

    <div class="mt-12">
        <h2 class="font-semibold text-xl">{{ __('Become dealer') }}</h2>
        <p class="mt-3">{{ __('Contact us') }}:</p>
        <p>Email: <b>example@mail.com</b></p>
    </div>
@endsection
