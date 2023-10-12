<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Patient
 *
 * @property $id
 * @property $name
 * @property $surname
 * @property $age
 * @property $gender
 * @property $identification_card
 * @property $phone
 * @property $birthdate
 * @property $address
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Appointment[] $appointments
 * @property File[] $files
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Patient extends Model
{
    static $rules = [
		'name' => 'required',
		'surname' => 'required',
		'age' => 'required',
		'gender' => 'required',
		'identification_card' => 'required',
		'phone' => 'required',
		'birthdate' => 'required',
		'address' => 'required',
		'user_id' => 'required',
    ];
    static $messages = [
        'name.required' => 'Obligatorio',
        'name.min' => 'Minimo 3 caracteres',
        'surname.required' => 'Obligatorio',
        'surname.min' => 'Minimo 3 caracteres',
        'phone.required' => 'Obligatorio',
        'phone.min' => 'Minimo 3 caracteres',
        'identification_card.required' => 'Obligatorio',
        'identification_card.min' => 'Minimo 3 caracteres',
        'gender.required' => 'Obligatorio',
        'gender.min' => 'Minimo 3 caracteres',
        'age.required' => 'Obligatorio',
        'birthdate.required' => 'Obligatorio',
        'address.required' => 'Obligatorio',
        'address.min' => 'Minimo 3 caracteres',
        ];
    protected $perPage = 20;
    protected $fillable = ['name','surname','age','gender','identification_card','phone','birthdate','address','user_id'];

    public function appointments()
    {
        return $this->hasMany('App\Models\Appointment', 'patient_id', 'id');
    }
    public function files()
    {
        return $this->hasMany('App\Models\File', 'patient_id', 'id');
    }
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
