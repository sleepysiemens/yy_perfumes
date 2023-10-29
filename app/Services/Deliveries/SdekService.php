<?php

namespace App\Services\Deliveries;

use GuzzleHttp\Client;

class SdekService
{
    public string $endPoint;

    protected string $token;

    protected Client $client;

    protected string $clientId = 'EMscd6r9JnFiQ3bLoyjJY6eM78JrJceI';
    protected string $clientSecret = 'PjLZkKBHEiLK3YsjtNrt3TGNG0ahs3kG';

    public function __construct()
    {
        $this->endPoint = 'https://api.edu.cdek.ru/v2/';

        $this->client = new Client();

        $this->token = $this->getToken();

        $this->client = new Client([
            'headers' => [
                'Authorization' => "Bearer {$this->token}",
            ]
        ]);
    }

    public function getToken()
    {
        $response = $this->client->post("{$this->endPoint}oauth/token?client_id={$this->clientId}&client_secret={$this->clientSecret}&grant_type=client_credentials")->getBody();
        $response = json_decode($response, true);
        return $response['access_token'];
    }

    public function getCountries()
    {
        $response = $this->client->get("{$this->endPoint}location/regions?country_codes=ru")->getBody();
        return json_decode($response, true);
    }

    public function getCities()
    {
        $response = $this->client->get("{$this->endPoint}location/regions?country_codes=ru")->getBody();
        return json_decode($response, true);
    }

    public function getVillages($regionCode)
    {
        $response = $this->client->get("{$this->endPoint}location/cities?region_code=$regionCode")->getBody();
        return json_decode($response, true);
    }

    public function getPoints($villageCode)
    {
        $response = $this->client->get("{$this->endPoint}deliverypoints?city_code=$villageCode&is_handout=1")->getBody();
        return json_decode($response, true);
    }
}
