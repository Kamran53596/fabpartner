<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Concerns\HasTranslations;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use App\Models\Scopes\StatusScope;
use App\Concerns\Search;
use Laravel\Nova\Actions\Actionable;

class Shop extends Model implements Sortable
{
    use HasTranslations;
    use SortableTrait;
    use Search;
    use Actionable;

    protected $translatable = [
        'title',
    ];

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => false,
    ];

    protected $searchable = [
        'title'
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new StatusScope);
    }
}
