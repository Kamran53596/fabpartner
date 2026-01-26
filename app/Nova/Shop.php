<?php

namespace App\Nova;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Http\Requests\NovaRequest;
use Outl1ne\NovaSortable\Traits\HasSortableRows;

class Shop extends Resource
{
    use HasSortableRows;

    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Shop>
     */
    public static $model = \App\Models\Shop::class;

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

            Text::make(__('Title'), 'title')->translatable()->rules('required'),

            Text::make(__('Address'), 'address')->translatable()->rules('required'),

            Text::make(__('Latitude'), 'lat')->rules('required'),

            Text::make(__('Longitude'), 'long')->rules('required'),

            Text::make(__('Phone'), 'phone')->rules('required'),

            Select::make(__('Region'), 'region_id')
                ->searchable()
                ->options(config('region'))->displayUsingLabels(),

            URL::make(__('Google link'), 'google_map')->rules('required'),

            Number::make(__('Sort Order'), 'sort_order')->default(1)->min(1)->sortable()->rules('required'),

            Boolean::make(__('Status'), 'status')
                ->trueValue(1)
                ->falseValue(0)
                ->default(1)->filterable(),
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
        return __('Shops');
    }

    public static function indexQuery(NovaRequest $request, Builder $query): Builder
    {
        $query->withoutGlobalScopes();
        
        return parent::indexQuery($request, $query);
    }
}
