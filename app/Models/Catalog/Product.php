<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;
use App\Concerns\HasTranslations;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use App\Models\Scopes\StatusScope;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;
use App\Concerns\Search;
use Laravel\Nova\Actions\Actionable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Concerns\HasImage;
use App\Models\Shop;
use Mcamara\LaravelLocalization\Interfaces\LocalizedUrlRoutable;

class Product extends Model implements Sortable, Sitemapable, LocalizedUrlRoutable
{
    use HasTranslations;
    use HasTranslatableSlug;
    use SortableTrait;
    use Search;
    use HasImage;
    use Actionable;

    protected $translatable = [
        'title',
        'description',
        'slug',
        'seo_keywords',
        'seo_description'
    ];

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => false,
    ];

    protected $searchable = [
        'title'
    ];

    protected $casts = [
        'gallery' => 'array'
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_to_category');
    }

    public function shops(): BelongsToMany
    {
        return $this->belongsToMany(Shop::class, 'product_to_shop');
    }

    protected static function booted(): void
    {
        static::addGlobalScope(new StatusScope);
    }

    public function getSlugUrlAttribute()
    {
        return route('product', ['slug' => $this->slug]);
    }

    public function getRelatedAttribute()
    {
        return $this->where('selected', 1)
                    ->limit(10)
                    ->get();
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function toSitemapTag(): Url | string | array
    {        
        // Return with fine-grained control:
        return Url::create(route('product', $this))
            ->setPriority(0.8)
            ->addAlternate('en/product/'.$this->getTranslation('slug', 'en'), 'en')
            ->addAlternate('ru/product/'.$this->getTranslation('slug', 'ru'), 'ru');
    }

    public function getLocalizedRouteKey($locale)
    {
        return $this->getTranslation('slug', $locale);
    }

    public function resolveRouteBinding($value, $field = null)
    {
        return static::findBySlug($value) ?? abort(404);
    }
}
