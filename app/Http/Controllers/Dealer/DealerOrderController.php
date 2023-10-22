<?php

namespace App\Http\Controllers\Dealer;

use App\Http\Controllers\Controller;
use App\Models\DealerOrder;
use Illuminate\Http\Request;

class DealerOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dealer.dealer-orders.index', [
            'orders' => DealerOrder::query()->where('user_id', \Auth::id())->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dealer.dealer-orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $dealerOrder = DealerOrder::query()->create([
            'user_id' => \Auth::id(),
            'shop_id' => \Auth::user()->shop->id,
            'cart' => $data['cart'],
            'total' => $data['total'],
            'profit' => $data['profit'],
        ]);

        return response()->json($dealerOrder);
    }

    /**
     * Display the specified resource.
     */
    public function show(DealerOrder $dealerOrder)
    {
        return view('dealer.dealer-orders.show', compact('dealerOrder'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
