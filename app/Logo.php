<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    /**
     * Get the phone record associated with the user.
     */
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
