@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dealer.prices') }}" method="post">
                        @csrf
                        <label for="">Процент скидки для цены дилера от основной цены (без знака процента)</label>

                        <div class="row">
                            <div class="col-lg-2 col-md-12">
                                <div class="form-password-toggle mt-2" style="width:100%;">
                                    <div class="input-group">
                                        <input type="text" name="name" value="dealer_prices_sale" hidden="">
                                        <input type="text" name="percent" class="form-control" id="basic-default-password12" placeholder="Введите процент"  aria-describedby="basic-default-password" />
                                        <span class="input-group-text" id="basic-addon11">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <p class="text-muted mt-2">Цена будет обновляться раз в час.</p>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
