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
      'day.required' => 'Obligatorio',
      'day.min' => 'Minimo 3 caracteres',
      'start_time.required' => 'Obligatorio',
      'departure_time.required' => 'Obligatorio',
      'shift.required' => 'Obligatorio',
      'shift.min' => 'Minimo 3 caracteres',
      'doctor_id.required' => 'Obligatorio',
      ];
    protected $perPage = 20;
    protected $fillable = ['day','start_time','departure_time','shift','doctor_id'];

    public function doctor()
    {
        return $this->hasOne('App\Models\Doctor', 'id', 'doctor_id');
    }
}
