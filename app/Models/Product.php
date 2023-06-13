<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Helpers\Traits\Product as ProductTrait;
use Illuminate\Support\Facades\Auth;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $slug
 * @property int $category_id
 * @property int|null $people_id
 * @property string $img
 * @property array $title
 * @property array|null $short_description
 * @property array|null $description
 * @property float $cost Цена клиентов
 * @property float $cost_dealer Цена дилеров
 * @property float $cost_vip_dealer Цена премиальных дилеров
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property bool $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCostDealer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCostVipDealer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePeopleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
        'fix_prices' => 'array',
    ];

    protected $guarded = [];

    public function getPrice(): float|int
    {
        return $this->getProductPrice();
    }
}
