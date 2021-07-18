<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    
    /**
     * Relationships
     */
    public function accounts()
    {
        // Many to Many relationship because customers may be able to share accounts (also one customer can have many accounts)
        return $this->belongsToMany(Account::class);
    }
}
