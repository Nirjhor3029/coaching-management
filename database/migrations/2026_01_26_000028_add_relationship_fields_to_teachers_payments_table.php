<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTeachersPaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('teachers_payments', function (Blueprint $table) {
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->foreign('teacher_id', 'teacher_fk_10796158')->references('id')->on('teachers');
        });
    }
}
