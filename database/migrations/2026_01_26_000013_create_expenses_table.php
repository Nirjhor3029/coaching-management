<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->longText('details')->nullable();
            $table->decimal('amount', 15, 2);
            $table->datetime('expense_date');
            $table->integer('expense_month')->nullable();
            $table->integer('expense_year')->nullable();
            $table->string('expense_reference')->nullable();
            $table->string('payment_method')->nullable();
            $table->longText('payment_proof_details')->nullable();
            $table->string('paid_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
