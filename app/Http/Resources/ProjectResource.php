<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'preview_path' => new ProjectImagesResource($this->preview_path),
            'price' => $this->price,
            'category' => new ProjectCategoryResource($this->category),
            'service' => new ServiceResource($this->service),
            'visibility' => $this->visibility,
            'completed_at' => $this->completed_at,
            'images' => ProjectImagesResource::collection($this->images),
        ];
    }
}
