<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //
    protected $fillable = [
    	'description',
    	'quantity',
    	'price',
    	'product_id'
    ];


    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
}
