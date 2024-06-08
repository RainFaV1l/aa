<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Technology;
use App\MoonShine\Pages\Technology\TechnologyIndexPage;
use App\MoonShine\Pages\Technology\TechnologyFormPage;
use App\MoonShine\Pages\Technology\TechnologyDetailPage;

use Illuminate\Validation\Rule;
use MoonShine\Resources\ModelResource;
use MoonShine\Pages\Page;

/**
 * @extends ModelResource<Technology>
 */
class TechnologyResource extends ModelResource
{
    protected string $model = Technology::class;

    protected string $title = 'Технологии';

    /**
     * @return list<Page>
     */
    public function pages(): array
    {
        return [
            TechnologyIndexPage::make($this->title()),
            TechnologyFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            TechnologyDetailPage::make(__('moonshine::ui.show')),
        ];
    }

    /**
     * @param Technology $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'image_path' => 'image|' . Rule::requiredIf(empty($item->image_path)),
        ];
    }

    public function search(): array
    {
        return [
            'name',
            'description',
        ];
    }
}
