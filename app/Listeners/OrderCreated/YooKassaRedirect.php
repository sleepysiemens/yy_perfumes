<?php

namespace App\Listeners\OrderCreated;

use App\Events\OrderCreated;
use App\Exceptions\MailException;
use App\Mail\Order\Created;
use App\Models\Order;
use App\Models\Product;
use App\Services\Merchants\YookassaService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class YooKassaRedirect
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event): bool
    {
//        try {
//            foreach ($event->order->shop->users()->get() as $user) {
//                Mail::to($user->email)->send(new Created($event->order));
//            }
//        } catch (MailException $exception) {
//
//        }

        $yookassaService = new YookassaService();

        $client = $yookassaService->getClient();
        $idempotenceKey = uniqid($event->order->id, true);


        // Items
        $items = [];
        foreach ($event->order->basket['cart'] as $item => $count) {
            if ($item == 'undefined')
                continue;

            $item = Product::where('id', $item);

            if ($item = $item->first()) {
                $items[] = [
                    'description' => $item->getTitle(),
                    'quantity' => $count,
                    'amount' => [
                        'value' => $item->getPrice(),
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
                'value' => round($event->order->total),
                'currency' => $event->order->getCurrencyString(),
            ],
            'confirmation' => [
                'type' => 'redirect',
                'locale' => 'ru_RU',
                'return_url' => config('app.url') . "/payment/error/" . $event->order->hash,
            ],
            'capture' => false,
            'description' => "Заказ №{$event->order->id}",
            'metadata' => [
                'orderNumber' => $event->order->id,
            ],
            'receipt' => [
                'customer' => [
                    'full_name' => $event->order->name,
                    'email' => $event->order->email,
                    'phone' => $event->order->phone,
                ],
                'items' => $items,
            ],
            $idempotenceKey
        ]);
        // END

        $order = Order::find($event->order->id);
        $order->payment_link = $response->getConfirmation()->getConfirmationUrl();
        $order->ykassa_id = $response->getId();
        $order->save();

        return true;
    }
}
