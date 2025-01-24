<?php

namespace Rmarsigli\FilamentAddress\Models;

use Illuminate\Database\Eloquent\Model;

class AddressCountry extends Model
{
    public $timestamps = false;

    protected $table = 'addresses_countries';

    public $fillable = [
        'short',
        'language_short',
        'name',
    ];
}
