<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MedicalConsultation
 *
 * @property $id
 * @property $date
 * @property $diagnostic
 * @property $symptoms
 * @property $doctor_id
 * @property $file_id
 * @property $disease_id
 * @property $blood_pressure
 * @property $temperature
 * @property $weight
 * @property $created_at
 * @property $updated_at
 *
 * @property Disease $disease
 * @property Doctor $doctor
 * @property Examination[] $examinations
 * @property File $file
 * @property MedicalConsultationMedicine[] $medicalConsultationMedicines
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MedicalConsultation extends Model
{
    static $rules = [
		'date' => 'required',
		'diagnostic' => 'required',
		'symptoms' => 'required',
		'doctor_id' => 'required',
		'file_id' => 'required',
		'disease_id' => 'required',
		'blood_pressure' => 'required',
		'temperature' => 'required',
		'weight' => 'required',
    ];
    static $messages = [
        'date.required' => 'Obligatorio',
        'diagnostic.required' => 'Obligatorio',
        'diagnostic.min' => 'Minimo 3 caracteres',
        'symptoms.required' => 'Obligatorio',
        'symptoms.min' => 'Minimo 3 caracteres',
        'blood_pressure.required' => 'Obligatorio',
        'blood_pressure.min' => 'Minimo 3 caracteres',
        'temperature.required' => 'Obligatorio',
        'temperature.min' => 'Minimo 3 caracteres',
        'disease_id.required' => 'Obligatorio',
        'doctor_id.required' => 'Obligatorio',
        'file_id.required' => 'Obligatorio',
        ];
    protected $perPage = 20;
    protected $fillable = ['date','diagnostic','symptoms','doctor_id','file_id','disease_id','blood_pressure','temperature','weight'];

    public function disease()
    {
        return $this->hasOne('App\Models\Disease', 'id', 'disease_id');
    }
    public function doctor()
    {
        return $this->hasOne('App\Models\Doctor', 'id', 'doctor_id');
    }
    public function examinations()
    {
        return $this->hasMany('App\Models\Examination', 'medical_consultation_id', 'id');
    }
    public function file()
    {
        return $this->hasOne('App\Models\File', 'id', 'file_id');
    }
    public function medicalConsultationMedicines()
    {
        return $this->hasMany('App\Models\MedicalConsultationMedicine', 'medical_consultation_id', 'id');
    }
}
