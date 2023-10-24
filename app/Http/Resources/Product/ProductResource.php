<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'img' => $this->getImage(),
            'title' => $this->getTitle(),
            'price' => $this->getPrice(),
            'formatted_price' => $this->getFormatedPrice(),
            'count' => 1,
            'guest_price' => $this->guestPrice(),
        ];
    }
}
