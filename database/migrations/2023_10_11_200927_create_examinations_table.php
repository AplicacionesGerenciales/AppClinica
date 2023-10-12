<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExaminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examinations', function (Blueprint $table) {
            $table->id();
            $table->string('result');
            $table->unsignedBigInteger('type_examination_id');
            $table->foreign('type_examination_id')->references('id')->on('type_examinations')->cascadeOnDelete('cascade')->cascadeOnUpdate('cascade');
            $table->unsignedBigInteger('medical_consultation_id');
            $table->foreign('medical_consultation_id')->references('id')->on('medical_consultations')->cascadeOnDelete('cascade')->cascadeOnUpdate('cascade');
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
        Schema::dropIfExists('examinations');
    }
}
