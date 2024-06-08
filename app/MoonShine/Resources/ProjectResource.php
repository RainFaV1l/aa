<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\MoonShine\Pages\Project\ProjectIndexPage;
use App\MoonShine\Pages\Project\ProjectFormPage;
use App\MoonShine\Pages\Project\ProjectDetailPage;

use MoonShine\Resources\ModelResource;
use MoonShine\Pages\Page;

/**
 * @extends ModelResource<Project>
 */
class ProjectResource extends ModelResource
{
    protected string $model = Project::class;

    protected string $title = 'Проекты';

    /**
     * @return list<Page>
     */
    public function pages(): array
    {
        return [
            ProjectIndexPage::make($this->title()),
            ProjectFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            ProjectDetailPage::make(__('moonshine::ui.show')),
        ];
    }

    /**
     * @param Project $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            'name' => 'required|string|max:255',
            'link_to_project' => 'nullable|string|max:255',
            'link_to_site' => 'nullable|string|max:255',
            'description' => 'required|string',
            'preview_path' => 'nullable|image|max:5120',
            'price' => 'required|numeric',
            'visibility' => 'required|boolean',
            'completed_at' => 'nullable|date',
        ];
    }

    public function search(): array
    {
        return [
            'name',
            'description',
            'price',
        ];
    }
}
