<?php

namespace App\Providers;

use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }
        Model::automaticallyEagerLoadRelationships();

        // Below are configuration for filament
        Table::configureUsing(function (Table $table) {
            $table
                ->paginated([50, 100, 200, 'all'])
                ->extremePaginationLinks();
        });
    }
}
