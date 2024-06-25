<?php

namespace App\Http\Controllers;

use App\Http\Resources\Api\v1\ProjectCategoryResource;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Получение категорий
        $categories = ProjectCategory::all();

        // Возвращаем ресурс с категориями
        return ProjectCategoryResource::collection($categories);
    }
}
