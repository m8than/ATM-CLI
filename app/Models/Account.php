<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{

    public $incrementing = false;

    public function withdraw($amount) {
        if ($this->available >= $amount) {
            $this->balance -= $amount;
            return $this->save();
        } else {
            return False;
        }
    }

    /**
     * Attributes
     */
    public function getAvailableAttribute() {
        return $this->balance + $this->overdraft_maximum;
    }

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
