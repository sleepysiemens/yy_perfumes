@extends('layouts.app')

@php($hiddenBackUrl = true)

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="title">
                            Ваш магазин
                        </div>
                    </div>
                    <div class="card-body">
                        @if(Auth::user()->shop)
                            {{ Auth::user()->shop->name }}
                            <br>
                            {{ config('countries.countries')[Auth::user()->shop->country] }}, {{ Auth::user()->shop->address }}
                        @else
                            <b>У Вас еще нет привязанного магазина.</b>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="title">Быстрый переход</div>
                    </div>
                    <div class="card-body">
                        <h5 class="fw-bold mb-2">Дилер</h5>
                        <div class="fast-items d-flex flex-wrap mb-4">
                            <a href="{{ route('dealer.dealer-orders.create') }}">
                                <div class="fast-item">
                                    <div>
                                        <p class="mb-0">
                                            <i class="fa-solid fa-cart-plus"></i>
                                            Заказать товары
                                            <span class="mb-0 fs-6 info">по дилерской цене</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('dealer.dealer-orders.index') }}">
                                <div class="fast-item">
                                    <div>
                                        <p class="mb-0">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                            Мои заказы
                                            <span class="info">из магазина</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <h5 class="fw-bold mb-2">Заказы</h5>
                        <div class="fast-items d-flex flex-wrap mb-4">
                            <a href="{{ route('dealer.orders.index') }}">
                                <div class="fast-item">
                                    <div>
                                        <p class="mb-0">
                                            <i class="fa-solid fa-chart-column"></i>
                                            Заказы
                                            <span class="info">из онлайн-магазина</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <h5 class="fw-bold mb-2">Счета</h5>
                        <div class="fast-items d-flex flex-wrap mb-4">
                            <a href="{{ route('dealer.invoices.index') }}">
                                <div class="fast-item">
                                    <div>
                                        <p class="mb-0">
                                            <i class="fa-solid fa-file-invoice-dollar"></i>
                                            Счета
                                            <span class="info">клиентам</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('dealer.invoices.create') }}">

                                <div class="fast-item">
                                    <div>
                                        <p class="mb-0">
                                            <i class="fa-solid fa-file-lines"></i>
                                            Выставление счёта
                                            <span class="info">клиенту</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <h5 class="fw-bold mb-2">Управление магазином</h5>
                        <div class="fast-items d-flex flex-wrap mb-4">
                            <a href="{{ route('dealer.invoices.index') }}">
                                <div class="fast-item">
                                    <div>
                                        <p class="mb-0">
                                            <i class="fa-solid fa-address-card"></i>
                                            Редактировать контакты
                                            <span class="info">моего магазина</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('dealer.requisites.edit') }}">
                                <div class="fast-item">
                                    <div>
                                        <p class="mb-0">
                                            <i class="fa-solid fa-file-signature"></i>
                                            Мои реквизиты
                                            <span class="info">
                                                для работы с документами
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <h5 class="fw-bold mb-2">Системные</h5>
                        <div class="fast-items d-flex flex-wrap mb-2">
                            <a href="{{ route('dealer.invoices.index') }}">
                                <div class="fast-item">
                                    <div>
                                        <p class="mb-0"><i class="fa-solid fa-language"></i> Улучшение перевода текстов
                                        <span class="info">на разные языки</span></p>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('dealer.invoices.create') }}">

                                <div class="fast-item">
                                    <div>
                                        <p class="mb-0"><i class="fa-solid fa-comment-dollar"></i> Способы оплаты и платежные данные
                                        <span class="info">для оплаты клиентами в онлайн магазине</span></p>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('dealer.invoices.create') }}">

                                <div class="fast-item">
                                    <div>
                                        <p class="mb-0"><i class="fa-solid fa-truck"></i> Способы доставки
                                            <span class="info">из магазина</span></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(Auth::user()->active === false)
        <div style="position:absolute;display:flex;z-index: 99999999;top:0;left:0;width:100%;height: 100%;align-items: center;justify-content: center;backdrop-filter: blur(2px);">
            <div style="top:0;left:0;width:500px;height:auto;background: #fff;border-radius:8px;box-shadow: 0px 0px 14px rgba(0,0,0,.3);padding: 15px;">
                <h5 class="text-black">Поздравляем, регистрация прошла успешно!</h5>
                <p class="mb-0">С Вами свяжется менеджер для обсуждения деталей и активации учетной записи. <br> Пожалуйста, ожидайте.</p>
            </div>
        </div>
    @endif
@endsection

@push('scripts')
    <style type="text/css">
        p svg {
            margin-right: 5px;
        }
        .fast-item {
            border: 1px solid rgba(69,69,255, .2);
            border-radius: 4px;
            padding: 15px 40px 15px 15px;
            min-width: fit-content;
            margin-right: 15px;
            transition: .2s ease;
            box-shadow: -4px 4px 7px rgba(0,0,0,.05);
        }
        .fast-item .info {
            max-width: 100%;
            margin-top: 0px;
            display: block;
            opacity: .6;
            margin-left: 25px;
        }
        .fast-item:hover {
            color: #fff;
            background: #4545ff;
            box-shadow: -4px 4px 7px rgba(0,0,0,.0);
        }
        .fast-item:active {
            transform: scale(.98);
            /*box-shadow: 0 0 0 0.25rem rgba(69,69,255,.5) !important;*/
        }
        .fast-item p {
            /*margin-left: 15px;*/
        }
        .fast-items a {
            text-decoration: none;
            color: #4545ff;
            font-size: 15px;
        }
    </style>
    <script>
        $(document).ready(function () {
            const ctx = document.getElementById('sells');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            ctx.canvas.parentNode.style.height = '128px';
        });
    </script>
@endpush
