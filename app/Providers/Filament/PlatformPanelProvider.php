<?php

namespace App\Providers\Filament;

use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Enums\Width;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class PlatformPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return BasePanelConfigurator::panel()
            ->id('platform')
            ->domain('platform.'.config('app.url'))
            ->pages([
                Dashboard::class,
            ])
            ->discoverResources(in: app_path('Filament/Platform/Resources'), for: 'App\Filament\Platform\Resources')
            ->discoverPages(in: app_path('Filament/Platform/Pages'), for: 'App\Filament\Platform\Pages')
            ->discoverWidgets(in: app_path('Filament/Platform/Widgets'), for: 'App\Filament\Platform\Widgets')
            ->plugins([
                FilamentShieldPlugin::make()
                    ->navigationLabel('Roles')
                    ->navigationGroup('User Management')
                    ->navigationSort('102')
                    ->gridColumns([
                        'default' => 1,
                        'sm' => 2,
                        'lg' => 3,
                    ])
                    ->sectionColumnSpan(1)
                    ->checkboxListColumns([
                        'default' => 1,
                        'sm' => 2,
                        'lg' => 4,
                    ])
                    ->resourceCheckboxListColumns([
                        'default' => 1,
                        'sm' => 2,
                    ]),
            ])
            ->widgets([
            ]);
    }
}
