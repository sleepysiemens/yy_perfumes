@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="title">Заказ #{{ $dealerOrder->id }}</div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Товар</th>
                                <th style="width: 200px;">Розничная цена</th>
                                <th style="width:200px;">Цена дилера</th>
                            </tr>
                            @foreach($dealerOrder->cart as $product)
                                <tr>
                                    <td><img src="{{ $product['img'] }}" style="width:60px;border-radius: 8px;margin-right: 15px;" alt="">{{ $product['title'] }}</td>
                                    <td>{{ $product['guest_price'] }}</td>
                                    <td>{{ $product['formatted_price'] }} (-{{ ($product['guest_price'] - $product['price']) }})</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <div class="title">Итого</div>
                    </div>
                    <div class="card-body">
                        <p class="mb-0"><b>Итоговая цена:</b> {{ $dealerOrder->total }}</p>
                        <p><b>Итоговая экономия:</b> {{ $dealerOrder->profit }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <style>
        .table{
            border: 1px solid #eee;
            table-layout: fixed;
            width: 100%;
            margin-bottom: 20px;
        }
        .table th {
            font-weight: bold;
            padding: 5px;
            background: #efefef;
            border: 1px solid #dddddd;
        }
        .table td{
            padding: 5px 10px;
            border: 1px solid #eee;
            text-align: left;
        }
        .table tbody tr:nth-child(odd){
            background: #fff;
        }
        .table tbody tr:nth-child(even){
            background: #F7F7F7;
        }
    </style>
@endpush
