<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectCategory;
use App\MoonShine\Pages\ProjectCategory\ProjectCategoryIndexPage;
use App\MoonShine\Pages\ProjectCategory\ProjectCategoryFormPage;
use App\MoonShine\Pages\ProjectCategory\ProjectCategoryDetailPage;

use MoonShine\Resources\ModelResource;
use MoonShine\Pages\Page;

/**
 * @extends ModelResource<ProjectCategory>
 */
class ProjectCategoryResource extends ModelResource
{
    protected string $model = ProjectCategory::class;

    protected string $title = 'Категории';

    /**
     * @return list<Page>
     */
    public function pages(): array
    {
        return [
            ProjectCategoryIndexPage::make($this->title()),
            ProjectCategoryFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            ProjectCategoryDetailPage::make(__('moonshine::ui.show')),
        ];
    }

    /**
     * @param ProjectCategory $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            'name' => 'required|string|max:255',
        ];
    }
}
