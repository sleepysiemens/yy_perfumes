<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Helpers\Traits\Product as ProductTrait;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    /**
     * @method getTitle()
     * @method getDescription()
     */
    use HasFactory, ProductTrait;

    protected $casts = [
        'title' => 'array',
        'short_description' => 'array',
        'description' => 'array',
        'cost' => 'float',
        'cost_dealer' => 'float',
        'cost_vip_dealer' => 'float',
    ];

    protected $guarded = [];

    public function getPrice(): float|int
    {
        return $this->getProductPrice();
    }
}
