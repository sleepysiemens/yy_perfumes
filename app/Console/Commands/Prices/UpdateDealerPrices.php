<?php

namespace App\Console\Commands\Prices;

use App\Models\Product;
use App\Services\Shop\ConfigService;
use Illuminate\Console\Command;

class UpdateDealerPrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dealer:update-prices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update products dealer prices.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $configService = new ConfigService();
        $config = $configService->getConfig();

        $products = Product::all();

        foreach ($products as $product) {
            $product->cost_dealer = $product->cost - ($product->cost / 100) * intval($config['dealer_prices_sale']);
            $product->save();
        }
    }
}
