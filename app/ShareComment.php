<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShareComment extends Model
{
    public function shareholder()
    {
    	return $this->belongsTo('App\Shareholder');
    }
}
