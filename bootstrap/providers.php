<?php

use App\Providers\AppServiceProvider;
use App\Providers\Filament\AdminPanelProvider;
use App\Providers\Filament\CustomerPanelProvider;
use App\Providers\Filament\PlatformPanelProvider;
use App\Providers\Filament\WebsitePanelProvider;
use App\Providers\FortifyServiceProvider;
use App\Providers\HorizonServiceProvider;

return [
    AppServiceProvider::class,
    AdminPanelProvider::class,
    CustomerPanelProvider::class,
    PlatformPanelProvider::class,
    WebsitePanelProvider::class,
    FortifyServiceProvider::class,
    HorizonServiceProvider::class,
];
