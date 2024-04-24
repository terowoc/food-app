<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Decorations\Block;
use MoonShine\Fields\Checkbox;
use MoonShine\Fields\ID;
use MoonShine\Fields\Image;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Relationships\HasMany;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\Text;
use MoonShine\Fields\Url;
use MoonShine\Resources\ModelResource;
use MoonShine\Fields\Json;


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
                Text::make('Name'),
                Textarea::make('Description'),
                Image::make('Image'),
                Url::make('video_url'),
                Text::make('Prep_time'),
                Json::make('food_ingredients', 'food_ingredients')
                    ->fields([
                        Text::make('Title'),
                    ])->creatable()->removable(),
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
