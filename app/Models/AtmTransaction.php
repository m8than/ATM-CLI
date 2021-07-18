<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AtmTransaction extends Model
{
    
    /**
     * Relationships
     */
    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
