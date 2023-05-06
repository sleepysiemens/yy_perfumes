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
            <div class="text-md">Name: {{ $order->name }}</div>
            <div class="text-md">Email: {{ $order->email }}</div>
            <div class="text-md">Phone: {{ $order->phone }}</div>
            <div class="mt-2">
                Delivery: {{ $order->delivery->title }}
            </div>
            <div>Address: {{ $order->address }}</div>
            <div>Shop: {{ $order->shop->name }},
                {{ config('countries.countries')[$order->shop->country] }},
                {{ $order->shop->address }}</div>
        </div>
        <table class="w-full mt-[60px]">
            <tbody>
                @foreach($order->basket['cart'] as $product => $quantity)
                    @if($product != 'undefined')
                        @php
                            $item = \App\Models\Product::find($product);
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
                                {{ $item->cost }}
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
