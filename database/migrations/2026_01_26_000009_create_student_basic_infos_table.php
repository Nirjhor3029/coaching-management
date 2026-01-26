<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentBasicInfosTable extends Migration
{
    public function up()
    {
        Schema::create('student_basic_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('roll')->nullable();
            $table->string('id_no')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('contact_number');
            $table->string('email')->nullable();
            $table->date('dob');
            $table->string('status')->nullable();
            $table->datetime('joining_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
