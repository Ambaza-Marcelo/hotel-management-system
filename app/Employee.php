<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable =[
    	'id_card',
    	'name',
    	'designation',
    	'qualification',
    	'gender',
    	'religion',
    	'email',
    	'phone_no',
    	'address',
    	'dob',
    	'joining_date',
    	'photo',
    	'signature',
    	'duty_start',
    	'duty_end',
    ];
}
