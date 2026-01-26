<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('emloyee_code');
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->datetime('joining_date')->nullable();
            $table->boolean('status')->default(0);
            $table->string('salary_type')->nullable();
            $table->decimal('salary_amount', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
