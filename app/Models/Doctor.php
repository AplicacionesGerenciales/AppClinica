<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Doctor
 *
 * @property $id
 * @property $name
 * @property $lastname
 * @property $phone
 * @property $identity_card
 * @property $gender
 * @property $inss
 * @property $specialty_id
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Appointment[] $appointments
 * @property MedicalConsultation[] $medicalConsultations
 * @property Notification[] $notifications
 * @property Schedule[] $schedules
 * @property Specialty $specialty
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Doctor extends Model
{
    static $rules = [
		'name' => 'required',
		'lastname' => 'required',
		'phone' => 'required',
		'identity_card' => 'required',
		'gender' => 'required',
		'inss' => 'required',
		'specialty_id' => 'required',
		'user_id' => 'required',
    ];
    static $messages = [
        'name.required' => 'Obligatorio',
        'name.min' => 'Minimo 3 caracteres',
        'lastname.required' => 'Obligatorio',
        'lastname.min' => 'Minimo 3 caracteres',
        'phone.required' => 'Obligatorio',
        'phone.min' => 'Minimo 3 caracteres',
        'identity_card.required' => 'Obligatorio',
        'identity_card.min' => 'Minimo 3 caracteres',
        'gender.required' => 'Obligatorio',
        'gender.min' => 'Minimo 3 caracteres',
        'inss.required' => 'Obligatorio',
        'inss.min' => 'Minimo 3 caracteres',
        'specialty_id.required' => 'Obligatorio',
        'user_id.required' => 'Obligatorio',
        ];
    protected $perPage = 20;

    protected $fillable = ['name','lastname','phone','identity_card','gender','inss','specialty_id','user_id'];

    public function appointments()
    {
        return $this->hasMany('App\Models\Appointment', 'doctor_id', 'id');
    }
    public function medicalConsultations()
    {
        return $this->hasMany('App\Models\MedicalConsultation', 'doctor_id', 'id');
    }
    public function notifications()
    {
        return $this->hasMany('App\Models\Notification', 'doctor_id', 'id');
    }
    public function schedules()
    {
        return $this->hasMany('App\Models\Schedule', 'doctor_id', 'id');
    }
    public function specialty()
    {
        return $this->hasOne('App\Models\Specialty', 'id', 'specialty_id');
    }
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
