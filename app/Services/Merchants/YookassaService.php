<?php

namespace App\Services\Merchants;

use YooKassa\Client;

class YookassaService
{
    protected string $token;

    public function __construct()
    {
        $this->token = config('yookassa.api-key');
    }

    public function getClient(): Client
    {
        $client = new Client();
        $client->setAuth(268739, $this->token);

        return $client;
    }
}
