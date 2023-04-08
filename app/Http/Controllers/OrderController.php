<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\OrderCreateRequest;
use App\Models\DeliveryMethod;
use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\OrderStatus;
use App\Services\Shop\CartService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected CartService $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderCreateRequest $request)
    {
        $cart = $this->cartService->getCart();

        Order::query()->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => '',
            'order_status_id' => OrderStatus::query()->where('primary', true)->first()->id,
            'delivery_method_id' => DeliveryMethod::first()->id,
            'basket' => $cart,
            'total' => $cart['total'],
            'country' => $request->input('country'),
            'address' => $request->input('address'),
        ]);

        return redirect()->route('checkout.success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
