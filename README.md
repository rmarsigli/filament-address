# Easy address manager for Filament and Laravel

This library is a solution for a recurring application in my applications, witch is to use an address solution without streets, but with __neighborhoods__, __cities__ and __states__.

__Note:__ it already has a Seeder ready for neighborhoods, cities and states in Brazil.

## How to use

First, install the package:

`composer require rmarsigli/filament-address
`

Publish migration and (optionally) language:

```
php artisan vendor:publish --tags=filament-address-migration
php artisan vendor:publish --tags=filament-address-lang
```

Add the polymorphic relation to the resource model:

```php
    use Rmarsigli\FilamentAddress\Models\Address;

    public function address(): MorphOne
    {
        return $this->morphOne(
            Address::class, 
            'address', 
            'address_type', 
            'address_id'
        );
    }
```

### Using the form in Filament

Use `hasAddress` trait in your Filament resource:

```php
use Rmarsigli\Filament\Traits\HasAddress;
... // Filament classes

class MyResource extends Resource {
    use HasAddress;
    
    public static function form(Form $form): Form {
        $resourceInstance = new self();
        
        return $form
            ->schema([
                Section::make()->schema(
                    $resourceInstance->getAddressFields(),
                )
                ->inlineLabel(),
                ->hiddenOn('create')
            ]);
    }
}
```

The `inlineLabel()` is totally optional, and `hiddenOn('create')` method is to ensure that it will be executed when the Resource has an id.

### Using this package with Laravel

Without Filament, you can use this package. Import the models and integrate with your controller. Models are:

```php
use Rmarsigli\FilamentAddress\Address;
use Rmarsigli\FilamentAddress\AddressCity;
use Rmarsigli\FilamentAddress\AddressState;
use Rmarsigli\FilamentAddress\AddressCountry;
```

Check project files for models structure.

## Brazilian automatic seeder

Maybe in another countries soon.

```php
use Rmarsigli\FilamentAddress\Seeders\AddressSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AddressSeeder::class,
        ]);
    }
}
```
