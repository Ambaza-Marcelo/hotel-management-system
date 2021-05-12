<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    //
    protected $fillable = [
    	'employee_id',
    	'leave_type',
    	'leave_date',
    	'document',
    	'description',
    	'status',
    ];
}
