<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicClassShiftPivotTable extends Migration
{
    public function up()
    {
        Schema::create('academic_class_shift', function (Blueprint $table) {
            $table->unsignedBigInteger('academic_class_id');
            $table->foreign('academic_class_id', 'academic_class_id_fk_10795984')->references('id')->on('academic_classes')->onDelete('cascade');
            $table->unsignedBigInteger('shift_id');
            $table->foreign('shift_id', 'shift_id_fk_10795984')->references('id')->on('shifts')->onDelete('cascade');
        });
    }
}
