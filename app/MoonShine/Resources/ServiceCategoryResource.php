<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\ServiceCategory;
use App\MoonShine\Pages\ServiceCategory\ServiceCategoryIndexPage;
use App\MoonShine\Pages\ServiceCategory\ServiceCategoryFormPage;
use App\MoonShine\Pages\ServiceCategory\ServiceCategoryDetailPage;

use MoonShine\Resources\ModelResource;
use MoonShine\Pages\Page;

/**
 * @extends ModelResource<ServiceCategory>
 */
class ServiceCategoryResource extends ModelResource
{
    protected string $model = ServiceCategory::class;

    protected string $title = 'Категории';

    /**
     * @return list<Page>
     */
    public function pages(): array
    {
        return [
            ServiceCategoryIndexPage::make($this->title()),
            ServiceCategoryFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            ServiceCategoryDetailPage::make(__('moonshine::ui.show')),
        ];
    }

    /**
     * @param ServiceCategory $item
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
