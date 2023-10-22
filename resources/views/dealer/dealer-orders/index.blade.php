@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="title">Заказы</div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Номер заказа</th>
                                <th style="width: 200px;">Итого</th>
                                <th style="width:200px;">Экономия</th>
                                <th style="width:200px;">Дата создания</th>
                                <th style="width:200px;"></th>
                            </tr>
                            @foreach($orders as $order)
                                <tr>
                                    <td>#{{ $order->id }}</td>
                                    <td>{{ $order->total }}</td>
                                    <td>{{ $order->profit }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td><a href="{{ route('dealer.dealer-orders.show', $order->id) }}">Посмотреть</a></td>
                                </tr>
                            @endforeach
                        </table>
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
