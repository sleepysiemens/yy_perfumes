<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Shop\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show()
    {
        return view('cart.show', [
            'cart' => \Session::has('cart') ? \Session::get('cart') : []
        ]);
    }

    public function update(Request $request) {
        $cartService = new CartService();

        $data = $request->all();

        $cart = \Session::get('cart');
        $cart[intval($data['id'])] = intval($data['count']);
        \Session::put('cart', $cart);

        return response()->json($cartService->getCart());
    }
}
