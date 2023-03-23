<?php

namespace App\Repositories\Product;

use App\Models\Product;

class ProductRepository
{
    public function getActiveProducts(): \Illuminate\Database\Eloquent\Collection
    {
        return Product::query()->where('active', true)->get();
    }
}
