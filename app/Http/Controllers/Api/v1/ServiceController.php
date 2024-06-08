<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\ServiceResource;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        // Получение продуктов
        $services = Service::all();
        // Возвращение ресурса с проектами
        return ServiceResource::collection($services);
    }
}
