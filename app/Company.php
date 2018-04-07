<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
	* Get the phone record associated with the user.
	*/
	public function logo()
	{
		return $this->hasOne('App\Logo');
	}
}
