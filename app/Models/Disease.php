<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Disease
 *
 * @property $id
 * @property $name
 * @property $disease_group_id
 * @property $created_at
 * @property $updated_at
 *
 * @property DiseaseGroup $diseaseGroup
 * @property MedicalConsultation[] $medicalConsultations
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Disease extends Model
{
    static $rules = [
		'name' => 'required',
		'disease_group_id' => 'required',
    ];
    static $messages = [
        'name.required' => 'Obligatorio',
        'disease_group_id.required' => 'Obligatorio',
        ];

    protected $perPage = 20;
    protected $fillable = ['name','disease_group_id'];

    public function diseaseGroup()
    {
        return $this->hasOne('App\Models\DiseaseGroup', 'id', 'disease_group_id');
    }
    public function medicalConsultations()
    {
        return $this->hasMany('App\Models\MedicalConsultation', 'disease_id', 'id');
    }
}
