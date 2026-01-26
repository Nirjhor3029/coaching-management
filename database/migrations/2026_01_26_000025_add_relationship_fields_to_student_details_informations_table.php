<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToStudentDetailsInformationsTable extends Migration
{
    public function up()
    {
        Schema::table('student_details_informations', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id', 'student_fk_10796015')->references('id')->on('student_basic_infos');
        });
    }
}
