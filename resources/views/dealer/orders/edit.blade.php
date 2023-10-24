@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('User info') }}
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <span class="font-weight-bold">{{ __('Name') }}:</span>
                            {{ $order->name }}
                        </div>
                        <div class="mb-2">
                            <span class="font-weight-bold">{{ __('Phone') }}:</span>
                            {{ $order->phone }}
                        </div>
                        <div class="mb-2">
                            <span class="font-weight-bold">{{ __('Email') }}:</span>
                            {{ $order->email }}
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        {{ __('Delivery info') }}
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <span class="font-weight-bold">{{ __('Country') }}:</span>
                            {{ config('countries.countries')[$order->country] }}
                        </div>
                        <div class="mb-2">
                            <span class="font-weight-bold">{{ __('Address') }}:</span>
                            {{ $order->address }}
                        </div>
                        <div class="mb-2">
                            <span class="font-weight-bold">{{ __('Email') }}:</span>
                            {{ $order->email }}
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        {{ __('Cart') }}
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>{{ __('Product') }}</th>
                                <th style="width:120px;">{{ __('Quantity') }}</th>
                                <th style="width:120px;">Цена</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->basket['cart'] as $item => $quantity)
                                @if($item != 'undefined')
                                    @php
                                        $item = \App\Models\Product::find($item);
                                    @endphp
                                    <tr>
                                        <td class="d-flex align-items-center">
                                            <img src="{{ $item->getImage() }}" alt="" class="mr-3" style="width:50px;margin-right: 15px;">
                                            <a href="{{ route('catalogue.show', $item->slug) }}">
                                                {{ $item->getTitle() }}
                                            </a>
                                        </td>
                                        <td>
                                            {{ $quantity }}
                                        </td>
                                        <td>
                                            {{ number_format($item->getGuestPrice() * $quantity, 2, ',', ' ') }}
                                            {{ $order->basket['currency'] }}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        {{ __('Create invoice') }}
                    </div>
                    <div class="card-body">
                        <a href="{{ route('dealer.invoices.create', ['order_id' => $order->id]) }}" class="btn btn-primary">{{ __('Create invoice') }}</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Order status') }}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dealer.orders.update', $order->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <select name="status" class="form-control" id="">
                                    @foreach(\App\Models\OrderStatus::all() as $status)
                                        <option value="{{ $status->id }}"
                                                @if($order->order_status_id == $status->id)
                                                    selected
                                                @endif
                                        >{{ $status->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-light mt-2 w-100">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        {{ __('Payment method') }}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dealer.orders.update', $order->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <select name="status" class="form-control" id="">
                                    @foreach(\App\Models\OrderStatus::all() as $status)
                                        <option value="{{ $status->id }}"
                                                @if($order->order_status_id == $status->id)
                                                    selected
                                            @endif
                                        >{{ $status->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-light mt-2 w-100">{{ __('Save') }}</button>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary mt-2 w-100">{{ __('Send payment link') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
