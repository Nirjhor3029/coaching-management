<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicClassesTable extends Migration
{
    public function up()
    {
        Schema::create('academic_classes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('class_name');
            $table->date('academic_year')->nullable();
            $table->string('class_code')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
