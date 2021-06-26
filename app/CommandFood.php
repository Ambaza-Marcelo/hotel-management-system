<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommandFood extends Model
{
    //
    protected $fillable =[
    	'title','description','old_price','new_price','type','image',
    ];
}
