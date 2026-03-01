<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('batch_subject', function (Blueprint $table) {
            $table->unsignedBigInteger('batch_id');
            $table->unsignedBigInteger('subject_id');

            $table->foreign('batch_id', 'batch_id_fk_batch_subject')
                ->references('id')
                ->on('batches')
                ->onDelete('cascade');
            $table->foreign('subject_id', 'subject_id_fk_batch_subject')
                ->references('id')
                ->on('subjects')
                ->onDelete('cascade');

            $table->unique(['batch_id', 'subject_id'], 'batch_subject_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('batch_subject');
    }
};
