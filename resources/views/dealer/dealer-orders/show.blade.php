@extends('layouts.app')

@section('return-url'){{ route('dealer.dealer-orders.index') }}@endsection
@section('return-text')К заказам@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="title">Заказ #{{ $dealerOrder->id }}</div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Товар</th>
                                <th style="width: 200px;">Розничная цена</th>
                                <th style="width:200px;">Цена дилера</th>
                                <th style="width:120px;">Количество</th>
                                <th style="width:200px;">Цена дилера</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dealerOrder->cart as $product)
                                <tr>
                                    <td><img src="{{ $product['img'] }}" style="width:60px;border-radius: 8px;margin-right: 15px;" alt="">{{ $product['title'] }}</td>
                                    <td>₽ {{ number_format($product['guest_price'], 2, ',', ' ') }}</td>
                                    <td>{{ $product['formatted_price'] }} (-{{ number_format(($product['guest_price'] - $product['price']), 2, ',', ' ') }})</td>
                                    <td>{{ $product['count'] }}</td>
                                    <td>₽ {{ number_format($product['price'] * $product['count'], 2, ',', ' ') }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <p class="mb-0">На все позиции предоставлена дилерская скидка.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-3">
                <div class="card card-help">
                    <div class="card-header">
                        <div class="title"><i class="fa-solid fa-tags"></i> Итого</div>
                    </div>
                    <div class="card-body">
                        <p class="mb-0"><b>Итоговая цена:</b> {{ number_format($dealerOrder->total, 2, ',', ' ') }}</p>
                        <p class="mb-0"><b>Итоговая экономия:</b> {{ number_format($dealerOrder->profit, 2, ',', ' ') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-3">
                <div class="card card-help">
                    <div class="card-header">
                        <div class="title"><i class="fa-regular fa-circle-question mr-3"></i> Что дальше?</div>
                    </div>
                    <div class="card-body">
                        @if($dealerOrder->payed == false)
                            <p class="mb-0">
                                Осталось оплатить заказ.
                                <a href="{{ route('print.invoice.show', $dealerOrder->id) }}">Оплатите по счёту</a> или как
                                <a href="{{ route('dealer.dealer-orders.pay', $dealerOrder->id) }}" class="mb-1">физическое лицо</a>.
                            </p>
                            <p class="mb-0">После оплаты Ваш заказ будет передан в обработку.</p>
                        @else
                            <p class="mb-0">Ваш заказ оплачен и будет доставлен в течении недели.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush
