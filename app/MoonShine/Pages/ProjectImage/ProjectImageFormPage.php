<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\ProjectImage;

use App\MoonShine\Resources\ProjectResource;
use MoonShine\Fields\ID;
use MoonShine\Fields\Image;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Text;
use MoonShine\Pages\Crud\FormPage;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Field;
use Throwable;

class ProjectImageFormPage extends FormPage
{
    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            ID::make(),
            Text::make('Название', 'name'),
            Text::make('Описание', 'description'),
            BelongsTo::make('Проект', 'project', fn($item) => $item->name, resource: new ProjectResource())->searchable(),
            Image::make('Изображение', 'image_path')->dir('/project/images')->disk('public'),
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
