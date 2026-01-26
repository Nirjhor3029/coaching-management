<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersPaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('teachers_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('payment_details')->nullable();
            $table->integer('month')->nullable();
            $table->integer('year')->nullable();
            $table->string('payment_status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
