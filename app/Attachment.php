<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Attachment extends Model
{
    /**
     * Guard properties
     *
     * @var array
     **/
    protected $guarded = ['id'];

    protected $appends = [
    	'time'
    ];

    /**
     * Every attachment belongs to one file category
     * 
     * @return Relation 
     */
    public function category()
    {
    	return $this->belongsTo('App\AttachmentCategory');
    }

    /**
     * Format updated_at 
     *
     * @return string
     */
    public function getTimeAttribute()
    {
        return (Carbon::parse($this->updated_at))->diffForHumans();
    }

    /**
     * Define relation with documents. Each category can have many documents
     *
     * @return Relation
     */
    /*public function subcats() {
        return $this->hasMany('App\Subcat', 'cat_id');
    }*/
}
