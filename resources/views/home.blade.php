@extends('layouts.main')

@section('content')
    <div class="flex flex-wrap sm:flex-row items-center flex-col justify-between w-1/2 mx-auto">
        <a href="" class="underline">{{ __('My orders') }}</a>
        <a href="">{{ __('Actions') }}</a>
        @if (Auth::user()->type == 'dealer')
            <a href="{{ route('dealer.dashboard') }}">{{ __('Dealer') }}</a>
        @else
            <a href="{{ route('become-dealer') }}">{{ __('Become dealer') }}</a>
        @endif
    </div>

    <table class="w-full table text-left mt-12">
        <thead>
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Address</th>
                <th>Order status</th>
                <th>Total amount</th>
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
                    <td><a href="" class="underline">{{ __('Cancel order') }}</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
