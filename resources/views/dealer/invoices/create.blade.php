@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="row" action="{{ route('dealer.invoices.store') }}" method="post">
            @csrf
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Customer') }}
                    </div>
                    <input type="text" value="{{ $_GET['order_id'] ?? '' }}" name="order_id" hidden="hidden">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="inn">ИНН</label>
                                    <input type="text" id="inn" class="form-control mb-1" name="inn">
                                    <a href="javascript:void(0);" onclick="loadData()">Подгрузить данные</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="soc_name">Сокращенное наименование</label>
                                    <input type="text" id="soc_name" class="form-control mb-1" name="soc_name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="name">Полное наименование</label>
                                    <input type="text" id="name" class="form-control mb-1" name="name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="address">Адрес</label>
                                    <input type="text" id="address" class="form-control mb-1" name="address">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="okpo">ОКПО</label>
                                    <input type="text" id="okpo" class="form-control mb-1" name="okpo">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="ogrn">ОГРН</label>
                                    <input type="text" id="ogrn" class="form-control mb-1" name="ogrn">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="phone">Телефон</label>
                                    <input type="text" id="phone" class="form-control mb-1" name="phone">
                                </div>
                            </div>


                            <div class="col-12">
                                <h4 class="mt-4">Банк</h4>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="bik">Бик банка</label>
                                    <input type="text" id="bik" class="form-control mb-1" name="bik">
                                    <a href="javascript:void(0);" onclick="loadBankData()">Подгрузить данные</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="kpp">КПП</label>
                                    <input type="text" id="kpp" class="form-control mb-1" name="kpp">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="ras">Расчетный счет</label>
                                    <input type="text" id="ras" class="form-control mb-1" name="ras">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="kor">Кор. счет</label>
                                    <input type="text" id="kor" class="form-control mb-1" name="kor">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="bank_name">Наименование банка и город</label>
                                    <input type="text" id="bank_name" class="form-control mb-1" name="bank_name">
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary mt-3">Выставить счет</button>
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
