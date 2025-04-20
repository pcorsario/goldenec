<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    protected static ?string $pollingInterval = '10s'; // Auto-refresco
protected static ?int $sort = 2; // Orden en el dashboard
protected static ?string $maxHeight = '100px'; // Tamaño
    public function panel(Panel $panel): Panel
    {
        return $panel

            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            // ->brandName('GoldenBrain')
            ->registration()
            ->brandLogo(asset('images/LogoGB-sf.png'))
            ->brandLogoHeight('3rem')
            ->colors([
               'danger' => Color::Rose,
                'gray' => Color::Gray,
                'info' => Color::Blue,
                'primary' => '#015551',
                'success' => Color::Emerald,
                'warning' => Color::Orange,
            ])
         
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            // ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
        ->widgets([
                //          Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
            // \App\Filament\Widgets\EstudiantesStats::class,
            \App\Filament\Widgets\TotalServiciosWidget::class,
            // \App\Filament\Widgets\EstudiantesPorColegioChart::class,
            // Otros widgets...
        ])

            // ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            // ->widgets([
            //     Widgets\AccountWidget::class,
            //     Widgets\FilamentInfoWidget::class,
            // ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->topNavigation()
            ->maxContentWidth('full')
            ;
    }
}
