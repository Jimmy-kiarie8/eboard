<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //table name
    protected $table = 'posts';
    //PrimaryKey
    public $primaryKey = 'id';
    //timestamp
    public $timeStamp = true;

    //Relashionship
    public function user(){
        return $this->belongsTo('App\user');
    }
}
