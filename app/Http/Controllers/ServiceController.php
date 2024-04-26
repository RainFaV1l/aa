<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServiceResource;
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
