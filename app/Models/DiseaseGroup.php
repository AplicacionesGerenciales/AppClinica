<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DiseaseGroup
 *
 * @property $id
 * @property $disease_group_name
 * @property $description
 * @property $created_at
 * @property $updated_at
 *
 * @property Disease[] $diseases
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DiseaseGroup extends Model
{
    static $rules = [
		'disease_group_name' => 'required',
		'description' => 'required',
    ];
    static $messages = [
      'disease_group_name.required' => 'Obligatorio',
      'disease_group_name.min' => 'Minimo 3 caracteres',
      'description.required' => 'Obligatorio',
      'description.min' => 'Minimo 3 caracteres',
      ];
    protected $perPage = 20;
    protected $fillable = ['disease_group_name','description'];

    public function diseases()
    {
        return $this->hasMany('App\Models\Disease', 'disease_group_id', 'id');
    }
}
