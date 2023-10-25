@php
$numberFormatter = new \NumberFormatter('ru', NumberFormatter::SPELLOUT);
@endphp

@extends('layouts.print')

@section('content')
    <div class="lg:w-2/4 w-5/6 mx-auto mt-8" contenteditable="">
        <table class="w-full table-small" valign="top">
            <tr>
                <td rowspan="2" colspan="2">
                    @if($dealerBy)
                        КРАСНОДАРСКОЕ ОТДЕЛЕНИЕ N8619 ПАО СБЕРБАНК г. Краснодар
                    @else
                        {{ Auth::user()->requisites['bank_name'] ?? '' }}
                    @endif
                    <br><br>
                    Банк получателя
                </td>
                <td class="w-[80px]">
                    БИК
                </td>
                <td rowspan="2">
                    @if($dealerBy)
                        040349602
                    @else
                        {{ Auth::user()->requisites['bik'] ?? '' }}
                    @endif
                    <br>
                    @if($dealerBy)
                        30101810100000000602
                    @else
                        {{ Auth::user()->requisites['kor'] ?? '' }}
                    @endif
                </td>
                <td rowspan="4" class="w-[100px]">
                </td>
            </tr>
            <tr>
                <td>к/с №</td>
            </tr>
            <tr>
                <td>
                    ИНН
                    @if($dealerBy)
                        616502706146
                    @else
                        {{ Auth::user()->requisites['inn'] ?? '' }}
                    @endif
                </td>
                <td class="w-[210px]">
                    КПП
                    @if($dealerBy)

                    @else
                        {{ Auth::user()->requisites['self_kpp'] ?? '' }}
                    @endif
                </td>
                <td rowspan="2">
                    р/с. №
                </td>
                <td rowspan="2">
                    @if($dealerBy)
                        40802810330000116195
                    @else
                        {{ Auth::user()->requisites['ras']  ?? '' }}
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    @if($dealerBy)
                        ИП Черномаз Сергей Николаевич
                    @else
                        {{ Auth::user()->requisites['soc_name']  ?? '' }}
                    @endif
                    <br><br>
                    Получатель
                </td>
            </tr>
        </table>
        <div class="text-lg font-bold italic pl-4 my-1">
            Счет на оплату № {{ $invoice->id }} от {{ \Carbon\Carbon::parse($invoice->created_at)->translatedFormat('j F Y') }} г.
        </div>
        <hr class="border-b-[2px] border-b-[#000]">
        <table class="border-0 mr-4 text-md mt-3 table-small">
            <tr>
                <td class="border-0 w-[100px]">
                    Поставщик <br>
                    (Исполнитель):
                </td>
                <td class="border-0">

                    <b>
                        @if($dealerBy)
                            ИП Черномаз С.Н., ИНН 616502706146, 350000, Россия, Краснодарский край, г. Краснодар ул. Рашпилевская 119 кв. 27, тел.: +79184873797
                        @else
                            {{ Auth::user()->requisites['soc_name']  ?? '' }}, ИНН {{ Auth::user()->requisites['inn']  ?? '' }}, {{ Auth::user()->requisites['address']  ?? '' }},
                            @if(isset(Auth::user()->requisites['phone']) && Auth::user()->requisites['phone'] != '')
                                тел: {{ Auth::user()->requisites['phone'] ?? '' }}
                            @endif
                        @endif
                    </b>
                </td>
            </tr>
            <tr>
                <td class="border-0">
                    Покупатель <br>
                    (Заказчик):
                </td>
                <td class="border-0">
                    @if($invoice)
                        <b>{{ $invoice->requisites['soc_name'] ?? '' }}, ИНН {{$invoice->requisites['inn'] ?? ''}}, КПП {{$invoice->requisites['inn'] ?? ''}},
                            {{$invoice->requisites['address'] ?? ''}}, тел: {{$invoice->requisites['phone'] ?? ''}}</b>
                    @else
                        <textarea name="" id="" style="resize: none;"
                                  class="w-full outline-none font-bold"
                                  rows="2" placeholder="Введите данные"></textarea>
                    @endif
                </td>
            </tr>
        </table>
        <div class="text-sm mt-5 mb-3">
            Основание:
        </div>
        <table class="w-full small-td border-2 border-[#000]">
            <thead>
                <tr class="italic">
                    <th>№</th>
                    <th>Товары (работы, услуги)</th>
                    <th>Артикул</th>
                    <th>Кол-во</th>
                    <th>Ед.</th>
                    <th>Цена</th>
                    <th>Сумма</th>
                </tr>
            </thead>
            <tbody>
            @if($order)
                @foreach($order->basket['cart'] as $product => $quantity)
                    @if($product != 'undefined')
                        @php
                            $item = \App\Models\Product::find($product);
                        @endphp
                        <tr>
                            <td class="text-center">{{ $item->id }}</td>
                            <td>{{ $item->getTitle() }}</td>
                            <td>{{ $item->artikul }}</td>
                            <td class="text-center">{{ $quantity }}</td>
                            <td class="text-center">шт</td>
                            <td class="text-right">{{ $order->basket['currency'] }}
                                {{ number_format($item->getPrice(), 2, ',', ' ') }}</td>
                            <td class="text-right">{{ $order->basket['currency'] }}
                                {{ number_format($item->getPrice() * $quantity, 2, ',', ' ') }}</td>
                        </tr>
                    @endif
                @endforeach
            @else
                <tr>
                    <td class="text-center"></td>
                    <td></td>
                    <td></td>
                    <td class="text-center"></td>
                    <td class="text-center">шт</td>
                    <td class="text-right"></td>
                    <td class="text-right"></td>
                </tr>
            @endif
            </tbody>
        </table>
        <div class="flex justify-end mt-1">
            <table class="w-1/3 table-small text-right font-bold italic">
                <tr>
                    <td class="border-0 w-[100px]">Итого:</td>
                    <td class="border-0 w-[60px]">@if($order) {{ number_format($order->basket['total'], 2, ',', ' ') }}@endif</td>
                </tr>
                <tr>
                    <td class="border-0 w-[100px]">Без налога (НДС):</td>
                    <td class="border-0">-</td>
                </tr>
                <tr>
                    <td class="border-0 w-[100px]">Всего к оплате:</td>
                    <td class="border-0">@if($order){{ number_format($order->basket['total'], 2, ',', ' ') ?? '' }}@endif</td>
                </tr>
            </table>
        </div>
        <div class="mt-0 text-sm">
            Всего наименований @if($order){{ count($order->basket['cart']) }}@endif, на сумму
            @if($order){{ $order->basket['currency'] }}{{ number_format($order->basket['total'], 2, ',', ' ') ?? '' }}@endif
        </div>
        <div class="text-sm font-bold" contenteditable="">
            @if($order)
                {{ $numberFormatter->format(floor($order->basket['total'])) }} рублей
                {{ $numberFormatter->format(
                        explode(",",
                            number_format($order->basket['total'], 2, ',', '')
                        )[1]
                ) }}
                копеек
            @else
                Введите сумму буквами
            @endif
        </div>
        <div class="mt-2 text-[11px]">
            Оплатить не позднее {{ \Carbon\Carbon::now()->addDays(10)->format('d.m.Y') }}
            <br>
            Оплата данного счета означает согласие с условиями поставки товара.
        </div>
        <div class="mt-2 text-[11px]">
            Уведомление об оплате обязательно, в противном случае не гарантируется наличие товара на складе. Товар отпускается по факту прихода денег на р/с Поставщика, самовывозом, при наличии доверенности и паспорта.
        </div>

        @if($dealerBy)
            <img src="{{ asset('images/crm/sign.png') }}" class="max-w-[106%] ml-[-10px]" alt="">
        @else
            <div style="height:2px;width:100%;background:#000;margin-top: 30px;"></div>

            <div style="display:flex;margin-top: 45px;">
                <b style="font-style: italic;margin-top: -15px;">Предприниматель</b>
                <div style="height:1px;width:100%;background:#000;transform: translateY(5px)">
                    <div class="text-right">
                        <div class="text-right" style="margin-top: -18px;font-size: 13px;">
                            {{ Auth::user()->requisites['display_name'] ?? '' }}
                        </div>
                    </div>
                </div>
            </div>

        @endif
{{--        <div class="w-full h-[250px]"--}}
{{--             style="background: url('{{ asset('images/crm/sign.png') }}');background-size: 100%;background-repeat: no-repeat;" alt="">--}}
    </div>
@endsection

@push('scripts')

    <style>
        * {
            -webkit-print-color-adjust: exact;
        }

        body {
            font-family: Arial;
        }

        tr {
        }

        th, td {
            font-size: 13px;
            vertical-align: top;
            padding-left: 5px;
            padding-right: 5px;
            border: 1px solid #000;
        }

        .table-small th, .table-small td {
            font-size: 11px;
        }

        .small-td td {
            font-size: 11px;
        }

        textarea::placeholder {
            color: #d20000;
        }

        @media (max-width: 1300px) {
            td {
                font-size: 12px;
            }
        }
    </style>
@endpush
