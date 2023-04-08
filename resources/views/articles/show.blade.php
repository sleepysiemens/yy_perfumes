@extends('layouts.main')

@section('title')
    {{ __('William') }} {{ $article->getTitle() }}
@endsection

@section('content')
    <h2 class="font-bold text-2xl text-center my-6 mb-10">{{ $article->getTitle() }}</h2>
    {!! $article->getContent() !!}
@endsection

sudo apt-get install php8.1-cli php8.1-common php8.1-opcache php8.1-mysql php8.1-mbstring  php8.1-zip php8.1-fpm php8.1-intl php8.1-simplexml php8.1-bcmath php8.1-dev

sudo apt-get install php7.2 php7.2-fpm php7.2-xml php7.2-mysql php7.2-gd
