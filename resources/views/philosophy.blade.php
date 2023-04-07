@extends('layouts.main')

@php
    $article = \App\Models\Article::where('id', 10)->first();
@endphp

@section('title')
    {{ __('Philosophy') }}
@endsection

@section('content')
    <h2 class="font-bold text-2xl text-center my-6 mb-10">{{ __('Philosophy') }}</h2>
    <div class="h-[600px]">
        {!! $article->getContent() !!}
    </div>
@endsection
