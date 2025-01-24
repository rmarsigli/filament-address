<?php

namespace Rmarsigli\FilamentAddress\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AddressCity extends Model
{
    public $timestamps = false;

    protected $table = 'addresses_cities';

    protected $fillable = [
        'state_id',
        'name',
    ];

    /**
     * Get the state that owns the AddressCity
     *
     * @return BelongsTo
     */
    public function state(): BelongsTo
    {
        return $this->belongsTo(AddressState::class, 'state_id', 'id');
    }
}
