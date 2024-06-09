<?php

namespace App\Http\Resources\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

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
            'link_to_project' => $this->link_to_project,
            'link_to_site' => $this->link_to_site,
            'description' => $this->description,
            'preview_path' => asset(Storage::url($this->preview_path)),
            'price' => $this->price,
            'category' => new ProjectCategoryResource($this->category),
            'service' => new ServiceResource($this->service),
            'visibility' => $this->visibility,
            'completed_at' => $this->completed_at,
            'images' => ProjectImagesResource::collection($this->images),
            'technologies' => TechnologyResource::collection($this->technologies)
        ];
    }
}
