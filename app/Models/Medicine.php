<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Medicine
 *
 * @property $id
 * @property $name
 * @property $presentation
 * @property $typeMedication
 * @property $created_at
 * @property $updated_at
 *
 * @property MedicalConsultationMedicine[] $medicalConsultationMedicines
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Medicine extends Model
{
    static $rules = [
		'name' => 'required',
		'presentation' => 'required',
		'typeMedication' => 'required',
    ];
    static $messages = [
      'name.required' => 'Obligatorio',
      'name.min' => 'Minimo 3 caracteres',
      'presentation.required' => 'Obligatorio',
      'presentation.min' => 'Minimo 3 caracteres',
      'typeMedication.required' => 'Obligatorio',
      'typeMedication.min' => 'Minimo 3 caracteres',
      ];
    protected $perPage = 20;
    protected $fillable = ['name','presentation','typeMedication'];

    public function medicalConsultationMedicines()
    {
        return $this->hasMany('App\Models\MedicalConsultationMedicine', 'medicine_id', 'id');
    }
}
