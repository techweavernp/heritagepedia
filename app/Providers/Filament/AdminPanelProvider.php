<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Auth\Register;
use Filament\Enums\ThemeMode;
use Filament\FontProviders\GoogleFontProvider;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\View\View;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->passwordReset()
            //->registration(Register::class)
            ->colors($this->getBrandColors())
            ->spa(hasPrefetching: true)
            ->sidebarCollapsibleOnDesktop()
            ->sidebarWidth('15rem')
            ->breadcrumbs(false)
            ->font('Poppins', provider: GoogleFontProvider::class)
            //->brandLogo(asset('assets/img/logo-1.png'))
            ->brandLogoHeight('2.5rem')
            ->favicon(asset('assets/img/favicon.ico'))
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->discoverClusters(in: app_path('Filament/Clusters'), for: 'App\\Filament\\Clusters')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                // AccountWidget::class,
                // FilamentInfoWidget::class,
            ])
            /*->navigationItems([
                NavigationItem::make('KYC Forms')
                    ->url('/admin/kyc-forms')
                    ->icon('heroicon-o-document-text')
                    ->group('Others'),

                NavigationItem::make('Performance Apprisal')
                    ->url('/admin/performance-apprisal')
                    ->icon('heroicon-o-document-text')
                    ->group('Others'),
            ])*/
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
            //->viteTheme('resources/css/filament/admin/theme.css')
            /*->plugins([
                AuthUIEnhancerPlugin::make()
                    ->showEmptyPanelOnMobile(false)
                    ->emptyPanelBackgroundImageOpacity('80%')
                    ->formPanelWidth('55%')
                    ->emptyPanelBackgroundImageUrl(asset('assets/img/birgunj-clock.jpg')),
            ])*/
            // ->renderHook(
            //     'panels::auth.login.form.after',
            //     fn () => view('auth.socialite')
            // )
//            ->renderHook(
//                PanelsRenderHook::TOPBAR_LOGO_AFTER,
//                fn (): View => view('filament.app.hooks.welcome_user')
//            )
            ->renderHook(
                PanelsRenderHook::PAGE_HEADER_WIDGETS_BEFORE,
                fn (): View => view('filament.alert')
            )
            ->databaseTransactions()
            ->databaseNotifications()
            ->databaseNotificationsPolling('30s');
    }

    protected function getBrandColors(): array
    {
        return [
            'primary' => Color::hex('#5B2727'),
            'secondary' => Color::hex('#003893'),
            'danger' => Color::hex('#DC143C'),
            'success' => Color::hex('#31473A'),
            'warning' => Color::hex('#EEA429'),
            'info' => Color::hex('#0284c7'),
            'gray' => Color::hex('#66625C'),
        ];
    }
}
