<?php

namespace Rmarsigli\FilamentAddress\Traits;

use Rmarsigli\FilamentAddress\Models\AddressCity;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Illuminate\Support\Collection;

trait HasAddress
{
    protected function getAddressFields(): array
    {
        return [
            Forms\Components\Group::make()
                ->relationship('address')
                ->schema([
                    Forms\Components\TextInput::make('address')
                        ->label(__('filament-address::address.address'))
                        ->maxLength(240),
                    Forms\Components\TextInput::make('number')
                        ->label(__('filament-address::address.number'))
                        ->numeric()
                        ->maxLength(7),
                    Forms\Components\TextInput::make('neighborhood')
                        ->label(__('filament-address::address.neighborhood')),
                    Select::make('state_id')
                        ->label(__('filament-address::address.state'))
                        ->relationship('state', 'name')
                        ->preload()
                        ->searchable()
                        ->live(),
                    Forms\Components\Select::make('city_id')
                        ->label(__('filament-address::address.city'))
                        ->relationship('city')
                        ->disabled(fn (Get $get): bool => !filled($get('state_id')))
                        ->options(fn (Get $get): Collection => AddressCity::query()->where('state_id', $get('state_id'))->pluck('name', 'id'))
                        ->searchable()
                        ->preload(),
                    Forms\Components\TextInput::make('zip_code')
                        ->label(__('filament-address::address.zip_code'))
                        ->maxLength(10),
                    Forms\Components\Textarea::make('complement')
                        ->label(__('filament-address::address.complement'))
                        ->maxLength(240),
                ]),
        ];
    }
}
