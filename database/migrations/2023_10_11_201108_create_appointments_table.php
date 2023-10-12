<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('comment');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('appointment_status_id');
            $table->foreign('doctor_id')->references('id')->on('doctors')->cascadeOnDelete('cascade')->cascadeOnUpdate('cascade');
            $table->foreign('patient_id')->references('id')->on('patients')->cascadeOnDelete('cascade')->cascadeOnUpdate('cascade');
            $table->foreign('appointment_status_id')->references('id')->on('status_appointments')->cascadeOnDelete('cascade')->cascadeOnUpdate('cascade');
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
        Schema::dropIfExists('appointments');
    }
}
