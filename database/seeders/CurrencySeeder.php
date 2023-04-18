<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Currency::query()->insert([
            [
                'currency' => 'USD',
                'rate' => 1.00,
                'symbol' => '$',
                'price_up' => 0,
            ],
            [
                'currency' => 'RUB',
                'rate' => 1.00,
                'symbol' => '₽',
                'price_up' => 20,
            ],
            [
                'currency' => 'EUR',
                'rate' => 1.00,
                'symbol' => '€',
                'price_up' => 0,
            ],
        ]);
    }
}
