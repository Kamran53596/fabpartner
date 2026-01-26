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
use App\Concerns\HasImage;
use Laravel\Nova\Actions\Actionable;
use Mcamara\LaravelLocalization\Interfaces\LocalizedUrlRoutable;

class Category extends Model implements Sortable, Sitemapable, LocalizedUrlRoutable
{
    use HasTranslations;
    use HasTranslatableSlug;
    use HasImage;
    use SortableTrait;
    use Actionable;

    protected $translatable = [
        'title',
        'slug',
        'seo_keywords',
        'seo_description'
    ];

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => false,
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_to_category');
    }

    public function parentCategory()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function child()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    protected static function booted(): void
    {
        static::addGlobalScope(new StatusScope);
    }

    public function getSlugUrlAttribute()
    {
        return route('category', ['slug' => $this->slug]);
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
        return Url::create(route('category', $this))
            ->setPriority(0.8)
            ->addAlternate('en/category/'.$this->getTranslation('slug', 'en'), 'en')
            ->addAlternate('ru/category/'.$this->getTranslation('slug', 'ru'), 'ru');
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
