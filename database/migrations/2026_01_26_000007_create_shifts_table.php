<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftsTable extends Migration
{
    public function up()
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('shift_name');
            $table->string('shift_code')->nullable();
            $table->string('shift_time')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
