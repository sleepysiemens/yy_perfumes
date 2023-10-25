<?php

namespace App\Services\Shop;

class ConfigService
{
    public function getConfig()
    {
        return json_decode(file_get_contents(public_path('config.json')), true);
    }
}
