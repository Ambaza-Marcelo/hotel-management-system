<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    //
    protected $fillable = [
    	'employee_id',
    	'leave_type',
    	'leave_date_start',
    	'leave_date_end',
    	'document',
    	'description',
    	'status',
    ];
}
