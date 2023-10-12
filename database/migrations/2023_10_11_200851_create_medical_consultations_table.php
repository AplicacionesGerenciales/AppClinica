<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_consultations', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('diagnostic');
            $table->string('symptoms');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('file_id');
            $table->unsignedBigInteger('disease_id');
            $table->string('blood_pressure');
            $table->string('temperature');
            $table->float('weight');
            $table->foreign('disease_id')->references('id')->on('diseases')->cascadeOnDelete('cascade')->cascadeOnUpdate('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->cascadeOnDelete('cascade')->cascadeOnUpdate('cascade');
            $table->foreign('file_id')->references('id')->on('files')->cascadeOnDelete('cascade')->cascadeOnUpdate('cascade');
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
        Schema::dropIfExists('medical_consultations');
    }
}
