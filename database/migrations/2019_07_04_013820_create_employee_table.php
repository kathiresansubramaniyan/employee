<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned();
            $table->string('firstname',150);
            $table->string('lastname',150);
            $table->date('dob')->nullable();
            $table->string('phone',15)->nullable();
            $table->string('education_qualification',15)->nullable();
            $table->string('address',15)->nullable();            
            $table->string('email',50);
            $table->string('photo',50)->nullable();
            $table->string('resume',50)->nullable();
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
        Schema::dropIfExists('employee');
    }
}
