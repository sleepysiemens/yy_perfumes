@extends('layouts.main')

@section('content')
    @include('dealer.menu')

    <div class="mt-12">
        <h2 class="font-semibold text-xl">{{ __('Become dealer') }}</h2>
        <p class="mt-3">{{ __('Contact us') }}:</p>
        <p>Email: <b>example@mail.com</b></p>
    </div>
@endsection
