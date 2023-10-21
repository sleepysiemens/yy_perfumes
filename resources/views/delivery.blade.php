@extends('layouts.main')

@section('title')
    {{ __('Delivery') }}
@endsection

@php

@endphp

@section('content')
    <h2 class="font-bold text-2xl text-center my-6 mb-0">Доставка</h2>
    <p class="text-center">Способы доставки</p>

    <hr class="my-5">
    <h2 class="font-bold text-xl">Самовывоз</h2>
    <p class="text-md">Оформите заказ и заберите его из <a href="{{ route('store-locator') }}">любого ближайшего магазина</a>, предварительно выбрав в форме оплаты.</p>

    <h2 class="font-bold text-xl mt-3">Доставка СДЭК</h2>
    <p class="text-md">Оформите заказ и выберите доставку "СДЭК". Менеджер свяжется с Вами и обсудит детали доставки.</p>

    <h2 class="font-bold text-xl mt-3">Доставка Почтой России</h2>
    <p class="text-md">Оформите заказ и выберите доставку "Почта России". Менеджер свяжется с Вами и обсудит детали доставки.</p>
@endsection
