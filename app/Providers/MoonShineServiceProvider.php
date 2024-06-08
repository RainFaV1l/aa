<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Resources\ProjectCategoryResource;
use App\MoonShine\Resources\ProjectImageResource;
use App\MoonShine\Resources\ProjectResource;
use App\MoonShine\Resources\ServiceCategoryResource;
use App\MoonShine\Resources\ServiceResource;
use App\MoonShine\Resources\TechnologyResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use App\MoonShine\Resources\MoonShineUserResource;
use App\MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Menu\MenuElement;
use MoonShine\Pages\Page;
use Closure;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [];
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [
            MenuGroup::make(static fn() => __('moonshine::ui.resource.system'), [
               MenuItem::make(
                   static fn() => __('moonshine::ui.resource.admins_title'),
                   new MoonShineUserResource()
               ),
               MenuItem::make(
                   static fn() => __('moonshine::ui.resource.role_title'),
                   new MoonShineUserRoleResource()
               ),
            ]),

            MenuItem::make('Documentation', 'https://moonshine-laravel.com')
               ->badge(fn() => 'Check'),

            MenuGroup::make('Услуги', [
                MenuItem::make('Категории', new ServiceCategoryResource(), 'heroicons.tag'),
                MenuItem::make('Услуги', new ServiceResource(), 'heroicons.clipboard-document-list'),
                MenuItem::make('Технологии', new TechnologyResource(), 'laravel'),
            ], 'heroicons.adjustments-horizontal'),

            MenuGroup::make('Проекты', [
                MenuItem::make('Категории', new ProjectCategoryResource(), 'heroicons.tag'),
                MenuItem::make('Проекты', new ProjectResource(), 'heroicons.currency-dollar'),
                MenuItem::make('Изображения', new ProjectImageResource(), 'heroicons.photo'),
            ], 'heroicons.clipboard-document-check'),
        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
