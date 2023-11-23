<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Schedule
 *
 * @property $id
 * @property $day
 * @property $start_time
 * @property $departure_time
 * @property $shift
 * @property $doctor_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Doctor $doctor
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Schedule extends Model
{
  static $rules = [
    'day' => 'required',
    'start_time' => 'required',
    'departure_time' => 'required',
    'shift' => 'required',
    'doctor_id' => 'required',
];

static $messages = [
  'day.required' => 'Dìa es requerido',
  'day.min' => 'Dìa - Mínimo 3 caracteres',
  'start_time.required' => 'Hora Inicio es requerido',
  'departure_time.required' => 'Hora salida es requerido',
  'shift.required' => 'Cambio es requerido',
  'shift.min' => 'Mínimo 3 caracteres',
  'doctor_id.required' => 'Id Doctor es requerido',
];

    protected $perPage = 20;
    protected $fillable = ['day','start_time','departure_time','shift','doctor_id'];    
}





