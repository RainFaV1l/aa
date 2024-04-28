<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\MoonShine\Pages\Service\ServiceIndexPage;
use App\MoonShine\Pages\Service\ServiceFormPage;
use App\MoonShine\Pages\Service\ServiceDetailPage;

use MoonShine\Resources\ModelResource;
use MoonShine\Pages\Page;

/**
 * @extends ModelResource<Service>
 */
class ServiceResource extends ModelResource
{
    protected string $model = Service::class;

    protected string $title = 'Услуги';

    /**
     * @return list<Page>
     */
    public function pages(): array
    {
        return [
            ServiceIndexPage::make($this->title()),
            ServiceFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            ServiceDetailPage::make(__('moonshine::ui.show')),
        ];
    }

    /**
     * @param Service $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'price_from' => 'nullable|numeric|min:0',
            'price_up_to' => 'nullable|numeric|min:0',
            'service_category_id ' => 'nullable|integer|exists:service_categories,id',
        ];
    }
}
