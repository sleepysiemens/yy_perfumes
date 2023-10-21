<?php

namespace App\Listeners\OrderCreated;

use App\Events\OrderCreated;
use App\Exceptions\MailException;
use App\Mail\Order\Created;
use App\Models\Order;
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
        foreach ($event->order->basket['cart'] as $item) {
            $items[] = [

            ];
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
                'items' => [
                    [
                        'description' => 'Товары',
                        'quantity' => '1.00',
                        'amount' => [
                            'value' => round($event->order->total),
                            'currency' => 'RUB'
                        ],
                        'vat_code' => '2',
                        'payment_mode' => 'full_payment',
                        'payment_subject' => 'commodity',
                        'country_of_origin_code' => 'CN',
                        'product_code' => '44D',
                        'customs_declaration_number' => '10714040/140917/0090376',
//                        'excise' => '20.00',
                        'supplier' => [
                            'name' => 'Сергей',
                            'phone' => '+79956112267',
                            'inn' => '052401862060'
                        ]
                    ],
                ]
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
