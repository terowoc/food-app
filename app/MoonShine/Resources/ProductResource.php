<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Product;
use MoonShine\Fields\ID;
use MoonShine\Fields\Url;
use MoonShine\Fields\Json;
use MoonShine\Fields\Text;
use MoonShine\Fields\Image;
use MoonShine\Fields\Checkbox;
use MoonShine\Fields\Textarea;
use MoonShine\Decorations\Block;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Fields\Relationships\HasMany;
use MoonShine\Fields\Relationships\BelongsTo;


/**
 * @extends ModelResource<Product>
 */
class ProductResource extends ModelResource
{
    protected string $model = Product::class;

    protected string $title = 'Products';

    public string $titleField = 'Name';

    //    public static int $itemsPerPage=7;
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Name')->required(),
                Textarea::make('Description'),
                Image::make('Image'),
                Url::make('Video Url'),
                Text::make('Prep_time'),
                BelongsTo::make('Category', 'category', fn($item) => $item->name),
                HasMany::make('Ingredients', 'ingredients', resource: new ProductIngredientResource())
                    ->fields([
                        Text::make('Text'),
                    ])
                    ->creatable(),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
