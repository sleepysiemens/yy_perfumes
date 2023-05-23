@extends('layouts.land')

@section('content')
    <h1 class="text-center text-3xl py-8 font-bold">{{ __('Contact') }}</h1>

    <div class="w-3/4 mx-auto flex justify-between">
        <div class="w-1/2">
            <p>Ovcha Kupel district, Bl. 408A, office. 33,
                South-West, Sofia city, Bulgaria</p>

            <p class="mt-3">
                Tel. <a href="tel:+359879891667">+359879891667</a>
                <br>
                <a href="tel:+79054070065">+79054070065</a>
            </p>

            <div class="mt-3"><a href="mailto:y2a1@yandex.ru">y2a1@yandex.ru</a></div>

            <div class="mt-3">
                Working time: 9.00 - 21.00
            </div>

            <div class="mt-4 text-lg font-semibold">Please complete the short form below.</div>

            <form action="" class="w-2/3 mt-3">
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">Your Name *</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600 " name="email" value="" required="" autocomplete="email" autofocus="">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">Email *</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-medium outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600 " name="email" value="" required="" autocomplete="email" autofocus="">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">Message</label>
                    <div class="col-md-6">
                        <textarea name="" id="" cols="30" rows="3" class="w-full bg-zinc-100 mt-1 py-2 pl-3 font-regular outline-none border-2 border-zinc-0 duration-200 focus:border-zinc-600 "></textarea>
                    </div>
                </div>

                <button type="submit" class="whitespace-nowrap p-2 px-5 bg-zinc-900 hover:bg-zinc-700 active:scale-95 text-white duration-200 flex items-center mb-3 text-lg">
                    Send
                </button>
            </form>
        </div>
        <div class="w-1/2 text-right">
            <img src="{{ asset('images/contact.jpeg') }}" alt="">
        </div>
    </div>

    <style>
        b span {
            margin-top: 30px;
        }
    </style>
@endsection
