<?php

namespace Rmarsigli\FilamentAddress;

use Filament\Contracts\Plugin;
use Filament\Panel;

class FilamentAddressPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-address';
    }

    public function register(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return new static();
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
