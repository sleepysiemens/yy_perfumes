<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserRegister
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public mixed $user;
    public string $password;

    /**
     * Create a new event instance.
     */
    public function __construct(mixed $user, string $password = '')
    {
        $this->user = $user;
        $this->password = $password;
    }
}
