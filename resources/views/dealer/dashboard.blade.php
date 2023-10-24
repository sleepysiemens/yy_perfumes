@extends('layouts.app')

@section('content')
    <div class="container">
{{--        <div class="row">--}}
{{--            <div class="col-lg-12">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        <div class="title">--}}
{{--                            Orders--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <canvas id="sells"></canvas>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
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
                                        <p class="mb-0">Заказать товары</p>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('dealer.dealer-orders.index') }}">
                                <div class="fast-item">
                                    <div>
                                        <p class="mb-0">Мои заказы</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <h5 class="fw-bold mb-2">Заказы</h5>
                        <div class="fast-items d-flex flex-wrap mb-4">
                            <a href="{{ route('dealer.orders.index') }}">
                                <div class="fast-item">
                                    <div>
                                        <p class="mb-0">Заказы</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <h5 class="fw-bold mb-2">Счета</h5>
                        <div class="fast-items d-flex flex-wrap mb-4">
                            <a href="{{ route('dealer.invoices.index') }}">
                                <div class="fast-item">
                                    <div>
                                        <p class="mb-0">Счета</p>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('dealer.invoices.create') }}">

                                <div class="fast-item">
                                    <div>
                                        <p class="mb-0">Выставление счёта</p>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <h5 class="fw-bold mb-2">Управление магазином</h5>
                        <div class="fast-items d-flex flex-wrap mb-4">
                            <a href="{{ route('dealer.invoices.index') }}">
                                <div class="fast-item">
                                    <div>
                                        <p class="mb-0">Редактировать контакты</p>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('dealer.requisites.edit') }}">
                                <div class="fast-item">
                                    <div>
                                        <p class="mb-0">Мои реквизиты</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <h5 class="fw-bold mb-2">Системные</h5>
                        <div class="fast-items d-flex flex-wrap mb-2">
                            <a href="{{ route('dealer.invoices.index') }}">
                                <div class="fast-item">
                                    <div>
                                        <p class="mb-0">Улучшение перевода текстов</p>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('dealer.invoices.create') }}">

                                <div class="fast-item">
                                    <div>
                                        <p class="mb-0">Способы оплаты и платежные данные</p>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('dealer.invoices.create') }}">

                                <div class="fast-item">
                                    <div>
                                        <p class="mb-0">Способы доставки</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <style type="text/css">
        .fast-item {
            border: 1px solid rgba(69,69,255, .2);
            border-radius: 4px;
            padding: 15px 0;
            min-width: 300px;
            margin-right: 15px;
            transition: .2s ease;
            box-shadow: -4px 4px 7px rgba(0,0,0,.05);
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
            margin-left: 15px;
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
