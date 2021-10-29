<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_card',50)->unique();
            $table->string('name');
            $table->string('designation');
            $table->string('qualification');
            $table->string('gender');
            $table->string('religion');
            $table->string('email');
            $table->string('address');
            $table->string('phone_no');
            $table->string('dob');
            $table->string('joining_date');
            $table->string('photo');
            $table->string('salary');
            $table->string('duty_start');
            $table->string('duty_end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
