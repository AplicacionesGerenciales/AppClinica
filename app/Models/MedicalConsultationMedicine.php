<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MedicalConsultationMedicine
 *
 * @property $id
 * @property $dosage
 * @property $medical_consultation_id
 * @property $medicine_id
 * @property $created_at
 * @property $updated_at
 *
 * @property MedicalConsultation $medicalConsultation
 * @property Medicine $medicine
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MedicalConsultationMedicine extends Model
{
    static $rules = [
		'dosage' => 'required',
		'medical_consultation_id' => 'required',
		'medicine_id' => 'required',
    ];
    static $messages = [
        'dosage.required' => 'Obligatorio',
        'medical_consultation_id.required' => 'Obligatorio',
        'medicine_id.required' => 'Obligatorio',
        ];
    protected $perPage = 20;
    protected $fillable = ['dosage','medical_consultation_id','medicine_id'];

    public function medicalConsultation()
    {
        return $this->hasOne('App\Models\MedicalConsultation', 'id', 'medical_consultation_id');
    }
    public function medicine()
    {
        return $this->hasOne('App\Models\Medicine', 'id', 'medicine_id');
    }
}
