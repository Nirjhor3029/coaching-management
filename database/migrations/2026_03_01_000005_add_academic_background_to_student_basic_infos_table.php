<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('student_basic_infos', function (Blueprint $table) {
            $table->unsignedBigInteger('academic_background_id')->nullable()->after('shift_id');
            $table->foreign('academic_background_id', 'academic_background_fk_student_basic_info')
                ->references('id')
                ->on('academic_backgrounds');
        });
    }

    public function down(): void
    {
        Schema::table('student_basic_infos', function (Blueprint $table) {
            $table->dropForeign('academic_background_fk_student_basic_info');
            $table->dropColumn('academic_background_id');
        });
    }
};
