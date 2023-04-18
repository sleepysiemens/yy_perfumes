<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show()
    {
        return view('cart.show', [
            'cart' => \Session::has('cart') ? \Session::get('cart') : []
        ]);
    }
}
