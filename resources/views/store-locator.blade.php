@extends('layouts.main')

@section('title')
    {{ __('Store locator') }}
@endsection

@section('content')
    <h1 class="text-2xl text-center font-bold mt-4">{{ __('Store locator') }}</h1>
    <div class="text-md font-medium my-8 text-center">YANINA YAKUSHEVA <br> PERFUMES</div>

    <div class="text-md text-center">FRANCE</div>
    <div class="text-lg my-1 font-bold text-center">SENS UNIQUE</div>
    <div class="text-sm text-center">13 Rue du Roi de Sicile, 75004 Paris <br> Tel : 01 71 50 30 09</div>

    <hr class="my-5">

    <div class="text-md text-center mt-8">HUNGARY</div>
    <div class="text-lg my-1 font-bold text-center">NICHE GALLERY</div>
    <div class="text-sm text-center">Szentmihályi út 171. Fsz. G32. 1152 Budapest <br> Tel : +36-30-333-0171</div>

    <hr class="my-5">

    <div class="text-md text-center mt-8">CHERRY GARDEN</div>
    <div class="text-lg my-1 font-bold text-center">Nagymező u. 47. 1065 Budapest</div>
    <div class="text-sm text-center">Tel : +36 30 533 6789</div>

    <hr class="my-5">

    <div class="text-md text-center mt-8">SPAIN</div>
    <div class="text-lg my-1 font-bold text-center">Ecuación Natural</div>
    <div class="text-center">
        <a href="" class="text-sm text-center">info@ecuacionnatural.com </a>
    </div>
    <div class="text-sm my-1 font-bold text-center">(+34) 692 01 96 94</div>
    <div class="text-sm my-1 font-bold text-center">(+34) 692 35 14 89</div>

    <hr class="my-5">

    <div class="text-lg text-center mt-8 font-bold">RUSSIA</div>

    <div class="text-md text-center mt-8">AROMATEKA</div>
    <div class="text-lg my-1 font-bold text-center">Moscow / New square, 8, building 2</div>

    <div class="text-md text-center mt-8">ART TEMA</div>
    <div class="text-lg my-1 font-bold text-center mb-5">Krasnodar / Turgeneva 138/6</div>
@endsection
