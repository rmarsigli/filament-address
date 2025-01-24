<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Rmarsigli\FilamentAddress\Models\AddressCountry;
use Rmarsigli\FilamentAddress\Models\AddressState;
use Rmarsigli\FilamentAddress\Models\AddressCity;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('addresses_countries', function (Blueprint $table) {
            $table->id();
            $table->char('short');
            $table->char('language_short');
            $table->string('name');
        });

        Schema::create('addresses_states', function (Blueprint $table) {
            $table->id();
            $table->char('name');
            $table->char('federated_unit');
            $table->foreignIdFor(AddressCountry::class, 'country_id')->default(1);
        });

        Schema::create('addresses_cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(AddressState::class, 'state_id');
        });

        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->morphs('address');
            $table->foreignIdFor(AddressCountry::class, 'country_id')->nullable();
            $table->foreignIdFor(AddressState::class, 'state_id')->nullable();
            $table->foreignIdFor(AddressCity::class, 'city_id')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('address')->nullable();
            $table->char('number')->nullable();
            $table->char('zip_code')->nullable();
            $table->mediumText('complement')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses_countries');
        Schema::dropIfExists('addresses_cities');
        Schema::dropIfExists('addresses_states');
        Schema::dropIfExists('addresses');
    }
};
