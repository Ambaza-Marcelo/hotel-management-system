<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
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
