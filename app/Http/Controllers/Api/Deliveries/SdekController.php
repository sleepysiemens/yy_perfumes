<?php

namespace App\Http\Controllers\Api\Deliveries;

use App\Http\Controllers\Controller;
use App\Services\Deliveries\SdekService;
use Illuminate\Http\Request;

class SdekController extends Controller
{
    protected SdekService $sdekService;

    public function __construct(SdekService $sdekService)
    {
        $this->sdekService = $sdekService;
    }

    public function getCities()
    {
        return response()->json($this->sdekService->getCities(), options: JSON_UNESCAPED_UNICODE);
    }

    public function getVillages($id)
    {
        return response()->json($this->sdekService->getVillages($id), options: JSON_UNESCAPED_UNICODE);
    }

    public function getPoints($id)
    {
        return response()->json($this->sdekService->getPoints($id), options: JSON_UNESCAPED_UNICODE);
    }
}
