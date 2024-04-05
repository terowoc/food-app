<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Textarea;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

/**
 * @extends ModelResource<Comment>
 */
class CommentResource extends ModelResource
{
    protected string $model = Comment::class;

    protected string $title = 'Comments';

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Textarea::make('Body'),
                BelongsTo::make('User', 'user', fn ($item) => $item->name),
                BelongsTo::make('Product', 'product', fn ($item) => $item->name),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
