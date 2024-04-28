<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\ServiceCategory;

use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Pages\Crud\DetailPage;
use MoonShine\Components\MoonShineComponent;
use Throwable;

class ServiceCategoryDetailPage extends DetailPage
{
    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            ID::make(),
            Text::make('Название', 'name'),
            Text::make('Дата изменения', 'updated_at'),
            Text::make('Дата создания', 'created_at'),
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
