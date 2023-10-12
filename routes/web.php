<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function()
{
    
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('antecedents', \App\Http\Controllers\AntecedentController::class);
Route::resource('appointments', \App\Http\Controllers\AppointmentController::class);
Route::resource('diseases', \App\Http\Controllers\DiseaseController::class);
Route::resource('disease-groups', \App\Http\Controllers\DiseaseGroupController::class);
Route::resource('doctors', \App\Http\Controllers\DoctorController::class);
Route::resource('doctor-notifications', \App\Http\Controllers\DoctorNotificationController::class);
Route::resource('examinations', \App\Http\Controllers\ExaminationController::class);
Route::resource('files', \App\Http\Controllers\FileController::class);
Route::resource('medical-consultations', \App\Http\Controllers\MedicalConsultationController::class);
Route::resource('medical-consultation-medicines', \App\Http\Controllers\MedicalConsultationMedicineController::class);
Route::resource('medicines', \App\Http\Controllers\MedicineController::class);
Route::resource('patients', \App\Http\Controllers\PatientController::class);
Route::resource('schedules', \App\Http\Controllers\ScheduleController::class);
Route::resource('specialties', \App\Http\Controllers\SpecialtyController::class);
Route::resource('status-appointments', \App\Http\Controllers\StatusAppointmentController::class);
Route::resource('type-examinations', \App\Http\Controllers\TypeExaminationController::class);
});