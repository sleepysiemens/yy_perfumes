@extends('layouts.main')

@section('title')
    {{ __('William') }} {{ $article->getTitle() }}
@endsection

@section('content')
    <h2 class="font-bold text-2xl text-center my-6 mb-10">{{ $article->getTitle() }}</h2>
    {!! $article->getContent() !!}
@endsection
