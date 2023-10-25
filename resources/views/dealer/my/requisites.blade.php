@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('success'))
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                </div>
            </div>
        @endif
        <form class="row" action="{{ route('dealer.requisites.update') }}" method="post">
            @csrf
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        Мои реквизиты
                    </div>
                    <input type="text" value="{{ $_GET['order_id'] ?? '' }}" name="order_id" hidden="hidden">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="inn">ИНН</label>
                                    <input type="text" id="inn" class="form-control mb-1" name="inn" value="{{ Auth::user()->requisites['inn'] ?? '' }}">
                                    <a href="javascript:void(0);" onclick="loadData()">Подгрузить данные</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="inn">Инициалы (Фамилия И.О.)</label>
                                    <input type="text" id="inn" class="form-control mb-1" name="display_name" value="{{ Auth::user()->requisites['display_name'] ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="soc_name">Сокращенное наименование</label>
                                    <input type="text" id="soc_name" class="form-control mb-1" name="soc_name" value="{{ Auth::user()->requisites['soc_name'] ?? '' }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="name">Полное наименование</label>
                                    <input type="text" id="name" class="form-control mb-1" name="name" value="{{ Auth::user()->requisites['name'] ?? '' }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="address">Адрес</label>
                                    <input type="text" id="address" class="form-control mb-1" name="address" value="{{ Auth::user()->requisites['address'] ?? '' }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="okpo">ОКПО</label>
                                    <input type="text" id="okpo" class="form-control mb-1" name="okpo" value="{{ Auth::user()->requisites['okpo'] ?? '' }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="ogrn">ОГРН</label>
                                    <input type="text" id="ogrn" class="form-control mb-1" name="ogrn" value="{{ Auth::user()->requisites['ogrn'] ?? '' }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="phone">Телефон</label>
                                    <input type="text" id="phone" class="form-control mb-1" name="phone" value="{{ Auth::user()->requisites['phone'] ?? '' }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="self_kpp">Ваш КПП при наличии</label>
                                    <input type="text" id="self_kpp" class="form-control mb-1" name="self_kpp" value="{{ Auth::user()->requisites['self_kpp'] ?? '' }}">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 mt-3">
                                <div class="form-group border border-danger p-3">
                                    <label for="nds">НДС Ставка</label>
                                    <input type="text" id="nds" placeholder="0.5" class="form-control mb-1 mt-2" name="nds" value="{{ Auth::user()->requisites['nds'] ?? '' }}">
                                    <p class="text-danger mt-2 mb-0">Без знака процента (оставьте пустое, если налога нет. Нецелые числа проставляйте точкой)</p>
                                </div>
                            </div>


                            <div class="col-12">
                                <h4 class="mt-4">Банк</h4>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="bik">Бик банка</label>
                                    <input type="text" id="bik" class="form-control mb-1" name="bik" value="{{ Auth::user()->requisites['bik'] ?? '' }}">
                                    <a href="javascript:void(0);" onclick="loadBankData()">Подгрузить данные</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="kpp">КПП</label>
                                    <input type="text" id="kpp" class="form-control mb-1" name="kpp" value="{{ Auth::user()->requisites['kpp'] ?? '' }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="ras">Расчетный счет</label>
                                    <input type="text" id="ras" class="form-control mb-1" name="ras" value="{{ Auth::user()->requisites['ras'] ?? '' }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="kor">Кор. счет</label>
                                    <input type="text" id="kor" class="form-control mb-1" name="kor" value="{{ Auth::user()->requisites['kor'] ?? '' }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="bank_name">Наименование банка и город</label>
                                    <input type="text" id="bank_name" class="form-control mb-1" name="bank_name" value="{{ Auth::user()->requisites['bank_name'] ?? '' }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

<script>
    function loadData() {
        let inn = $('#inn').val();

        axios.get('/dealer/invoices/load-data/' + inn)
            .then(response => {
                let data = response.data;

                if (data.length > 0) {
                    console.log(data);
                    $('#okpo').val(data[0].data.okpo);
                    $('#soc_name').val(data[0].data.name.short_with_opf);
                    $('#name').val(data[0].data.name.full_with_opf);
                    $('#address').val(data[0].data.address.unrestricted_value);
                    $('#ogrn').val(data[0].data.ogrn);
                } else {
                    alert('Организация не найдена')
                }
            });
    }

    function loadBankData() {
        let bik = $('#bik').val();

        axios.get('/dealer/invoices/load-bank-data/' + bik)
            .then(response => {
                let data = response.data;

                if (data.length > 0) {
                    console.log(data);
                    $('#kpp').val(data[0].data.kpp);
                    $('#ras').val(data[0].data.ras);
                    $('#kor').val(data[0].data.kor);
                    $('#bank_name').val(data[0].data.name.short);
                } else {
                    alert('Организация не найдена')
                }
            });
    }
</script>
