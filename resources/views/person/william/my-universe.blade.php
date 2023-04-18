@extends('layouts.main')

@php
    $article = \App\Models\Article::where('id', 6)->first();
@endphp

@section('title')
    {{ __('William') }} {{ $article->getTitle() }}
@endsection

@section('content')
    <h2 class="font-bold text-2xl text-center mt-6 mb-[-40px]">My universe</h2>
    {!! $article->getContent() !!}
@endsection
