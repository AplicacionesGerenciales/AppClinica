<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Antecedent
 *
 * @property $id
 * @property $antecedent_description
 * @property $file_id
 * @property $created_at
 * @property $updated_at
 *
 * @property File $file
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Antecedent extends Model
{
    static $rules = [
		'antecedent_description' => 'required',
		'file_id' => 'required',
    ];
    static $messages = [
      'antecedent_description.required' => 'Obligatorio',
      'antecedent_description.min' => 'Minimo 3 caracteres',
      'file_id.required' => 'Obligatorio',
      ];
    protected $perPage = 20;
    protected $fillable = ['antecedent_description','file_id'];

    public function file()
    {
        return $this->hasOne('App\Models\File', 'id', 'file_id');
    }
}
