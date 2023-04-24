@php
    // Clear undefined items
    $cart = $order->basket['cart'];
    unset($cart['undefined']);
@endphp

<h2>{{ __('You have new order') }}</h2>

<hr>

<h5 style="margin-bottom: 5px;margin-top: 15px;">{{ __('Products in cart') }}:</h5>

<table style="width:100%;margin-bottom: 15px;border-collapse: separate;border:none;" border="1" cellspacing="4" cellpadding="4">
    <thead>
    <tr>
        <th style="width: 55%;text-align: left;">{{ __('Product name') }}</th>
        <th style="width: 20%;text-align: left;">{{ __('Quantity') }}</th>
        <th style="text-align: left;">{{ __('Price') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($cart as $product => $quantity)
        @if($product != 'undefined')
            @php
                $item = \App\Models\Product::query()->find($product)
            @endphp
            <tr>
                <td style="text-align: left;">
                    <div style="font-weight: bolder;font-size: 17px;">
                        {{ $item->getTitle() }}
                    </div>
                    <div style="margin-top: 7px;font-size:11px;">
                        {{ $item->getDescription() }}
                    </div>
                </td>
                <td>{{ $quantity }}</td>
                <td style="text-align: left;">{{ $item->cost }}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>

<hr>

<h5 style="margin-top: 15px;margin-bottom: 5px;">{{ __('Client contacts') }}</h5>

<p style="margin-bottom: 0;">{{ __('Name') }}: <b>{{ $order->name }}</b></p>
<p style="margin-bottom: 0;margin-top: 3px;">{{ __('Phone number') }}: <b>{{ $order->phone }}</b></p>
<p style="margin-top: 3px;">{{ __('Email') }}: <b>{{ $order->email }}</b></p>


<hr>

<p style="margin-bottom: 0;margin-top: 15px;">{{ __('Total amount') }}:
    <b>{{ $order->basket['currency'] }} {{ $order->total }}</b>
</p>
<p style="margin-top: 3px;margin-bottom: 15px;">{{ __('Products') }}: <b>{{ count($cart) }}</b></p>

<hr>

<div style="width: fit-content;margin: 0 auto;margin-top: 10px;">
    <a href="{{ route('dealer.orders.edit', $order->id) }}" style="text-decoration: none;">
        <div style="width: 140px;max-width:140px;text-align:center;padding: 5px 15px;background: #000;color:#fff;text-decoration: none;display: inline-block;">
            {{ __('View order') }}
        </div>
    </a>
    <a href="{{ route('dealer.orders.index') }}" style="text-decoration: none;">
        <div style="width: 140px;max-width:140px;text-align:center;padding: 5px 15px;background: #000;color:#fff;text-decoration: none;display: inline-block;margin-left: 15px;">
            {{ __('My orders') }}
        </div>
    </a>
</div>

{{--@if($order->shop->telegram == '')--}}
{{--    <div style="width: 100%;margin: 0 auto;margin-top: 20px;background: rgba(186, 22, 22, .6);display: block;border-radius: 4px;padding: 5px 15px;">--}}
{{--        <div style="color: #fff;">--}}
{{--            Вы еще не привязали Telegram к магазину.--}}
{{--            Привяжите его и <b>получайте уведомления</b> о заказах прямо в Telegram.--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endif--}}
