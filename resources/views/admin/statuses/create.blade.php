@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4>Создание статуса</h4>
            <a href="{{ route('statuses.index') }}">Назад к списку</a>

            <form action="{{ route('statuses.store') }}" method="post" class="form ">
                @csrf

                <h6 class="mb-3 mt-3">Информация</h6>

                <div class="from-group mb-2">
                    <label for="">Название статуса</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="from-group">
                    <label for="">Комментарий</label>
                    <textarea name="comment" class="form-control" id="" cols="30" rows="5"></textarea>
                </div>

                <div class="form-check mt-3 mb-2">
                    <input class="form-check-input" type="checkbox" value="true" name="default" id="default-check">
                    <label class="form-check-label" for="default-check"> Использовать статус по умолчанию для
                        новых заказов</label>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Добавить статус</button>
            </form>
        </div>
    </div>
@endsection
