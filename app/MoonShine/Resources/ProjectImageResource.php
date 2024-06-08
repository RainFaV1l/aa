<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectImage;
use App\MoonShine\Pages\ProjectImage\ProjectImageIndexPage;
use App\MoonShine\Pages\ProjectImage\ProjectImageFormPage;
use App\MoonShine\Pages\ProjectImage\ProjectImageDetailPage;

use MoonShine\Resources\ModelResource;
use MoonShine\Pages\Page;

/**
 * @extends ModelResource<ProjectImage>
 */
class ProjectImageResource extends ModelResource
{
    protected string $model = ProjectImage::class;

    protected string $title = 'Изображения проекта';

    /**
     * @return list<Page>
     */
    public function pages(): array
    {
        return [
            ProjectImageIndexPage::make($this->title()),
            ProjectImageFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            ProjectImageDetailPage::make(__('moonshine::ui.show')),
        ];
    }

    /**
     * @param ProjectImage $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'project_id ' => 'nullable|integer|exists:projects,id',
            'image_path ' => 'nullable|image|max:5120',
        ];
    }
}
