<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\TechnologyResource;
use App\Models\Technology;

class TechnologyController extends Controller
{
    public function index()
    {
        // Получение технологий
        $technologies = Technology::all();
        // Возвращение ресурса с технологиями
        return TechnologyResource::collection($technologies);
    }

    public function show(Technology $technology)
    {
        // Возвращение ресурс с одной технологией
        return new TechnologyResource($technology);
    }
}
