<?php

namespace App\Services\Product;

use Illuminate\Support\Facades\App;

class ProductService
{
    public static function getTitle(array $product): string
    {
        return $product['title'][App::getLocale()] != ''
            ? $product['title'][App::getLocale()] // Если есть перевод на текущий язык, то выводим его
            : $product['title']['en']; // Если нет, то выводим английское название
    }

    public static function getDescription(array $product): string
    {
        return $product['description'][App::getLocale()] != ''
            ? $product['description'][App::getLocale()] // Если есть перевод на текущий язык, то выводим его
            : $product['description']['en']; // Если нет, то выводим английское название
    }
}
