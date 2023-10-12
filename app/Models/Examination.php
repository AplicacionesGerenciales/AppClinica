<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Examination
 *
 * @property $id
 * @property $result
 * @property $type_examination_id
 * @property $medical_consultation_id
 * @property $created_at
 * @property $updated_at
 *
 * @property MedicalConsultation $medicalConsultation
 * @property TypeExamination $typeExamination
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Examination extends Model
{
    static $rules = [
		'result' => 'required',
		'type_examination_id' => 'required',
		'medical_consultation_id' => 'required',
    ];
    static $messages = [
        'result.required' => 'Obligatorio',
        'result.min' => 'Minimo 3 caracteres',
        'type_examination_id.required' => 'Obligatorio',
        'medical_consultation_id.required' => 'Obligatorio',
        ];
    protected $perPage = 20;
    protected $fillable = ['result','type_examination_id','medical_consultation_id'];

    public function medicalConsultation()
    {
        return $this->hasOne('App\Models\MedicalConsultation', 'id', 'medical_consultation_id');
    }
    public function typeExamination()
    {
        return $this->hasOne('App\Models\TypeExamination', 'id', 'type_examination_id');
    }
}
