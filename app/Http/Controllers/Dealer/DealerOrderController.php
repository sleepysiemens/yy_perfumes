<?php

namespace App\Http\Controllers\Dealer;

use App\Http\Controllers\Controller;
use App\Models\DealerOrder;
use App\Models\Order;
use App\Models\Product;
use App\Services\Merchants\YookassaService;
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

    public function payWithKassa($orderId)
    {
        $yookassaService = new YookassaService();

        $order = DealerOrder::query()->find($orderId);

        $client = $yookassaService->getClient();
        $idempotenceKey = uniqid($order->id, true);


        // Items
        $items = [];
        foreach ($order->cart as $product) {
            if ($product == 'undefined')
                continue;

            $item = Product::where('id', $product['id']);

            if ($item = $item->first()) {
                $items[] = [
                    'description' => $product['title'],
                    'quantity' => $product['count'],
                    'amount' => [
                        'value' => $product['price'],
                        'currency' => 'RUB'
                    ],
                    'mark_code_info' => [
                        'gs_10' => $item->gtin // GTIN
                    ],
                    'vat_code' => '1',
                    'measure' => 'piece',
                    'payment_mode' => 'full_prepayment',
                    'payment_subject' => 'commodity',
                    'country_of_origin_code' => 'RU',
                    'mark_mode' => 0,
//                    'mark_quantity' => 1,
//                        'excise' => '20.00',
                ];
            }
        }

        // START
        $response = $client->createPayment([
            'amount' => [
                'value' => round($order->total),
                'currency' => 'RUB',
            ],
            'confirmation' => [
                'type' => 'redirect',
                'locale' => 'ru_RU',
                'return_url' => config('app.url') . "/dealer/dealer-orders",
            ],
            'capture' => false,
            'description' => "Заказ дилером №{$order->id}",
            'metadata' => [
                'orderNumber' => $order->id,
                'type' => 'dealer',
            ],
            'receipt' => [
                'customer' => [
                    'full_name' => \Auth::user()->name,
                    'email' => \Auth::user()->email,
                    'phone' => \Auth::user()->phone,
                ],
                'items' => $items,
            ],
            $idempotenceKey
        ]);
        // END

        $order->payment_link = $response->getConfirmation()->getConfirmationUrl();
        $order->ykassa_id = $response->getId();
        $order->save();
        
        return redirect($response->getConfirmation()->getConfirmationUrl());

//        $order = Order::find($event->order->id);
//        $order->payment_link = $response->getConfirmation()->getConfirmationUrl();
//        $order->ykassa_id = $response->getId();
//        $order->save();
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
