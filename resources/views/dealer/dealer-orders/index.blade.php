@extends('layouts.app')

@section('return-url'){{ route('dealer.dashboard') }}@endsection
@section('return-text')В панель@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="title">Заказы</div>
                        <a href="{{ route('dealer.dealer-orders.create') }}">Новый заказ</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="width: 55px">№</th>
                                <th style="width:250px;">Итого</th>
                                <th style="width:200px;">Экономия</th>
                                <th style="width:150px;">Дата создания</th>
                                <th style="width:120px;">Оплачен</th>
                                <th style="width:150px;"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>#{{ $order->id }}</td>
                                    <td>
                                        {{ number_format($order->total, 2, ',', ' ') }} руб.
                                        <br>
                                        <a href="{{ route('dealer.dealer-orders.pay', $order->id) }}" class="mb-1">Оплатить как физ лицо</a>
                                    </td>
                                    <td>{{ number_format($order->profit, 2, ',', ' ') }} руб.</td>
                                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('m.d.Y H:i') }}</td>
                                    <td>
                                        @if($order->payed)
                                            Да
                                        @else
                                            Нет
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('dealer.dealer-orders.show', $order->id) }}">Посмотреть</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
