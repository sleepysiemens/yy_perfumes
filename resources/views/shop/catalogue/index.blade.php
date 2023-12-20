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
                        <a href="{{ route('cart.view') }}">
                            <div class="in-basket whitespace-nowrap p-2 px-5 bg-gray-100 hover:bg-gray-300 active:scale-95 text-black duration-200 flex items-center">
                                {{ __('In cart') }}
                            </div>
                        </a>
                        @php
                            $cart=(new \App\Services\Shop\CartService())->getCart();
                        @endphp
                        <input type="text" id="product_amount_{{$product->id}}" class="border h-10 w-14 text-center outline-none focus:bg-slate-100 duration-200" min="1" max="100" value="{{$cart['cart'][$product->id]}}">
                        <a href="{{ route('cart.remove', $product->id) }}" style="height: 40px;">
                            <button class="in-basket whitespace-nowrap p-2 px-5 bg-gray-100 hover:bg-gray-300 active:scale-95 text-black duration-200 flex items-center" style="height: 100%">
                                <svg width="20px" height="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">    <path d="M 7 4 C 6.744125 4 6.4879687 4.0974687 6.2929688 4.2929688 L 4.2929688 6.2929688 C 3.9019687 6.6839688 3.9019687 7.3170313 4.2929688 7.7070312 L 11.585938 15 L 4.2929688 22.292969 C 3.9019687 22.683969 3.9019687 23.317031 4.2929688 23.707031 L 6.2929688 25.707031 C 6.6839688 26.098031 7.3170313 26.098031 7.7070312 25.707031 L 15 18.414062 L 22.292969 25.707031 C 22.682969 26.098031 23.317031 26.098031 23.707031 25.707031 L 25.707031 23.707031 C 26.098031 23.316031 26.098031 22.682969 25.707031 22.292969 L 18.414062 15 L 25.707031 7.7070312 C 26.098031 7.3170312 26.098031 6.6829688 25.707031 6.2929688 L 23.707031 4.2929688 C 23.316031 3.9019687 22.682969 3.9019687 22.292969 4.2929688 L 15 11.585938 L 7.7070312 4.2929688 C 7.5115312 4.0974687 7.255875 4 7 4 z"/></svg>
                            </button>
                        </a>
                        <button id="add_to_card_{{$product->id}}" class="to-cart-btn" style="display: none" data-product-price="{{ $product->getPrice() }}" data-product-id="{{ $product->id }}"></button>
                    @else
                        <button class="to-cart-btn"
                                data-product-price="{{ $product->getPrice() }}"
                                data-product-id="{{ $product->id }}">
                            {{ __('Add to cart') }}
                        </button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <script>
        $('.to-cart-btn').on('click', function () {
            $(this).html('{{ __('In cart') }}');
            $(this).addClass('in-basket');
        });
    </script>
@endsection
