<?php

namespace App\Http\Controllers\Admin\Config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DealerSaleController extends Controller
{
    public function updatePrices(Request $request)
    {
        $data = $request->all();

        $alreadyConfig = json_decode(file_get_contents('config.json'), true) ?? [];
        $alreadyConfig[$data['name']] = $data['percent'];
        file_put_contents('config.json', json_encode($alreadyConfig, JSON_UNESCAPED_UNICODE));

        return redirect()->back();
    }
}
