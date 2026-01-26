<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentDetailsInformationsTable extends Migration
{
    public function up()
    {
        Schema::create('student_details_informations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fathers_name');
            $table->string('mothers_name')->nullable();
            $table->string('fathers_nid')->nullable();
            $table->string('mothers_nid')->nullable();
            $table->string('guardian_name');
            $table->string('guardian_relation')->nullable();
            $table->string('guardian_contact_number');
            $table->string('student_birth_no')->nullable();
            $table->string('student_blood_group')->nullable();
            $table->string('address')->nullable();
            $table->string('id_card_delivery_status')->nullable();
            $table->longText('reference')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
