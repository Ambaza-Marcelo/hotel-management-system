<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    //
    protected $fillable = [
    	'title',
    	'buy_price',
    	'quantity',
    	'sell_price',
    	'profit',
    	'about'
    ];
}
