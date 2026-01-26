<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToStudentBasicInfosTable extends Migration
{
    public function up()
    {
        Schema::table('student_basic_infos', function (Blueprint $table) {
            $table->unsignedBigInteger('class_id')->nullable();
            $table->foreign('class_id', 'class_fk_10795998')->references('id')->on('academic_classes');
            $table->unsignedBigInteger('section_id')->nullable();
            $table->foreign('section_id', 'section_fk_10795999')->references('id')->on('sections');
            $table->unsignedBigInteger('shift_id')->nullable();
            $table->foreign('shift_id', 'shift_fk_10796000')->references('id')->on('shifts');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_10796052')->references('id')->on('users');
        });
    }
}
