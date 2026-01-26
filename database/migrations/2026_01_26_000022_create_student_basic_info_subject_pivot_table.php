<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentBasicInfoSubjectPivotTable extends Migration
{
    public function up()
    {
        Schema::create('student_basic_info_subject', function (Blueprint $table) {
            $table->unsignedBigInteger('student_basic_info_id');
            $table->foreign('student_basic_info_id', 'student_basic_info_id_fk_10796166')->references('id')->on('student_basic_infos')->onDelete('cascade');
            $table->unsignedBigInteger('subject_id');
            $table->foreign('subject_id', 'subject_id_fk_10796166')->references('id')->on('subjects')->onDelete('cascade');
        });
    }
}
