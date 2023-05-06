@extends('layouts.print')

@section('content')
    <div class="lg:w-2/4 w-5/6 mx-auto mt-8" contenteditable="">
        <table class="w-full table-small" valign="top">
            <tr>
                <td rowspan="2" colspan="2">
                    КРАСНОДАРСКОЕ ОТДЕЛЕНИЕ N8619 ПАО СБЕРБАНК г. Краснодар
                    <br><br>
                    Банк получателя
                </td>
                <td class="w-[80px]">
                    БИК
                </td>
                <td rowspan="2">
                    040349602
                    <br>
                    30101810100000000602
                </td>
                <td rowspan="4" class="w-[100px]">
                </td>
            </tr>
            <tr>
                <td>к/с №</td>
            </tr>
            <tr>
                <td>
                    ИНН 616502706146
                </td>
                <td class="w-[210px]">
                    КПП
                </td>
                <td rowspan="2">
                    р/с. №
                </td>
                <td rowspan="2">
                    40802810330000116195
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    ИП Черномаз Сергей Николаевич
                    <br><br>
                    Получатель
                </td>
            </tr>
        </table>
        <div class="text-lg font-bold italic pl-4 my-1">
            Счет на оплату № 02 от 19 апреля 2023 г.
        </div>
        <hr class="border-b-[2px] border-b-[#000]">
        <table class="border-0 mr-4 text-md mt-3 table-small">
            <tr>
                <td class="border-0 w-[100px]">
                    Поставщик <br>
                    (Исполнитель):
                </td>
                <td class="border-0">
                    <b>ИП Черномаз С.Н., ИНН 616502706146, 350000, Россия, Краснодарский край, г. Краснодар ул. Рашпилевская 119 кв. 27, тел.: +79184873797</b>
                </td>
            </tr>
            <tr>
                <td class="border-0">
                    Покупатель <br>
                    (Заказчик):
                </td>
                <td class="border-0">
                    <textarea name="" id="" style="resize: none;"
                              class="w-full outline-none font-bold"
                              rows="2" placeholder="Введите данные"></textarea>
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
                    <th>Кол-во</th>
                    <th>Ед.</th>
                    <th>Цена</th>
                    <th>Сумма</th>
                </tr>
            </thead>
            <tbody>
            @foreach($order->basket['cart'] as $product => $quantity)
                @if($product != 'undefined')
                    @php
                        $item = \App\Models\Product::find($product);
                    @endphp
                    <tr>
                        <td class="text-center">{{ $item->id }}</td>
                        <td>{{ $item->getTitle() }}</td>
                        <td class="text-center">{{ $quantity }}</td>
                        <td class="text-center">шт</td>
                        <td class="text-right">{{ $item->getFormatedPrice() }}</td>
                        <td class="text-right">{{ $order->basket['currency'] }}
                            {{ number_format($item->getPrice() * $quantity, 2, ',', ' ') }}</td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
        <div class="flex justify-end mt-1">
            <table class="w-1/3 table-small text-right font-bold italic">
                <tr>
                    <td class="border-0 w-[100px]">Итого:</td>
                    <td class="border-0 w-[60px]">{{ number_format($order->basket['total'], 2, ',', ' ') }}</td>
                </tr>
                <tr>
                    <td class="border-0 w-[100px]">Без налога (НДС):</td>
                    <td class="border-0">-</td>
                </tr>
                <tr>
                    <td class="border-0 w-[100px]">Всего к оплате:</td>
                    <td class="border-0">{{ number_format($order->basket['total'], 2, ',', ' ') }}</td>
                </tr>
            </table>
        </div>
        <div class="mt-0 text-sm">
            Всего наименований {{ count($order->basket['cart']) }}, на сумму
            {{ $order->basket['currency'] }}{{ number_format($order->basket['total'], 2, ',', ' ') }}
        </div>
        <div class="text-sm font-bold" contenteditable="">
            Введите сумму буквами
        </div>
        <div class="mt-2 text-[11px]">
            Оплатить не позднее 10.05.2023
            <br>
            Оплата данного счета означает согласие с условиями поставки товара.
        </div>
        <div class="mt-2 text-[11px]">
            Уведомление об оплате обязательно, в противном случае не гарантируется наличие товара на складе. Товар отпускается по факту прихода денег на р/с Поставщика, самовывозом, при наличии доверенности и паспорта.
        </div>

        <img src="{{ asset('images/crm/sign.png') }}" class="max-w-[106%] ml-[-10px]" alt="">
{{--        <div class="w-full h-[250px]"--}}
{{--             style="background: url('{{ asset('images/crm/sign.png') }}');background-size: 100%;background-repeat: no-repeat;" alt="">--}}
    </div>

    <style>
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
@endsection
