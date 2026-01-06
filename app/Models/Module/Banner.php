<?php

namespace App\Models\Module;

use Illuminate\Database\Eloquent\Model;
use App\Concerns\HasTranslations;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use App\Models\Scopes\StatusScope;
use App\Concerns\HasImage;
use Laravel\Nova\Actions\Actionable;

class Banner extends Model implements Sortable
{
    use HasTranslations;
    use SortableTrait;
    use HasImage;
    use Actionable;

    protected $translatable = [
        'image',
    ];

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => false,
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new StatusScope);
    }
}
