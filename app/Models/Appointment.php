<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Appointment
 *
 * @property $id
 * @property $date
 * @property $comment
 * @property $patient_id
 * @property $doctor_id
 * @property $appointment_status_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Doctor $doctor
 * @property Patient $patient
 * @property StatusAppointment $statusAppointment
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Appointment extends Model
{
    static $rules = [
		'date' => 'required',
		'comment' => 'required',
		'patient_id' => 'required',
		'doctor_id' => 'required',
		'appointment_status_id' => 'required',
    ];
    static $messages = [
        'date.required' => 'Obligatorio',
        'comment.required' => 'Obligatorio',
        'comment.min' => 'Minimo 3 caracteres',
        'patient_id.required' => 'Obligatorio',
        'doctor_id.required' => 'Obligatorio',
        'appointment_status_id.required' => 'Obligatorio',
        ];
    protected $perPage = 20;
    protected $fillable = ['date','comment','patient_id','doctor_id','appointment_status_id'];

    public function doctor()
    {
        return $this->hasOne('App\Models\Doctor', 'id', 'doctor_id');
    }
    public function patient()
    {
        return $this->hasOne('App\Models\Patient', 'id', 'patient_id');
    }
    public function statusAppointment()
    {
        return $this->hasOne('App\Models\StatusAppointment', 'id', 'appointment_status_id');
    }
}
