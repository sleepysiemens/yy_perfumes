@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4>Создание поста</h4>
            <a href="{{ route('articles.index') }}">Назад к списку</a>

            <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <h6 class="mb-2 mt-3">Информация</h6>

                <div class="form-group mb-3 mt-3">
                    <label for="">Изображение поста</label>
                    <input type="file" name="post_img" class="dropify">
                </div>

                <div class="from-group mb-3">
                    <label for="">
                        <img src="{{ \App\Services\Content\FlagService::get('en') }}" width="17px" alt="">
                        Название поста
                    </label>
                    <input type="text" class="form-control" name="en_title">
                </div>
                <div class="from-group mb-3">
                    <label for="">Описание</label>
                    <textarea name="en_description" class="form-control" id="" cols="30" rows="5"></textarea>
                </div>

                <div class="from-group mb-3">
                    <label for="">
                        <img src="{{ \App\Services\Content\FlagService::get('ru') }}" width="17 px" alt="">
                        Название поста
                    </label>
                    <input type="text" class="form-control" name="ru_title">
                </div>
                <div class="from-group mb-3">
                    <label for="">Описание</label>
                    <textarea name="ru_description" class="form-control" id="" cols="30" rows="5"></textarea>
                </div>

                <hr>
                <h6 class="mb-2 mt-3">Техническая</h6>

                <div class="from-group">
                    <label for="">Отображение в адресе</label>
                    <input type="text" class="form-control mb-2" name="slug">
                    <span class="text-muted fs-6">Лучше оставить пустым, но можно указать, как будет отображаться в адресе.
                        Поле уникальное! Например: <b>duhy_luchshego_kachestva</b></span>
                </div>

                <div class="content mt-4">
                    <h4><img src="{{ \App\Services\Content\FlagService::get('en') }}" width="17px" alt=""> Контент</h4>
                    <textarea id="summernote" name="en_content"></textarea>
                </div>

                <div class="content mt-4">
                    <h4><img src="{{ \App\Services\Content\FlagService::get('ru') }}" width="17px" alt=""> Контент</h4>
                    <textarea id="summernote_ru" name="ru_content"></textarea>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Добавить</button>
            </form>
        </div>
    </div>

    <script>
        $('.dropify').dropify();
    </script>
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function (){
            $('#summernote').summernote({
                'height': '500'
            });

            $('#summernote_ru').summernote({
                'height': '500'
            });
        });
    </script>
@endsection
