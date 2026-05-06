<?php

namespace App\Providers\Filament;

use App\Filament\Admin\Pages\AdminDashboard;
use Filament\Panel;
use Filament\PanelProvider;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return BasePanelConfigurator::panel()
            ->default()
            ->id('admin')
            ->domain('admin.'.config('app.url'))
            ->pages([
                AdminDashboard::class,
            ])
            ->discoverResources(in: app_path('Filament/Admin/Resources'), for: 'App\Filament\Admin\Resources')
            ->discoverPages(in: app_path('Filament/Admin/Pages'), for: 'App\Filament\Admin\Pages')
            ->discoverWidgets(in: app_path('Filament/Admin/Widgets'), for: 'App\Filament\Admin\Widgets');
    }
}
