<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $fillable =[
    	'title','description','old_price','new_price','type','num','image',
    ];
}
