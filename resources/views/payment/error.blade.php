@extends('layouts.main')

@section('title')
    Ошибка платежа
@endsection

@section('content')
    <h1 class="text-center text-2xl font-semibold">Платеж прерван</h1>
    <p class="text-center my-1 font-medium">Ваш платеж был прерван.</p>
    <div class="flex justify-center mt-5">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
            <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM8.243.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L8.243.184z"/>
        </svg>
    </div>
    <p class="text-center mt-5 text-yellow-700">
        <a href="{{ $order->payment_link }}">Пожалуйста, повторите попытку оплаты.</a>
    </p>
@endsection

sudo apt -y install php8.2 php8.2-cli php8.2-fpm php8.2-json php8.2-pdo php8.2-mysql php8.2-zip php8.2-gd php8.2-mbstring php8.2-curl php8.2-xml php-pear php8.2-bcmath
