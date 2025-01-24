<?php

namespace Rmarsigli\FilamentAddress\Seeders;

use Illuminate\Database\Seeder;
use RMarsigli\FilamentAddress\Models\AddressCity;
use RMarsigli\FilamentAddress\Models\AddressCountry;
use RMarsigli\FilamentAddress\Models\AddressState;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = require(__DIR__ . '/data/countries.php');
        $states = require(__DIR__ . '/data/states.php');
        $cities = require(__DIR__ . '/data/cities.php');

        foreach ($countries as $country) {
            $country['language_short'] = $country['language_short'] === 'pt_BR'
                ? 'pt_BR'
                : strtolower($country['language_short']);

            AddressCountry::create($country);
        }

        foreach ($states as $state) {
            $state['country_id'] = 1;

            AddressState::create($state);
        }

        foreach ($cities as $city) {
            AddressCity::create($city);
        }
    }
}
