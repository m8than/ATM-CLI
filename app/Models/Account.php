<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{

    public $incrementing = false;

    /**
     * Relationships
     */
    public function customers()
    {
        // Many to Many relationship because customers may be able to share accounts
        return $this->belongsToMany(Customer::class);
    }

    public function transactions()
    {
        return $this->hasMany(AtmTransaction::class);
    }
}
