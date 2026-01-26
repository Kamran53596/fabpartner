<?php

namespace App\Nova\Catalog;

use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Nova\Resource;
use Illuminate\Http\Request;
use Laravel\Nova\Tabs\Tab;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;
use Outl1ne\NovaMediaHub\Nova\Fields\MediaHubField;
use Outl1ne\NovaSortable\Traits\HasSortableRows;

class Category extends Resource
{
    use HasSortableRows;
    
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Catalog\Category>
     */
    public static $model = \App\Models\Catalog\Category::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title',
    ];

    public static $trafficCop = false;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array<int, \Laravel\Nova\Fields\Field>
     */
    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),

            Tab::group(fields: [

                Tab::make('General', [
                    Text::make(__('Title'), 'title')->translatable()->rules('required'),

                    BelongsTo::make('Parent Category', 'parentCategory', 'App\Nova\Catalog\Category')->sortable()->filterable()->nullable()->hideFromIndex(),

                    MediaHubField::make(__('Image'), 'image')
                        ->defaultCollection('categories')->rules('required'),
                
                    Number::make(__('Sort Order'), 'sort_order')->default(1)->min(1)->sortable()->rules('required'),

                    Boolean::make(__('Status'), 'status')
                        ->trueValue(1)
                        ->falseValue(0)
                        ->default(1)->filterable(),
                ]),

                Tab::make('Seo', [

                    Slug::make(__('Slug'), 'slug')->translatable()->withMeta(['extraAttributes' => ['readonly' => true]])->hideFromIndex(),
                    
                    Textarea::make(__('Seo Keywords'), 'seo_keywords')->translatable()->help(
                        '<b>Keywords separated by comma</b>'
                    )->placeholder('Keywords separated by comma'),

                    Textarea::make(__('Seo Description'), 'seo_description')->translatable(),
                ])
            ]),
        ];
    }

    /**
     * Get the cards available for the resource.
     *
     * @return array<int, \Laravel\Nova\Card>
     */
    public function cards(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array<int, \Laravel\Nova\Filters\Filter>
     */
    public function filters(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @return array<int, \Laravel\Nova\Lenses\Lens>
     */
    public function lenses(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array<int, \Laravel\Nova\Actions\Action>
     */
    public function actions(NovaRequest $request): array
    {
        return [];
    }

    public static function label(): string
    {
        return __('Categories');
    }

    public static function indexQuery(NovaRequest $request, Builder $query): Builder
    {
        $query->withoutGlobalScopes();
        
        return parent::indexQuery($request, $query);
    }
}
