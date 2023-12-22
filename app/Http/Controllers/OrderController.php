<?php

namespace App\Http\Controllers;

use App\Events\OrderCreated;
use App\Http\Requests\Order\OrderCreateRequest;
use App\Models\DeliveryMethod;
use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\OrderStatus;
use App\Models\Shop;
use App\Services\Notifications\SmsService;
use App\Services\Shop\CartService;
use App\Services\User\UserService;
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
        $shopId = $request->input('shop') ?? 1;

        //dd($request->all());

        $cart = $this->cartService->getCart();
        $shop =  Shop::query()->find($shopId);

        $order = Order::query()->create([
            'hash' => \Str::random(46),
            'name' => $request->input('name'),
            'email' => UserService::userIsRegistered($request->input('email'), $request->all())->email,
            'phone' => $request->input('phone'),
            'shop_id' => $shop->id,
            'order_status_id' => OrderStatus::first()->id,
            'delivery_method_id' => DeliveryMethod::first()->id,
            'user_id' => UserService::userIsRegistered($request->input('email'), $request->all())->id,
            'basket' => $cart,
            'total' => $cart['total'],
            'country' => $shop->country,
            'address' => $request->input('address') ?? $shop->address,
        ]);

        $smsService = new SmsService();

        if ($order->phone != '') {
            $smsService->sendMessage($order->phone, "Ваш заказ №{$order->id} на сайте принят.");
        }

        $cart = $this->cartService->clear();


        event(new OrderCreated($order));

        return redirect()->route('checkout.success', $order->hash);

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
