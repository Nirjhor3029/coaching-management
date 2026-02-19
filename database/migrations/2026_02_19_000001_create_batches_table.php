<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('batch_name');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('class_id');
            $table->string('fee_type');
            $table->decimal('fee_amount', 15, 2);
            $table->unsignedInteger('duration_in_months')->nullable();
            $table->json('class_days');
            $table->time('class_time');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('subject_id', 'subject_fk_1100001')->references('id')->on('subjects');
            $table->foreign('class_id', 'class_fk_1100002')->references('id')->on('academic_classes');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('batches');
    }
};

