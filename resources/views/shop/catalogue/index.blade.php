@extends('layouts.main')

@section('title')
    Brand Bio
@endsection

@section('content')
    <div class="flex lg:flex-row flex-wrap lg:justify-around sm:justify-center sm:flex-row flex-col mb-16">
        @php
            $cnt=0;
        @endphp
        @foreach($products as $product)
            @php
                $cnt++;
            @endphp
            <div class="product xl:w-[22%] sm:w-2/5 w-full md:mx-4 sm:my-10 md:mb-0 mb-28">
                <a href="{{ route('catalogue.show', $product->slug) }}"><div class="product__img"
                    style="background: url('{{ $product->getImage() }}');background-size: cover;background-position: center center;"
                    ></div></a>
                <div class="product__title mt-7">
                    <a href="{{ route('catalogue.show', $product->slug) }}">{{ $product->getTitle() }}</a>
                </div>
                <div class="product__description text-[13px] my-4 mt-1">
                    {{ mb_substr($product->getDescription(), 0, 60) }}...
                </div>
                <div class="product__form flex items-center justify-between">
                    <p class="my-0">{{ $product->getFormatedPrice() }}</p>
                    @if ((new \App\Services\Shop\CartService())->checkExists($product->id))
                        {{-- =================================== PRODUCTS IN CART =================================== --}}
                        @php
                            $cart=(new \App\Services\Shop\CartService())->getCart();
                        @endphp
                    <div class="flex">
                        <a href="{{ route('cart.view') }}">
                            <div class="in-basket whitespace-nowrap p-2 px-5 bg-gray-100 hover:bg-gray-300 active:scale-95 text-black duration-200 flex items-center">
                                {{ __('In cart') }}
                            </div>
                        </a>
                        <input type="number" id="product_amount_{{$product->id}}" class="border h-10 w-14 text-center outline-none focus:bg-slate-100 duration-200" min="1" max="100" value="{{$cart['cart'][$product->id]}}">
                        <button id="add_to_card_{{$product->id}}" class="to-cart-btn" style="display: none" data-product-price="{{ $product->getPrice() }}" data-product-id="{{ $product->id }}"></button>
                    </div>
                    @else
                        {{-- =================================== NO PRODUCTS IN CART =================================== --}}
                        <div class="flex items-center" style="justify-content: end">
                            <button class="to-cart-btn" id="to-cart-btn-{{$product->id}}"
                                    data-product-price="{{ $product->getPrice() }}"
                                    data-product-id="{{ $product->id }}">
                                {{ __('Add to cart') }}
                            </button>
                            <input type="number" id="product_amount_{{$product->id}}" class="del-btn-hidden border h-10 w-14 text-center outline-none focus:bg-slate-100 duration-200" min="1" max="100" value="1">
                        </div>
                        <button id="add_to_card_{{$product->id}}" class="to-cart-btn" style="display: none" data-product-price="{{ $product->getPrice() }}" data-product-id="{{ $product->id }}"></button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <script>
        for(let cnt=1; cnt<=4; cnt++)
        {
            $('#to-cart-btn-'+cnt).on('click', function () {
                $(this).html('{{ __('In cart') }}');
                $(this).addClass('in-basket');
                $('#product_amount_'+cnt).removeClass('del-btn-hidden');
                $('#del_btn_'+cnt).removeClass('del-btn-hidden');
            });
        }
    </script>
@endsection
