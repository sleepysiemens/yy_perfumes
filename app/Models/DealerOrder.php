<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealerOrder extends Model
{
    use HasFactory;

    protected $casts = [
        'cart' => 'array'
    ];

    protected $guarded = [];

//    public function createdAt(): Attribute
//    {
//        return Attribute::make(
//            fn ($value) => Carbon::parse($value)->format('m.d.Y H:i')
//        );
//    }
}
