<?php

namespace App\Nova\Pages;

use Illuminate\Http\Request;
use App\Nova\Resource;
use Laravel\Nova\Panel;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaFlexibleContent\Flexible;
use Mostafaznv\NovaCkEditor\CkEditor;
use Outl1ne\NovaMediaHub\Nova\Fields\MediaHubField;

class AboutPage extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Pages\AboutPage>
     */
    public static $model = \App\Models\Pages\AboutPage::class;

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

            MediaHubField::make(__('Banner'), 'banner')
                ->defaultCollection('about')->rules('required'),

            new Panel(__('Blok 1'), [
                MediaHubField::make(__('Image'), 'image')
                    ->defaultCollection('about'),

                Textarea::make(__('Text'), 'text')->translatable(),
            ]),

            Flexible::make(__('History'), 'history')
                ->addLayout('Section', 'wysiwyg', [
                    Text::make(__('Title', 'title'))->translatable(),
                    
                    MediaHubField::make(__('Image'), 'image')
                        ->defaultCollection('about'),
                    
            ])->hideFromIndex()->button('Add item'),

            new Panel(__('Blok 3'), [
                MediaHubField::make(__('Image'), 'image_1')
                    ->defaultCollection('about'),

                Textarea::make(__('Text'), 'text_1')->translatable(),
            ]),

            new Panel(__('Seo'), [
                Textarea::make(__('Seo Keywords'), 'seo_keywords')->translatable()->help(
                    '<b>Keywords separated by comma</b>'
                )->placeholder('Keywords separated by comma'),

                Textarea::make(__('Seo Description'), 'seo_description')->translatable(),
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

    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

    public function authorizedToUpdate(Request $request)
    {
        return false;
    }

    public function authorizedToDelete(Request $request)
    {
        return false;
    }

    public function authorizedToReplicate(Request $request)
    {
        return false;
    }

    public static function label(): string
    {
        return __('About Us');
    }
}
