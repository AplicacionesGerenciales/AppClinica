<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalConsultationMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_consultation_medicines', function (Blueprint $table) {
            $table->id();
            $table->string('dosage');
            $table->unsignedBigInteger('medical_consultation_id');
            $table->foreign('medical_consultation_id')->references('id')->on('medical_consultations');
            $table->unsignedBigInteger('medicine_id');
            $table->foreign('medicine_id')->references('id')->on('medicines');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_consultation_medicines');
    }
}
