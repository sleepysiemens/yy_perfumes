@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4>Создание статуса</h4>
            <a href="{{ route('statuses.index') }}">Назад к списку</a>

            <form action="" class="form ">
                <h6 class="mb-2 mt-3">Информация</h6>

                <div class="from-group">
                    <label for="">Название категории</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="from-group">
                    <label for="">Описание</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="5"></textarea>
                </div>

                <hr>
                <h6 class="mb-2 mt-3">Сео</h6>

                <div class="from-group">
                    <label for="">СЕО Название категории</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="from-group">
                    <label for="">СЕО Описание</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="5"></textarea>
                </div>

                <hr>
                <h6 class="mb-2 mt-3">Техническая</h6>

                <div class="from-group">
                    <label for="">Отображение в адресе</label>
                    <input type="text" class="form-control mb-2" name="slug">
                    <span class="text-muted fs-6">Лучше оставить пустым, но можно указать, как будет отображаться в адресе.
                        Поле уникальное! Например: <b>duhy_luchshego_kachestva</b></span>
                </div>
            </form>
        </div>
    </div>
@endsection
