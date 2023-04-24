<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Exceptions\MailException;
use App\Mail\Order\Created;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendOrderMail
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
    public function handle(OrderCreated $event): void
    {
        try {
            foreach ($event->order->shop->users()->get() as $user) {
                Mail::to($user->email)->send(new Created($event->order));
            }
        } catch (MailException $exception) {

        }
    }
}
