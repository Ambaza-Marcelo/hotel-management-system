<?php

namespace App;

use App\Model;

class Event extends Model
{
    /**
     * Get the school record associated with the user.
    */
    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }
}
