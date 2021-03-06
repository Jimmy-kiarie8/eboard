<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PollOption extends Model
{
    protected $fillable = ['name','total'];
     
    public function poll()
    {
    	return $this->belongsTo(Poll::class);
    }
}
