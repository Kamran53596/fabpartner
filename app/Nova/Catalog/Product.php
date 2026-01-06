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
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Http\Requests\NovaRequest;
use Mostafaznv\NovaCkEditor\CkEditor;
use Outl1ne\NovaMediaHub\Nova\Fields\MediaHubField;
use Outl1ne\NovaSortable\Traits\HasSortableRows;

class Product extends Resource
{
    use HasSortableRows;

    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Catalog\Product>
     */
    public static $model = \App\Models\Catalog\Product::class;

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

    /**
     * Get the fields displayed by the resource.
     *
     * @return array<int, \Laravel\Nova\Fields\Field>
     */
    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),

            BelongsToMany::make('Categories'),

            Tab::group(fields: [
                
                Tab::make('General', [
                    Text::make(__('Title'), 'title')->translatable()->rules('required'),

                    CkEditor::make(__('Description'), 'description')->translatable()->hideFromIndex()->stacked()->rules('required'),
                
                    Number::make(__('Sort Order'), 'sort_order')->default(1)->min(1)->sortable()->rules('required'),

                    Boolean::make(__('New'), 'new')
                        ->trueValue(1)
                        ->falseValue(0)
                        ->default(0)->filterable(),

                    Boolean::make(__('Selected'), 'selected')
                        ->trueValue(1)
                        ->falseValue(0)
                        ->default(0)->filterable(),

                    Boolean::make(__('Popular'), 'popular')
                        ->trueValue(1)
                        ->falseValue(0)
                        ->default(0)->filterable(),

                    Boolean::make(__('Status'), 'status')
                        ->trueValue(1)
                        ->falseValue(0)
                        ->default(1)->filterable(),
                ]),

                Tab::make('Data', [

                    Currency::make(__('Price'), 'price')->min(0)->step(0.01)->default(0)->locale('az'),

                    Currency::make(__('Discount'), 'discount')->min(0)->step(0.01)->default(0)->locale('az'),
                ]),

                Tab::make('Images', [
                    MediaHubField::make(__('Image'), 'image')
                        ->defaultCollection('products')->rules('required'),

                    MediaHubField::make(__('Gallery'), 'gallery')
                        ->defaultCollection('products')->multiple(),
                ]),

                Tab::make('Seo', [

                    Slug::make(__('Slug'), 'slug')->translatable()->readonly()->hideFromIndex(),
                    
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
        return __('Products');
    }

    public static function indexQuery(NovaRequest $request, Builder $query): Builder
    {
        $query->withoutGlobalScopes();
        
        return parent::indexQuery($request, $query);
    }
}
