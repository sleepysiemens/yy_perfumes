@extends('layouts.main')

@php
    $article = \App\Models\Article::where('id', 2)->first();
@endphp

@section('title')
    {{ __('William') }} {{ $article->getTitle() }}
@endsection

@section('content')
    <h2 class="font-bold text-2xl text-center my-6 mb-10">{{ __('My universe') }}</h2>
    {!! $article->getContent() !!}
@endsection
