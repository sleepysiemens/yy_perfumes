<?php

namespace App\Services\Shop;

use App\Models\Product;
use App\Services\Product\ProductService;
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
        Session::push('cart', $product);
        return Session::get('cart');
    }

    public function getCart()
    {
        return Session::get('cart');
//        $cart = Session::has('cart') ? Session::get('cart') : [];
//        $total = 0;
//        $cartQuantity = 0;
//
//        foreach ($cart as $item => $quantity) {
//            $product = Product::query()->find($item);
//
//            if ($product) {
//                $total += $product->getPrice();
//                $cartQuantity += $quantity;
//            }
//        }
//
//        return [
//            'cart' => Session::get('cart'),
//            'total' => $total,
//            'quantity' => $cartQuantity,
//            'currency' => (new CurrencyService())->get()['symbol'],
//        ];
    }
}
