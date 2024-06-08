<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\TechnologyResource;
use App\Models\Technology;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::all();

        return TechnologyResource::collection($technologies);
    }

    public function show(Technology $technology)
    {
        return new TechnologyResource($technology);
    }
}
