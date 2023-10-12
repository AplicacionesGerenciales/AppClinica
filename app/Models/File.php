<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class File
 *
 * @property $id
 * @property $file_number
 * @property $message
 * @property $patient_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Antecedent[] $antecedents
 * @property MedicalConsultation[] $medicalConsultations
 * @property Patient $patient
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class File extends Model
{
    static $rules = [
		'file_number' => 'required',
		'message' => 'required',
		'patient_id' => 'required',
    ];
    static $messages = [
        'file_number.required' => 'Obligatorio',
        'file_number.min' => 'Minimo 3 caracteres',
        'message.required' => 'Obligatorio',
        'message.min' => 'Minimo 3 caracteres',
        'patient_id.required' => 'Obligatorio',
        ];
    protected $perPage = 20;
    protected $fillable = ['file_number','message','patient_id'];

    public function antecedents()
    {
        return $this->hasMany('App\Models\Antecedent', 'file_id', 'id');
    }
    public function medicalConsultations()
    {
        return $this->hasMany('App\Models\MedicalConsultation', 'file_id', 'id');
    }
    public function patient()
    {
        return $this->hasOne('App\Models\Patient', 'id', 'patient_id');
    }
}
