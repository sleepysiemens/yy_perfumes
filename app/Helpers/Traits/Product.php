<?php

namespace App\Helpers\Traits;

use App\Services\Shop\CurrencyService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\fileExists;

trait Product
{
    public function getTitle(): string
    {
        return !empty($this->title[App::getLocale()])
            ? $this->title[App::getLocale()] // Если есть перевод на текущий язык, то выводим его
            : $this->title['en']; // Если нет, то выводим английское название
    }

    public function getDescription(): string
    {
        return !empty($this->description[App::getLocale()])
            ? $this->description[App::getLocale()] // Если есть перевод на текущий язык, то выводим его
            : $this->description['en']; // Если нет, то выводим английское название
    }

    public function getCurrencySymbol()
    {
        $currency = (new CurrencyService())->get();
        return $currency['symbol'];
    }

    public function getProductPrice(): float|int
    {
        if (Auth::check())
            $userType = Auth::user()->type;
        else
            $userType = 'client';

        $priceType = config('types.prices')[$userType];
        $currency = (new CurrencyService())->get();

        return $this->$priceType * floatval($currency['rate']);
    }

    public function getImage()
    {
        if (file_exists('/storage/products/' . $this->img))
            return '/storage/products/' . $this->img;
        else
            return '/images/' . $this->img;
    }

    public function getFormatedPrice()
    {
        $price = number_format($this->getPrice(), 2, ',', ' ');
        return "{$this->getCurrencySymbol()} $price";
    }
}
