<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable=[
    	'name',
    	'image',
    	'quantity',
    	'price_for_one',
    ];

    public function sale()
    {
    	return $this->hasMany('App\Sale','product_id');
    }
}
