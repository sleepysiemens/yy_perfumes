@extends('layouts.main')

@section('content')
    <div class="flex flex-wrap sm:justify-between justify-around">
        @foreach($articles as $article)
            <a href="{{ route('post.show', $article->id) }}">
                <div class="w-96 article" style="background: url('/storage/articles/{{ $article->image }}');
                background-position: center center;background-size: cover;">
                    <div class="article__bottom">
                        <div class="font-medium">{{ $article->getTitle() }}</div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
