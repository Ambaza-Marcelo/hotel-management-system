<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $fillable =[
    	'num_room','description','image','category_id'
    ];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
}
