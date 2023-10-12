<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DoctorNotification
 *
 * @property $id
 * @property $shipment_date
 * @property $message
 * @property $doctor_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Doctor $doctor
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DoctorNotification extends Model
{
    static $rules = [
		'shipment_date' => 'required',
		'message' => 'required',
		'doctor_id' => 'required',
    ];
    static $messages = [
      'shipment_date.required' => 'Obligatorio',
      'message.required' => 'Obligatorio',
      'message.min' => 'Minimo 3 caracteres',
      'doctor_id.required' => 'Obligatorio',
      ];
    protected $perPage = 20;
    protected $fillable = ['shipment_date','message','doctor_id'];

    public function doctor()
    {
        return $this->hasOne('App\Models\Doctor', 'id', 'doctor_id');
    }
}
