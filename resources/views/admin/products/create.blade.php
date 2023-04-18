@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4>Создание статуса</h4>
            <a href="{{ route('statuses.index') }}">Назад к списку</a>

            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <h6 class="mb-2 mt-3">Информация</h6>

                <div class="form-group mb-3">
                    <label for="">Категория товара</label>
                    <select name="category_id" class="form-control select2" id="">
                        @foreach(\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3 mt-3">
                    <label for="">Изображение товара</label>
                    <input type="file" name="product_img" class="dropify">
                </div>

                <div class="from-group mb-3">
                    <label for="">
                        <img src="{{ \App\Services\Content\FlagService::get('en') }}" width="17px" alt="">
                        Название товара
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
                        Название товара
                    </label>
                    <input type="text" class="form-control" name="ru_title">
                </div>
                <div class="from-group mb-3">
                    <label for="">Описание</label>
                    <textarea name="ru_description" class="form-control" id="" cols="30" rows="5"></textarea>
                </div>

                <div class="from-group mb-3">
                    <label for="">Цена $</label>
                    <input type="text" class="form-control" name="cost">
                </div>

                <div class="from-group mb-3">
                    <label for="">Цена дилера $</label>
                    <input type="text" class="form-control" name="cost_dealer">
                </div>

                <div class="from-group mb-3">
                    <label for="">Цена прем. дилера $</label>
                    <input type="text" class="form-control" name="cost_vip_dealer">
                </div>

                <hr>
                <h6 class="mb-2 mt-3 mb-3">Сео</h6>

                <div class="from-group mb-3">
                    <label for="">СЕО Название товара</label>
                    <input type="text" class="form-control" name="seo_title">
                </div>
                <div class="from-group">
                    <label for="">СЕО Описание</label>
                    <textarea name="seo_description" class="form-control" id="" cols="30" rows="5"></textarea>
                </div>

                <hr>
                <h6 class="mb-2 mt-3">Техническая</h6>

                <div class="from-group">
                    <label for="">Отображение в адресе</label>
                    <input type="text" class="form-control mb-2" name="slug">
                    <span class="text-muted fs-6">Лучше оставить пустым, но можно указать, как будет отображаться в адресе.
                        Поле уникальное! Например: <b>duhy_luchshego_kachestva</b></span>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Добавить</button>
            </form>
        </div>
    </div>

    <script>
        $('.dropify').dropify();
    </script>
@endsection
