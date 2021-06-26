<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommandDrink extends Model
{
    //
    protected $fillable =[
    	'title','description','old_price','new_price','type','image',
    ];
}
