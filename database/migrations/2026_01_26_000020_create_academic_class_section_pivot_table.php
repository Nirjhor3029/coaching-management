<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicClassSectionPivotTable extends Migration
{
    public function up()
    {
        Schema::create('academic_class_section', function (Blueprint $table) {
            $table->unsignedBigInteger('academic_class_id');
            $table->foreign('academic_class_id', 'academic_class_id_fk_10795983')->references('id')->on('academic_classes')->onDelete('cascade');
            $table->unsignedBigInteger('section_id');
            $table->foreign('section_id', 'section_id_fk_10795983')->references('id')->on('sections')->onDelete('cascade');
        });
    }
}
