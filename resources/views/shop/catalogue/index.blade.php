@extends('layouts.main')

@section('title')
    Brand Bio
@endsection

@section('content')
    <div class="flex lg:flex-row lg:justify-start sm:justify-center sm:flex-col mb-16">
        @foreach($products as $product)
            <div class="product lg:mx-4 sm:my-10">
                <a href="{{ route('catalogue.show', $product->slug) }}"><div class="product__img"
                    style="background: url('/storage/products/{{ $product->img }}');background-size: cover;background-position: center center;"
                    ></div></a>
                <div class="product__title">
                    <a href="{{ route('catalogue.show', $product->slug) }}">{{ $product->getTitle() }}</a>
                </div>
                <div class="product__description">
                    {{ $product->getDescription() }}
                </div>
                <div class="product__form flex items-center justify-between">
                    <p class="my-0">{{ $product->getFormatedPrice() }}</p>
                    <button class="to-cart-btn"
                            data-product-price="{{ $product->getPrice() }}"
                            data-product-id="{{ $product->id }}">
                        {{ __('Add to cart') }}
                    </button>
                </div>
            </div>
        @endforeach
    </div>
@endsection
