<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\ProjectResource;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() : \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        // Получение продуктов
        $projects = Project::query()->where('visibility', true)->get();
        // Возвращение ресурса с проектами
        return ProjectResource::collection($projects);
    }

    public function show(Project $project) : ProjectResource
    {
        // Возвращение ресурса с проектами
        return new ProjectResource($project);
    }
}
