<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin_role extends Model
{
    /*public function admin()
    {
        return $this->hasMany(Admin::class,'admins');
    }*/
    public function admin()
    {
        return $this->belongsToMany('App\Admin');
    }
}
