<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() : \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        // Получение продуктов
        $projects = Project::all();
        // Возвращение ресурса с проектами
        return ProjectResource::collection($projects);
    }
}
