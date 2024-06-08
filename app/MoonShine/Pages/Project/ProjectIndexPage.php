<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Project;

use App\MoonShine\Resources\ProjectCategoryResource;
use App\MoonShine\Resources\ServiceResource;
use MoonShine\Fields\ID;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Pages\Crud\IndexPage;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Field;
use Throwable;

class ProjectIndexPage extends IndexPage
{
    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Название', 'name')->sortable(),
            Text::make('Ссылка на проект', 'link_to_project'),
            Text::make('Ссылка на сайт', 'link_to_site'),
            Image::make('Изображение', 'preview_path')->disk('public')->dir('project/images'),
            Number::make('Стоимость', 'price'),
            BelongsTo::make('Категория', 'category', fn($item) => $item->name, resource: new ProjectCategoryResource()),
            BelongsTo::make('Услуга', 'service', fn($item) => $item->name, resource: new ServiceResource()),
            Switcher::make('Опубликован', 'visibility')->sortable(),
            Text::make('Дата завершения', 'completed_at')->sortable(),
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
