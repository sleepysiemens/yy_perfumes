@extends('layouts.main')

@section('content')
    @include('dealer.menu')

    <table class="w-full table text-left mt-12">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Address') }}</th>
                <th>{{ __('Order status') }}</th>
                <th>{{ __('Total amount') }}</th>
                @if(Auth::user()->type == 'dealer')
                    <th>
                    </th>
                @endif
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach(Auth::user()->orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->status->title }}</td>
                    <td>{{ $order->total }}</td>
                    @if(Auth::user()->type == 'dealer')
                        <td>
                            <a href="{{ route('print.invoice.show', $order->hash) }}" target="_blank">
                                <button class="to-cart-btn whitespace-nowrap p-2 px-5 text-md bg-gray-100 hover:bg-gray-300 active:scale-95 text-black duration-200 flex items-center">
                                    <i class="fa-solid fa-file-invoice-dollar mr-2 text-lg"></i>
                                    View invoice
                                </button>
                            </a>
                        </td>
                    @endif
                    <td>
                        <a href="{{ route('print.order.show', $order->hash) }}" target="_blank" class="">{{ __('View order') }}</a>
                        <br>
                        <a href="" class="text-red-600">{{ __('Cancel order') }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <style>
        td {
            padding: 15px 15px;
        }

        tr:nth-child(even) {
            background: rgba(0,0,0,.02);
        }
    </style>
@endsection
