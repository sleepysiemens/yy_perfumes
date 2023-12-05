@extends('layouts.admin')

@section('content')
    <div class="row">
        @if (\Illuminate\Support\Facades\Session::has('success'))
            <div class="col-12">
                <div class="alert alert-info">
                    {{ \Illuminate\Support\Facades\Session::get('success') }}
                </div>
            </div>
        @endif
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4>Редактирование товара</h4>
                    <a href="{{ route('products.index') }}">Назад к списку</a>

                    <form action="{{ route('products.update', $product) }}" method="post">
                        @csrf
                        @method('PUT')
                        <h6 class="mb-2 mt-3">Информация</h6>

                        <div class="form-group mb-3">
                            <label for="">Категория товара</label>
                            <select name="category_id" class="form-control select2" id="">
                                @foreach(\App\Models\Category::all() as $category)
                                    <option value="{{ $category->id }}" @if ($product->category_id == $category->id) selected @endif>{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="from-group mb-3">
                            <label for="">
                                <img src="{{ \App\Services\Content\FlagService::get('en') }}" width="17px" alt="">
                                Название товара
                            </label>
                            <input type="text" class="form-control" name="en_title" value="{{ $product->title['en'] ?? '' }}">
                        </div>
                        <div class="from-group mb-3">
                            <label for="">Описание</label>
                            <textarea name="en_description" class="form-control" id="" cols="30" rows="5">{{ $product->description['en'] ?? '' }}</textarea>
                        </div>

                        <!--WEIGHT-->
                        <div class="from-group mb-3">
                            <label for="">Вес, г.</label>
                            <input type="number" class="form-control" name="weight" value="{{ $product->weight}}">
                        </div>
                        <!--/WEIGHT-->

                        <div class="from-group mb-3">
                            <label for="">
                                <img src="{{ \App\Services\Content\FlagService::get('ru') }}" width="17 px" alt="">
                                Название товара
                            </label>
                            <input type="text" class="form-control" name="ru_title" value="{{ $product->title['ru'] ?? '' }}">
                        </div>
                        <div class="from-group mb-3">
                            <label for="">Описание</label>
                            <textarea name="ru_description" class="form-control" id="" cols="30" rows="5">{{ $product->description['ru'] ?? '' }}</textarea>
                        </div>

                        <div class="from-group mb-3">
                            <label for="">Цена EUR</label>
                            <input type="text" class="form-control" name="cost" value="{{ $product->cost }}">
                        </div>

                        <div class="from-group mb-3">
                            <label for="">Цена дилера EUR</label>
                            <input type="text" class="form-control" name="cost_dealer" value="{{ $product->cost_dealer }}">
                        </div>

                        <div class="from-group mb-3">
                            <label for="">Цена прем. дилера EUR</label>
                            <input type="text" class="form-control" name="cost_vip_dealer" value="{{ $product->cost_vip_dealer }}">
                        </div>
<!--
                        <div class="from-group mb-3">
                            <label for="">Фиксированные цены</label>
                            <textarea name="fix_prices" class="form-control" id="" cols="30" rows="10">{{ json_encode($product->fix_prices) }}</textarea>
                            <p class="text-muted">
                                Пример записи: <br> <br>
                                {
                                    "Код валюты": цена, <br>
                                    "USD": 150, <br>
                                    "RUB": 14500, <br>
                                }
                            </p>
                        </div>
-->
                        <!--=======================================FIX PRICES =======================================-->
                        <h6 class="mb-2 mt-3 mb-3">Фиксированные цены</h6>

                        <div class="from-group mb-3">
                            <label for="">Цена RUB</label>
                            <input type="number" class="form-control" name="fix_prices_rub" value="{{ $product->fix_prices['RUB'] ?? '' }}">
                        </div>

                        <div class="from-group mb-3">
                            <label for="">Цена USD</label>
                            <input type="number" class="form-control" name="fix_prices_usd" value="{{ $product->fix_prices['USD'] ?? '' }}">
                        </div>

                        <div class="from-group mb-3">
                            <label for="">Цена KAZ</label>
                            <input type="number" class="form-control" name="fix_prices_kaz" value="{{ $product->fix_prices['KAZ'] ?? '' }}">
                        </div>

                        <!--=======================================/FIX =======================================-->

                        <hr>
                        <h6 class="mb-2 mt-3 mb-3">Сео</h6>

                        <div class="from-group mb-3">
                            <label for="">СЕО Название товара</label>
                            <input type="text" class="form-control" name="seo_title" value="{{ $product->seo_title }}">
                        </div>
                        <div class="from-group">
                            <label for="">СЕО Описание</label>
                            <textarea name="seo_description" class="form-control" id="" cols="30" rows="5">{{ $product->seo_description }}</textarea>
                        </div>

                        <hr>
                        <h6 class="mb-2 mt-3">Техническая</h6>

                        <!--Vendor code-->
                        <div class="from-group mb-3">
                            <label for="">Артикул</label>
                            <input type="text" class="form-control" name="vendor_code" value="{{ $product->vendor_code}}">
                        </div>
                        <!--/Vendor code-->

                        <!--Barcode-->
                        <div class="from-group mb-3">
                            <label for="">Штрихкод</label>
                            <input type="text" class="form-control" name="barcode" value="{{ $product->barcode}}">
                        </div>
                        <!--/Barcode-->

                        <div class="from-group">
                            <label for="">Отображение в адресе</label>
                            <input type="text" class="form-control mb-2" name="slug" value="{{ $product->slug }}">
                            <span class="text-muted fs-6">Лучше оставить пустым, но можно указать, как будет отображаться в адресе.
                        Поле уникальное! Например: <b>duhy_luchshego_kachestva</b></span>
                        </div>


                        <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.dropify').dropify();
    </script>
@endsection
