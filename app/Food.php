<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    //
    protected $fillable = [
    	'name',
    	'quantity',
    	'buy_price',
    	'sell_price',
    	'profit'
    ];
}
