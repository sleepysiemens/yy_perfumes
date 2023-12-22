@extends('layouts.print')

@section('content')
    <div class="lg:w-2/4 w-2/3 mx-auto">
        <div class="flex justify-between mt-3 items-center">
            <div class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" class="mt-[-10px]" alt="">
                <b class="text-md italic mt-[3px]">Yanina Yakusheva <br> Perfumes</b>
            </div>
            <div>Order: #{{ $order->id }}</div>
        </div>
        <div class="w-full mt-[60px]">
            <div class="text-md">Имя: {{ $order->name }}</div>
            <div class="text-md">Почта: {{ $order->email }}</div>
            <div class="text-md">Телефон: {{ $order->phone }}</div>
            <div class="mt-2">
                Способ доставки: {{ $order->delivery->title }}
            </div>
            <div>Адрес: {{ $order->address }}</div>
            <div>Магазин: {{ $order->shop->name }},
                {{ config('countries.countries')[$order->shop->country] }},
                {{ $order->shop->address }}</div>
        </div>
        <table class="w-full mt-[60px]">
            <tbody>
                @foreach($order->basket['cart'] as $product => $quantity)
                    @if($product != 'undefined')
                        @php
                            $product = $item = \App\Models\Product::find($product);
                        @endphp
                        <tr class="border-b py-4 px-2">
                            <td>
                                <img src="/storage/product/" alt="">
                            </td>
                            <td>
                                {{ $item->getTitle() }}
                            </td>
                            <td class="text-right">
                                {{ $quantity }}
                            </td>
                            <td class="text-right">
                                {!! $order->basket['currency'] !!}
                                {{-- $item->cost --}}
                                {{ $product->getPrice() }}
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        <div class="w-full flex justify-between">

        </div>
    </div>

    <style>
        tr {
        }

        td {
            padding: 20px 0;
        }
    </style>
@endsection
