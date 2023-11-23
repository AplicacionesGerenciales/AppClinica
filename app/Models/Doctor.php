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
        'name.required' => 'Nombre es requerido',
        'name.min' => 'Mínimo 3 caracteres',
        'lastname.required' => 'Apellido es requerido',
        'lastname.min' => 'Mínimo 3 caracteres',
        'phone.required' => 'Telèfono es requerido',
        'phone.min' => 'Mínimo 3 caracteres',
        'identity_card.required' => 'Cèdula es requerido',
        'identity_card.min' => 'Mínimo 3 caracteres',
        'gender.required' => 'Obligatorio',
        'gender.min' => 'Mínimo 3 caracteres',
        'inss.required' => 'INSS es requerido',
        'inss.min' => 'Mínimo 3 caracteres',
        'identity_card.unique' => 'El número de cédula ya está en uso.', 
        'inss.unique' => 'El número de INSS ya está en uso.', 
        'specialty_id.required' => 'Especialidad es requerido',
        'user_id.required' => 'id usuario es requerido',
        'user_id.unique' => 'Ya existe un doctor con ese ID de usuario.', 
        'user_id.exists' => 'El ID del usuario no existe en la base de datos.', 
    ];
    protected $perPage = 20;
    protected $fillable = ['name','lastname','phone','identity_card','gender','inss','specialty_id','user_id'];

    public function specialty()
    {
        return $this->hasOne('App\Models\Specialty', 'id', 'specialty_id');
    }
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}