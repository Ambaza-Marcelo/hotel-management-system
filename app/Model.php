<?php

namespace App;

use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * @mixin \Eloquent
 */
class Model extends EloquentModel {
    
    public function scopeByHotel( $query, int $hotel_id )
    {
        return $query -> where( 'hotel_id', $hotel_id );
    }
}
