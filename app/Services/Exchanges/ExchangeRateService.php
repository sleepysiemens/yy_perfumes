<?php

namespace App\Services\Exchanges;

use GuzzleHttp\Client;

class ExchangeRateService
{
    protected string $apiKey;

    protected Client $client;

    public function __construct(Client $client)
    {
        $this->apiKey = config('exchanges.api_key');
        $this->client = $client;
    }

    public function rate($currency)
    {
        $response = $this->client->get("https://v6.exchangerate-api.com/v6/{$this->apiKey}/pair/EUR/{$currency}");
        return json_decode($response->getBody(), true)['conversion_rate'];
    }
}
