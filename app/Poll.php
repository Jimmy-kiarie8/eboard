<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $fillable = ['question'];
     
    public function pollOptions()
    {
    	return $this->hasMany(PollOption::class);
    }
 
    public function scopeActive($query)
    {
    	return $query->where('active', true);
    }
}
