@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th style="width:200px;">{{ __('Client') }}</th>
                                <th style="width:150px;">{{ __('Total') }}</th>
                                <th style="width:300px">{{ __('Address') }}</th>
                                <th>{{ __('Basket') }}</th>
                                <th style="width:170px;">{{ __('Edit') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>
                                        <div>{{ $order->name }}</div>
                                        <div><a href="mailto:{{ $order->email }}">{{ $order->email }}</a></div>
                                        <div><a href="tel:{{ $order->phone }}">{{ $order->phone }}</a></div>
                                    </td>
                                    <td>
                                        <div>
                                            {{ $order->basket['currency'] }}
                                            {{ $order->total }}
                                        </div>
                                    </td>
                                    <td>
                                        <div>{{ $order->address }}</div>
                                    </td>
                                    <td>
                                        @foreach($order->basket['cart'] as $item => $quantity)
                                            @if($item != 'undefined')
                                                @php
                                                    $item = \App\Models\Product::find($item);
                                                @endphp
                                                <div>
                                                    <a href="{{ route('catalogue.show', $item->slug) }}">
                                                        {{ $item->getTitle() }}
                                                    </a>
                                                    <span>{{ $quantity }}</span>
                                                </div>
                                            @endif
                                        @endforeach
                                        <div></div>
                                    </td>
                                    <td>
                                        <a id="printDropdown{{ $order->id }}" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Печать
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="printDropdown{{ $order->id }}">
                                            <a class="dropdown-item" href="{{ route('print.order.show', $order->hash) }}">Заказ</a>
                                            <a class="dropdown-item" href="{{ route('print.order.show', $order->hash) }}">Приходный ордер</a>
                                        </div>
                                        <br>
                                        <a href="{{ route('dealer.orders.edit', $order->id) }}">Посмотреть заказ подробнее</a>
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
