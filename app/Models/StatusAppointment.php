<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class StatusAppointment
 *
 * @property $id
 * @property $state
 * @property $address
 * @property $created_at
 * @property $updated_at
 *
 * @property Appointment[] $appointments
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class StatusAppointment extends Model
{
    
    static $rules = [
		'state' => 'required',
		'address' => 'required',
    ];
    static $messages = [
      'state.required' => 'Obligatorio',
      'state.min' => 'Minimo 3 caracteres',
      'address.required' => 'Obligatorio',
      'address.min' => 'Minimo 3 caracteres',
      ];
    protected $perPage = 20;
    protected $fillable = ['state','address'];

    public function appointments()
    {
        return $this->hasMany('App\Models\Appointment', 'appointment_status_id', 'id');
    }
}
