<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Specialty
 *
 * @property $id
 * @property $specialty
 * @property $description
 * @property $created_at
 * @property $updated_at
 *
 * @property Doctor[] $doctors
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Specialty extends Model
{
    static $rules = [
		'specialty' => 'required',
		'description' => 'required',
    ];
    static $messages = [
      'specialty.required' => 'Obligatorio',
      'specialty.min' => 'Minimo 3 caracteres',
      'description.required' => 'Obligatorio',
      'description.min' => 'Minimo 3 caracteres',
      ];
    protected $perPage = 20;
    protected $fillable = ['specialty','description'];

    public function doctors()
    {
        return $this->hasMany('App\Models\Doctor', 'specialty_id', 'id');
    }
}
