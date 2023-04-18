@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Товары</h4>
                <a href="{{ route('products.create') }}" class="btn btn-primary">Новый товар</a>
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
                            <th>Описание</th>
                            <th>Цена</th>
                            <th>Цена дилера</th>
                            <th>Цена премиум</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>#{{ $product->id }}</td>
                                <td>{{ $product->getTitle() }}</td>
                                <td>{{ $product->getDescription() }}</td>
                                <td>{{ $product->cost }}</td>
                                <td>{{ $product->cost_dealer }}</td>
                                <td>{{ $product->cost_vip_dealer }}</td>
                                <td class="d-flex">
{{--                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-gray text-black">Редактировать</a>--}}
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-gray p-1 text-black">Редактировать</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="post">
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
