<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTeachersTable extends Migration
{
    public function up()
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->boolean('status')->default(1)->change();
            $table->string('salary_type')->nullable()->default('variable')->change();
            $table->decimal('salary_amount', 15, 2)->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->boolean('status')->default(0)->change();
            $table->string('salary_type')->nullable()->change();
            $table->decimal('salary_amount', 15, 2)->nullable(false)->change();
        });
    }
}
