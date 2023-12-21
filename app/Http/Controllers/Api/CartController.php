<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Shop\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected CartService $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function push($item, $count, Request $request)
    {
        $this->cartService->push($item, $count);
        return json_encode($this->cartService->getCart(), JSON_UNESCAPED_UNICODE);
    }

    public function get()
    {
        return json_encode($this->cartService->getCart(), JSON_UNESCAPED_UNICODE);
    }

    public function checkExists($id)
    {
        return $this->cartService->checkExists($id);
    }

    public function remove($id)
    {
        $this->cartService->remove($id);
        return redirect(request()->server('HTTP_REFERER'));
    }
}
