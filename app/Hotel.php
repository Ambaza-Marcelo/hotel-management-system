<?php

namespace App;

use App\Model;

class Hotel extends Model
{
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'about','logo', 'language', 'code', 'theme',
    ];

  public function users()
  {
    return $this->hasMany('App\User');
  }

}
