<?php

namespace App\Providers\Filament;

use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;

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
