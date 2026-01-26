<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEarningsTable extends Migration
{
    public function up()
    {
        Schema::table('earnings', function (Blueprint $table) {
            $table->unsignedBigInteger('earning_category_id')->nullable();
            $table->foreign('earning_category_id', 'earning_category_fk_10796169')->references('id')->on('earning_categories');
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id', 'student_fk_10796170')->references('id')->on('student_basic_infos');
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->foreign('subject_id', 'subject_fk_10796171')->references('id')->on('subjects');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_10796186')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by_id')->nullable();
            $table->foreign('updated_by_id', 'updated_by_fk_10796187')->references('id')->on('users');
        });
    }
}
