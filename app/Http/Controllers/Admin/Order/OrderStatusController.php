<?php

namespace App\Http\Controllers\Admin\Order;

use App\Models\OrderStatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.statuses.index', [
            'statuses' => OrderStatus::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->post('default') !== null) {
            // Если выбрали статус по умолчанию, то убираем бывший по умолчанию
            $default = OrderStatus::query()->where('primary', true)->first();

            if ($default) {
                $default->primary = false;
                $default->save();
            }
        }

        OrderStatus::query()->create([
            'title' => $request->post('title'),
            'comment' => $request->post('comment'),
            'primary' => $request->post('default') !== null,
        ]);

        return redirect()->route('statuses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderStatus $orderStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderStatus $orderStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderStatus $orderStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderStatus $orderStatus)
    {
        //
    }
}
