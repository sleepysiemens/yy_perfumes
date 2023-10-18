<?php

namespace App\Http\Controllers\Api\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class MerchantCallbackController extends Controller
{
    public function statusUpdate(Request $request)
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $order = Order::where('ykassa_id', $data['id'])->firstOrFail();

        if ($data['paid']) {
            // Если заказ оплачен и ожидает подтверждения
            $order->payed = true;
        }

        // Создаем лог входящего уведомления о платеже
        $payment = new Payment();
        $payment->order_id = $order->id;
        $payment->info = $data;
        $payment->save();

        $order->save();
    }
}
