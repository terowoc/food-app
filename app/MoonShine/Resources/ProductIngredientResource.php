<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\ProductIngredient;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<ProductIngredient>
 */
class ProductIngredientResource extends ModelResource
{
    protected string $model = ProductIngredient::class;

    protected string $title = 'ProductIngredients';

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Text')->sortable(),
                BelongsTo::make('Product', 'product', fn ($product) => $product->name),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
