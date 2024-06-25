<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Project;

use App\MoonShine\Resources\ProjectCategoryResource;
use App\MoonShine\Resources\ProjectImageResource;
use App\MoonShine\Resources\ServiceResource;
use App\MoonShine\Resources\TechnologyResource;
use MoonShine\Fields\ID;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Relationships\BelongsToMany;
use MoonShine\Fields\Relationships\HasMany;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Pages\Crud\DetailPage;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Field;
use Throwable;

class ProjectDetailPage extends DetailPage
{
    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            ID::make(),
            Text::make('Название', 'name'),
            Text::make('Ссылка на проект', 'link_to_project'),
            Text::make('Ссылка на сайт', 'link_to_site'),
            Text::make('Краткое описание', 'short_description'),
            Text::make('Описание', 'description'),
            BelongsToMany::make('Технологический стек', 'technologies', resource: new TechnologyResource())->creatable()->searchable(),
            Image::make('Изображение', 'preview_path')->disk('public')->dir('project/images'),
            Number::make('Стоимость', 'price'),
            BelongsTo::make('Категория', 'category', fn($item) => $item->name, resource: new ProjectCategoryResource()),
            BelongsTo::make('Услуга', 'service', fn($item) => $item->name, resource: new ServiceResource()),
            Switcher::make('Опубликован', 'visibility'),
            HasMany::make('Изображения', 'images', resource: new ProjectImageResource()),
            Text::make('Дата завершения', 'completed_at'),
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
