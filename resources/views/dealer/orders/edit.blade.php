@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="card-header">
                        User info
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <span class="font-weight-bold">Name:</span>
                            {{ $order->name }}
                        </div>
                        <div class="mb-2">
                            <span class="font-weight-bold">Phone:</span>
                            {{ $order->phone }}
                        </div>
                        <div class="mb-2">
                            <span class="font-weight-bold">Email:</span>
                            {{ $order->email }}
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        Delivery info
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <span class="font-weight-bold">Country:</span>
                            {{ config('countries.countries')[$order->country] }}
                        </div>
                        <div class="mb-2">
                            <span class="font-weight-bold">Address:</span>
                            {{ $order->address }}
                        </div>
                        <div class="mb-2">
                            <span class="font-weight-bold">Email:</span>
                            {{ $order->email }}
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        Cart info
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
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
                                            <a href="{{ route('catalogue.show', $item->slug) }}">
                                                <div class="product__img"
                                                     style="background: url('/storage/products/{{ $item->img }}');
                                                         background-size: cover;background-position: center center;"
                                                ></div>
                                                {{ $item->getTitle() }}
                                            </a>
                                        </td>
                                        <td>
                                            {{ $quantity }}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-header">
                        Order status
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
                                <button class="btn btn-light mt-2 w-100">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        Payment method
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
                                <button class="btn btn-light mt-2 w-100">Save</button>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary mt-2 w-100">Send payment link</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
