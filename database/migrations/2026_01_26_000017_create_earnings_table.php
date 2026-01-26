<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEarningsTable extends Migration
{
    public function up()
    {
        Schema::create('earnings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('academic_background')->nullable();
            $table->string('exam_year')->nullable();
            $table->longText('details')->nullable();
            $table->decimal('amount', 15, 2);
            $table->datetime('earning_date')->nullable();
            $table->integer('earning_month')->nullable();
            $table->integer('earning_year')->nullable();
            $table->string('earning_reference')->nullable();
            $table->string('payment_method')->nullable();
            $table->longText('payment_proof_details')->nullable();
            $table->string('paid_by')->nullable();
            $table->string('recieved_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
