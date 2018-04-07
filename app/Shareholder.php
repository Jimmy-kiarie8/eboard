<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shareholder extends Model
{
    public function shareComments()
    {
    	return $this->hasMany('App\ShareComment', 'post_id');
    }
}
