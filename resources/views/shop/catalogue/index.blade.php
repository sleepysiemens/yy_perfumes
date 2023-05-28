@extends('layouts.main')

@section('title')
    Brand Bio
@endsection

@section('content')
    <div class="flex lg:flex-row flex-wrap lg:justify-around sm:justify-center sm:flex-row flex-col mb-16">
        @foreach($products as $product)
            <div class="product xl:w-[22%] sm:w-2/5 w-full md:mx-4 sm:my-10 md:mb-0 mb-28">
                <a href="{{ route('catalogue.show', $product->slug) }}"><div class="product__img"
                    style="background: url('{{ $product->getImage() }}');background-size: cover;background-position: center center;"
                    ></div></a>
                <div class="product__title mt-7">
                    <a href="{{ route('catalogue.show', $product->slug) }}">{{ $product->getTitle() }}</a>
                </div>
                <div class="product__description my-4 mt-1">
                    {{ mb_substr($product->getDescription(), 0, 60) }}...
                </div>
                <div class="product__form flex items-center justify-between">
                    <p class="my-0">{{ $product->getFormatedPrice() }}</p>
                    @if ((new \App\Services\Shop\CartService())->checkExists($product->id))
                        <a href="{{ route('cart.view') }}">
                            <button class="to-cart-btn whitespace-nowrap p-2 px-5 bg-gray-100 hover:bg-gray-300 active:scale-95 text-black duration-200 flex items-center">
                                {{ __('Add to cart') }}
                            </button>
                        </a>
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
@endsection
