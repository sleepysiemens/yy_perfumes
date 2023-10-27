<?php

namespace App\Http\Controllers\Dealer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\Notifications\SmsService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = \Auth::user()->shop->orders;
        return view('dealer.orders.index', compact('orders'));
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
    public function store(Request $request)
    {
        dd($request->input());
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
        return view('dealer.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $order->update([
            'order_status_id' => $request->input('status')
        ]);

        $status = config('crm.order_statuses')[$request->input('status')];

        if (isset($status['send_msg']) && $status['send_msg']) {
            $smsService = new SmsService();
            $smsService->sendMessage($order->phone, str_replace('%track_url%', '', $status['msg']));
        }

        return redirect()->back()->with('success', 'Заказ обновлен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
