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

    <div class="row">
        <div class="col-xl-4">
            @foreach($products as $product)
                <div class="card">
                    <div class="card-body">

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
