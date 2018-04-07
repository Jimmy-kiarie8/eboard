<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcat extends Model
{
	protected $casts = [
	    'users_id' => 'json'
	];
    
    /**
     * Every attachment belongs to one file category
     * 
     * @return Relation 
     */
    public function docs()
    {
    	return $this->belongsTo('App\Attachment');
    }
}
