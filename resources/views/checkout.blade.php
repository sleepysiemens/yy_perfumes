@extends('layouts.main')

@section('title')
    {{ __('Checkout order') }}
@endsection

@php
    $cartTotals = (new \App\Services\Shop\CartService())->getCart();
    $cart = Session::has('cart') ? Session::get('cart') : [];
@endphp

@section('content')
    @if (count($cart) < 1)
        <h2 class="font-bold text-2xl mt-4 mb-1">В корзине еще нет товаров</h2>
        <a href="{{ route('catalogue.index') }}" class="underline">В каталог</a>
    @else
        <div class="flex flex-wrap mt-3" id="app">
            <checkout-order csrf="{{ csrf_token() }}" submit="{{ route('order.store') }}"></checkout-order>
            <div class="lg:w-1/3 w-full">
                @php
                    $cart = Session::has('cart') ? Session::get('cart') : [];
                    $cartTotals = (new \App\Services\Shop\CartService())->getCart();
                @endphp
                @if (count($cart) > 0)
                    @foreach ($cart as $item => $itemArray)
                        @php
                            $product = $item != 'undefined' && isset($item) ? \App\Models\Product::find($item) : null;
                        @endphp

                        @if ($product)
                            <div class="flex items-start justify-between my-5 py-5 border-t relative border-b">
                                <div class="flex items-center">
                                    <img src="{{ $product->getImage() }}" class="rounded-sm" width="50px" alt="">
                                    <div class="ml-4">
                                        <div class="flex">
                                            <h2 class="font-bold text-md">{{ $product->getTitle() }}</h2>
                                        </div>
                                        <p class="text-md">{{ mb_substr($product->getDescription(), 0, 60) }}</p>
                                        <div class="flex border w-fit px-3">
                                            {{-- <button id="plus_{{ $item }}" class="count_edit_minus" data-id="{{ $item }}">-</button>
                                            <input type="tel" value="{{ $itemArray }}" id="count_{{ $item }}" style="width: 50px;text-align: center;outline: none !important;">
                                            <button id="minus_{{ $item }}" class="count_edit_plus" data-id="{{ $item }}">+</button> --}}

                                            <button id="minus_{{$product->id}}" class="count_edit_minus" onclick='decr({{$product->id}})'>-</button>
                                            <input id="product_amount_{{$product->id}}" type="number" value="{{ $itemArray }}" style="width: 50px;text-align: center;outline: none !important;" onchange='$("#add_to_card_{{$product->id}}").trigger("click"); reloader = setTimeout(reload, 5);'>
                                            <button id="plus_{{$product->id}}" class="count_edit_plus" onclick='incr({{$product->id}})'>+</button>
                                            <button id="add_to_card_{{$product->id}}" class="to-cart-btn reload-page" data-product-price="{{ $product->getPrice() }}" data-product-id="{{ $product->id }}"></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex pr-3 flex-col text-sm font-light absolute right-0">
                                    {{ $product->getFormatedPrice() }}
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <div class="flex justify-start">
                        <div class="flex items-start">
                            <span class="">{{ __('Total') }}:</span>
                            <span class="font-bold ml-2">{{ $cartTotals['currency'] }} <span id="cart_total">{{ number_format($cartTotals['total'], 2, ',', ' ') }}</span></span>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif
@endsection

@push('scripts')
    <script>

        $('.count_edit_minus').on('click', function () {
            let elementId = $(this).attr('data-id');
            let countInput = $('#count_' + elementId);
            let count = Number($(countInput).val());

            if (count > 1) {
                countInput.val(count - 1);

                updateCount({
                    id: elementId,
                    count: count - 1
                });
            }

            console.log(countInput.val());
        });
        $('.count_edit_plus').on('click', function () {
            let elementId = $(this).attr('data-id');
            let countInput = $('#count_' + elementId);
            let count = Number($(countInput).val());

            countInput.val(count + 1);

            updateCount({
                id: elementId,
                count: count + 1
            });

            console.log(count++);
        });

        // {itemId: newCount}
        function updateCount(updateData) {
            // $.post('/cart/update', updateData)
            //     .then(response => {
            //         console.log(response.data);
            //     });
            $.post(
                '/cart/update',
                updateData,
                function (response) {
                    updateAmount(Intl.NumberFormat('ru-RU').format(response.total));
                }
            );
        }

        function updateAmount(newAmount) {
            $('#cart_total').html(newAmount);
        }
    </script>
    <script>
        function reload(){window.location.reload();}

        function decr(id)
        {
            let value = document.getElementById("product_amount_"+id).value;
            if(value>1)
            {
                value = document.getElementById("product_amount_"+id).value--;
                $('#add_to_card_' + id).trigger("click");
                reloader = setTimeout(reload, 5);
            }
        }
        function incr(id)
        {
                value = document.getElementById("product_amount_"+id).value++;
                $('#add_to_card_' + id).trigger("click");
                reloader = setTimeout(reload, 5);
        }
    </script>
@endpush
