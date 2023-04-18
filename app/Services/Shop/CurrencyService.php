<?php

namespace App\Services\Shop;

use App\Models\Currency;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class CurrencyService
{
    public function get()
    {
        if (Session::has('currency')) {
            // Если пользователь задал валюту
            $currency = $this->selectCurrency();
            return $this->selectFromDb($currency);
        } else {
            // Валюту подбираем автоматически исходя из локализации
            $currency = $this->selectCurrency();
            return $this->selectFromDb($currency);
        }
    }

    private function selectCurrency(): string
    {
        foreach(config('currencies') as $currency => $locale) {
            foreach ($locale as $lang) {
                if ($lang == App::getLocale()) {
                    return $currency;
                }
            }
        }

        return 'USD'; // Если локаль не найдена, то возвращаем доллары
    }

    private function selectFromDb($currency): array
    {
        $currency = Currency::query()->where('currency', $currency);

        if ($currency = $currency->first()) {
            return [
                'symbol' => $currency->symbol ?? $currency->currency,
                'rate' => $currency->rate
            ];
        }
    }
}
