<?php

namespace Rmarsigli\FilamentAddress;

use Illuminate\Support\ServiceProvider;

class FilamentAddressServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../database/migrations/' => database_path('migrations'),
        ], 'filament-address-migration');

        $this->publishes([
            __DIR__ . '/../lang' => resource_path('lang/vendor/address'),
        ], 'filament-address-lang');
    }

    /**
     * Register services.
     */
    public function register(): void
    {
        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'filament-address');
    }
}
