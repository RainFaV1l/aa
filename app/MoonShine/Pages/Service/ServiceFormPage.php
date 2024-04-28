<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Service;

use App\MoonShine\Resources\ServiceCategoryResource;
use MoonShine\Fields\ID;
use MoonShine\Fields\Number;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Pages\Crud\FormPage;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Field;
use Throwable;

class ServiceFormPage extends FormPage
{
    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            ID::make(),
            Text::make('Название', 'name'),
            TinyMce::make('Описание', 'description'),
            Number::make('Цена', 'price'),
            Number::make('Цена от', 'price_from'),
            Number::make('Цена до', 'price_up_to'),
            BelongsTo::make('Категория', 'category', fn($item) => $item->name,resource: new ServiceCategoryResource())->searchable(),
        ];
    }

    /**
     * @return list<MoonShineComponent>
     * @throws Throwable
     */
    protected function topLayer(): array
    {
        return [
            ...parent::topLayer()
        ];
    }

    /**
     * @return list<MoonShineComponent>
     * @throws Throwable
     */
    protected function mainLayer(): array
    {
        return [
            ...parent::mainLayer()
        ];
    }

    /**
     * @return list<MoonShineComponent>
     * @throws Throwable
     */
    protected function bottomLayer(): array
    {
        return [
            ...parent::bottomLayer()
        ];
    }
}
