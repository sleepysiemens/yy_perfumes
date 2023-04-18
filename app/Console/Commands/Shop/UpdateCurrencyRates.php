<?php

namespace App\Console\Commands\Shop;

use App\Models\Currency;
use App\Services\Exchanges\ExchangeRateService;
use Illuminate\Console\Command;

class UpdateCurrencyRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:rates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(ExchangeRateService $exchange): void
    {
        $currencies = Currency::query()->where('update', '=',true)->get();

        foreach ($currencies as $currency) {
            $rate = $exchange->rate($currency->currency);
            $currency->rate = $rate + (($rate * $currency->price_up) / 100);
            $currency->save();
        }
    }
}
