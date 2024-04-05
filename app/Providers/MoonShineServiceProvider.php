<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\User;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Category;
use MoonShine\Menu\MenuItem;
use App\MoonShine\Resources\UserResource;
use App\MoonShine\Resources\CommentResource;
use App\MoonShine\Resources\ProductResource;
use App\MoonShine\Resources\CategoryResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    protected function resources(): array
    {
        return [];
    }

    protected function pages(): array
    {
        return [];
    }

    protected function menu(): array
    {
        return [
            MenuItem::make('Users', (new UserResource()))
                ->badge(fn () => User::count()),

            MenuItem::make('Categories', (new CategoryResource()))
                ->badge(fn () => Category::count()),

            MenuItem::make('Products', (new ProductResource()))
                ->badge(fn () => Product::count()),

            MenuItem::make('Comments', (new CommentResource()))
                ->badge(fn () => Comment::count()),
        ];
    }

    /**
     * @return array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
