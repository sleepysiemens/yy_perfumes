@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Товары</h4>
                <a href="{{ route('articles.create') }}" class="btn btn-primary">Новый пост</a>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Контент</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\App\Models\Article::all() as $article)
                            <tr>
                                <td>#{{ $article->id }}</td>
                                <td>{{ $article->getTitle() }}</td>
                                <td>{{ $article->getShortDescription() }}</td>
                                <td class="d-flex">
                                    {{--                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-gray text-black">Редактировать</a>--}}
                                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-gray p-1 text-black">Редактировать</a>
                                    <form action="{{ route('articles.destroy', $article->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger p-1" style="margin-left: 5px;">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>

    </script>
@endsection
