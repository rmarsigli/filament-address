<?php

namespace Rmarsigli\FilamentAddress\Models;

use Illuminate\Database\Eloquent\Model;

class AddressState extends Model
{
    public $timestamps = false;

    protected $table = 'addresses_states';

    protected $fillable = [
        'country_id',
        'name',
        'federated_unit',
    ];
}
