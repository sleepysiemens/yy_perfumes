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
        <div class="flex flex-wrap mt-3">
            @if (Auth::check() && Auth::user()->type == 'dealer')
                <form action="{{ route('order.store') }}" method="post" class="lg:w-1/3 lg:mb-0 mx-auto w-full mb-5">
                    @csrf
                    <h1 class="text-xl font-semibold mb-5">{{ __('Checkout order as dealer') }}</h1>
                    <div class="form-group">
                        <label for="" class="font-medium">{{ __('Name') }}</label>
                        <input type="text" name="name" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600" placeholder="{{ __('Enter name') }}"
                            value="{{ Auth::check() == 1 ? Auth::user()->name : '' }}">
                    </div>
                    <div class="form-group mt-3">
                        <label for="" class="font-medium">{{ __('Email') }}</label>
                        <input type="email" name="email" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600" placeholder="{{ __('Enter email') }}"
                            value="{{ Auth::check() == 1 ? Auth::user()->email : '' }}">
                    </div>
                    <div class="form-group mt-4 mb-1">
                        <label for="" class="font-medium">{{ __('Shop') }}</label>
                        <div class="font-bold mt-1 text-md">Wholesale delivery to the {{ Auth::user()->shop->name }} |
                            {{ Auth::user()->shop->address }}</div>
                    </div>
                    <div class="my-3 mb-5">
                        <a href="">{{ __('When placing an order, I agree to the terms') }}</a>
                    </div>
                    <button class="to-cart-btn whitespace-nowrap p-2 px-5 bg-zinc-900 hover:bg-zinc-700 active:scale-95 text-white duration-200 flex items-center">{{ __('Confirm order') }}</button>
                </form>
            @else
                <form action="{{ route('order.store') }}" method="post" class="lg:w-1/3 lg:mb-0 mx-auto w-full mb-5">
                    @csrf
                    <h1 class="text-xl font-semibold mb-5">{{ __('Checkout order') }}</h1>
                    <div class="form-group">
                        <label for="" class="font-medium">{{ __('Name') }}</label>
                        <input type="text" name="name" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600" placeholder="{{ __('Enter name') }}"
                               value="{{ Auth::check() == 1 ? Auth::user()->name : '' }}">
                    </div>
                    <div class="form-group mt-3">
                        <label for="" class="font-medium">{{ __('Phone') }}</label>
                        <input type="text" name="phone" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600" placeholder="{{ __('Enter name') }}"
                               value="{{ Auth::check() == 1 ? Auth::user()->phone : '' }}">
                    </div>
                    <div class="form-group mt-3">
                        <label for="" class="font-medium">{{ __('Email') }}</label>
                        <input type="email" name="email" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600" placeholder="{{ __('Enter email') }}"
                               value="{{ Auth::check() == 1 ? Auth::user()->email : '' }}">
                    </div>
                    <div class="form-group mt-3">
                        <label for="" class="font-medium">{{ __('Select shop') }}</label>
                        <select name="shop" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600">
                            @foreach(\App\Models\Shop::all() as $shop)
                                <option value="{{ $shop->id }}" @if(App::getLocale() == $shop->country) selected @endif>
                                    @if($shop->name != '')
                                        {{ $shop->name }} |
                                    @endif
                                    {{ config('countries.countries')[$shop->country]  }},
                                    {{ $shop->address }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="" class="font-medium">{{ __('Address') }}</label>
                        <input type="text" name="address" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600" placeholder="{{ __('Город') }}">
                        <input type="text" name="address" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600" placeholder="{{ __('Адрес') }}">
                        <input type="text" name="address" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600" placeholder="{{ __('Почтовый индекс') }}">
                    </div>
                    <h4 class="font-weight-bold mt-3">Выберите способ доставки</h4>
                    <div class="mt-5 mb-3 flex flex-wrap">
                        <label class="radio-select-large">
                            <input class="radio-select-large-input" type="radio"  name="option" checked>
                            <div class="radio-select-large-content">
                                <strong class="radio-select-large-title">СДЭК</strong>
                            </div>
                        </label>

                        <label class="radio-select-large">
                            <input class="radio-select-large-input" type="radio"  name="option" >
                            <div class="radio-select-large-content">
                                <strong class="radio-select-large-title">Почта России</strong>
                            </div>
                        </label>

                        <label class="radio-select-large">
                            <input class="radio-select-large-input" type="radio"  name="option" >
                            <div class="radio-select-large-content">
                                <strong class="radio-select-large-title">Самовывоз</strong>
{{--                                <small class="radio-select-large-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small>--}}
                            </div>
                        </label>
                    </div>
                    <div class="my-3 mb-5">
                        <a href="">{{ __('When placing an order, I agree to the terms') }}</a>
                    </div>
                    <button class="to-cart-btn whitespace-nowrap p-2 px-5 bg-zinc-900 hover:bg-zinc-700 active:scale-95 text-white duration-200 flex items-center">{{ __('Confirm order') }}</button>
                </form>
            @endif
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
                            <span class="font-bold ml-2">{{ $cartTotals['currency'] }} {{ $cartTotals['total'] }}</span>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif
@endsection
