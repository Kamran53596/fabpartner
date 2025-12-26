<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Laravel\Fortify\Features;
use Laravel\Nova\Nova;
use Laravel\Nova\Panel;
use App\Nova\User as Admin;
use App\Nova\Module\Slider;
use App\Nova\Dashboards\Main;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Email;
use Laravel\Nova\NovaApplicationServiceProvider;
use Sereny\NovaPermissions\Nova\Permission;
use Sereny\NovaPermissions\Nova\Role;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        parent::boot();

        Nova::withBreadcrumbs();

        Nova::withoutThemeSwitcher();

        Nova::withoutNotificationCenter();

        Nova::mainMenu(function($request) {
            return [
                MenuSection::dashboard(Main::class, 'dashboard')
                    ->icon('chart-bar'),

                // MenuSection::make('Catalog', [
                //         MenuItem::resource(Category::class),
                //         MenuItem::resource(Product::class),
                //     ])->icon('rectangle-stack')->collapsable(),

                MenuSection::make('Modules', [
                        MenuItem::resource(Slider::class)
                    ])->icon('puzzle-piece')->collapsable(),

                MenuSection::make('Administator', [
                        MenuItem::resource(Admin::class),
                        MenuItem::resource(Role::class),
                        MenuItem::resource(Permission::class)
                    ])->icon('shield-check')->collapsable(),

                MenuSection::make('Settings')->icon('adjustments')->path('/nova-settings/general'),

                MenuSection::make('Media')->icon('photograph')->path('/media-hub')
            ];
        });

        \Outl1ne\NovaSettings\NovaSettings::addSettingsFields([

            new Panel(__('Contacts Settings'), [
                Text::make(__('Address'), 'address'),

                Text::make(__('Phone'), 'phone'),

                Email::make(__('Email'), 'email'),
            ]),
            
            new Panel(__('Social Settings'), [
                URL::make('Facebook'),

                URL::make('Instagram'),

                URL::make('Linkedin'),

            ]),
        ]);

        Nova::footer(function ($request) {
            return '<div class="mt-8 leading-normal text-xs text-gray-500 space-y-1"><p class="text-center">Powered by FAB BOYA</p></div>';
        });
    }

    /**
     * Register the configurations for Laravel Fortify.
     */
    protected function fortify(): void
    {
        Nova::fortify()
            ->features([
                Features::updatePasswords(),
                // Features::emailVerification(),
                // Features::twoFactorAuthentication(['confirm' => true, 'confirmPassword' => true]),
            ])
            ->register();
    }

    /**
     * Register the Nova routes.
     */
    protected function routes(): void
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            //->withPasswordResetRoutes()
            //->withoutEmailVerificationRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     */
    protected function gate(): void
    {
        Gate::define('viewNova', function (User $user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array<int, \Laravel\Nova\Dashboard>
     */
    protected function dashboards(): array
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array<int, \Laravel\Nova\Tool>
     */
    public function tools(): array
    {
        return [
            new \Outl1ne\NovaSettings\NovaSettings,
            \Outl1ne\NovaMediaHub\MediaHub::make(),
            (new \Sereny\NovaPermissions\NovaPermissions())
            ->hideFieldsFromRole([
                'guard_name'
            ])
            ->hideFieldsFromPermission([
                'guard_name',
            ]),
        ];
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        parent::register();

        //
    }
}
