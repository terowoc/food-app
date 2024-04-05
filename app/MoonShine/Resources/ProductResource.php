<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Image;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Relationships\HasMany;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<Product>
 */
class ProductResource extends ModelResource
{
    protected string $model = Product::class;

    protected string $title = 'Products';

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Name'),
                Textarea::make('Description'),
                Image::make('Image'),
                BelongsTo::make('Category', 'category', fn ($item) => $item->name),
                HasMany::make('Comments', 'comments', fn ($item) => $item->user->name)->hideOnIndex(),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
