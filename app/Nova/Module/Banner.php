<?php

namespace App\Nova\Module;

use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Nova\Resource;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Http\Requests\NovaRequest;
use Outl1ne\NovaMediaHub\Nova\Fields\MediaHubField;
use Outl1ne\NovaSortable\Traits\HasSortableRows;

class Banner extends Resource
{
    use HasSortableRows;

    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Module\Banner>
     */
    public static $model = \App\Models\Module\Banner::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
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

            MediaHubField::make(__('Image'), 'image')
                ->defaultCollection('banners')->translatable()->rules('required'),

            MediaHubField::make(__('Mobile Image'), 'mob_image')
                ->defaultCollection('sliders')->translatable()->rules('required'),

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
        return __('Banners');
    }

    public static function indexQuery(NovaRequest $request, Builder $query): Builder
    {
        $query->withoutGlobalScopes();
        
        return parent::indexQuery($request, $query);
    }
}
