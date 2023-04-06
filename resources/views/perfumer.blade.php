@extends('layouts.main')

@php
    $article = \App\Models\Article::where('id', 9)->first();
@endphp

@section('title')
    {{ __('Perfumer') }}
@endsection

@section('content')
    <h2 class="font-bold text-2xl text-center mt-6">Perfumer</h2>

    {!! $article->getContent() !!}
@endsection
