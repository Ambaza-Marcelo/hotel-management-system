<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name','price','discount_price'];

    public function room()
    {
    	return $this->hasMany('App\Room','category_id');
    }
}
