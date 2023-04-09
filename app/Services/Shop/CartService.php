<?php

namespace App\Services\Shop;

use App\Models\Product;
use App\Services\Product\ProductService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class CartService
{
    public array $cart;
    public float $total;
    public int $quantity;

    public function __construct()
    {
        $this->total = 0;
        $this->quantity = 0;
    }

    public function push($product, $count)
    {
        $cart = Session::has('cart') ? Session::get('cart') : [];
        $cart[$product] = $count;
        Session::put('cart', $cart);
        return Session::get('cart');
    }

    public function getCart()
    {
        $cart = Session::has('cart') ? Session::get('cart') : [];
        $total = 0;
        $cartQuantity = 0;

        foreach ($cart as $item => $quantity) {
            $product = $item != 'undefined' && isset($item) ? \App\Models\Product::find($item) : null;

            if ($product) {
                $total += $product->getPrice() * $quantity;
                $cartQuantity += $quantity;
            }
        }

        return [
            'cart' => Session::get('cart'),
            'total' => $total,
            'quantity' => $cartQuantity,
            'currency' => (new CurrencyService())->get()['symbol'],
        ];
    }

    public function checkExists($id): bool
    {
        $cart = Session::has('cart') ? Session::get('cart') : [];
        return \Arr::exists($cart, $id);
    }

    public function remove($id)
    {
        $cart = Session::has('cart') ? Session::get('cart') : [];
        Arr::forget($cart, $id);
        Session::put('cart', $cart);
    }
}
