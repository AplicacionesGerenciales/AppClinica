<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TypeExamination
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $created_at
 * @property $updated_at
 *
 * @property Examination[] $examinations
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TypeExamination extends Model
{
    
    static $rules = [
		'name' => 'required',
		'description' => 'required',
    ];
    static $messages = [
      'name.required' => 'Obligatorio',
      'name.min' => 'Minimo 3 caracteres',
      'description.required' => 'Obligatorio',
      'description.min' => 'Minimo 3 caracteres',
      ];
    protected $perPage = 20;
    protected $fillable = ['name','description'];

    public function examinations()
    {
        return $this->hasMany('App\Models\Examination', 'type_examination_id', 'id');
    }
}
