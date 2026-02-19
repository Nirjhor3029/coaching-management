<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('batch_student_basic_info', function (Blueprint $table) {
            $table->unsignedBigInteger('batch_id');
            $table->unsignedBigInteger('student_basic_info_id');

            $table->foreign('batch_id', 'batch_id_fk_1100003')->references('id')->on('batches')->onDelete('cascade');
            $table->foreign('student_basic_info_id', 'student_basic_info_id_fk_1100004')->references('id')->on('student_basic_infos')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('batch_student_basic_info');
    }
};

