<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class WebsitePanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return BasePanelConfigurator::panel()
            ->id('website')
            ->domain('website.'.config('app.url'))
            ->pages([
                Dashboard::class,
            ])
            ->discoverResources(in: app_path('Filament/Website/Resources'), for: 'App\Filament\Website\Resources')
            ->discoverPages(in: app_path('Filament/Website/Pages'), for: 'App\Filament\Website\Pages')
            ->discoverWidgets(in: app_path('Filament/Website/Widgets'), for: 'App\Filament\Website\Widgets');
    }
}
