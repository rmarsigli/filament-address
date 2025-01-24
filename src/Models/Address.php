<?php

namespace Rmarsigli\FilamentAddress\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Address extends Model
{
    public $timestamps = false;

    protected $table = 'addresses';

    protected $fillable = [
        'address_type',
        'address_id',
        'country_id',
        'state_id',
        'city_id',
        'neighborhood',
        'zip_code',
        'address',
        'number',
        'complement',
    ];

    public function address(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get the country associated with the Address
     *
     * @return HasOne
     */
    public function country(): HasOne
    {
        return $this->hasOne(AddressCountry::class, 'id', 'country_id');
    }

    /**
     * Get the state associated with the Address
     *
     * @return HasOne
     */
    public function state(): HasOne
    {
        return $this->hasOne(AddressState::class, 'id', 'state_id');
    }

    /**
     * Get the city associated with the Address
     *
     * @return HasOne
     */
    public function city(): HasOne
    {
        return $this->hasOne(AddressCity::class, 'id', 'city_id');
    }
}
