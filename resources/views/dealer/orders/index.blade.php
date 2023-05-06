@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Client</th>
                                <th>Total</th>
                                <th>Address</th>
                                <th>Basket</th>
                                <th style="width: 200px;">Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>
                                        <div>{{ $order->name }}</div>
                                        <div>{{ $order->email }}</div>
                                        <div>{{ $order->phone }}</div>
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
                                                    <span>x{{ $quantity }}</span>
                                                </div>
                                            @endif
                                        @endforeach
                                        <div></div>
                                    </td>
                                    <td>
                                        <a href="{{ route('order-print.show', $order->hash) }}">{{ __('Print order') }}</a>
                                        <br>
                                        <a href="{{ route('dealer.orders.edit', $order->id) }}">Change status or edit</a>
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
