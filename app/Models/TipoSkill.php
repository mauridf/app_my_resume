<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoSkill extends Model
{
    use HasFactory;
    protected $table = 'tipo_skills';
    protected $fillable = ['tipo_skill'];

    public function rules() {
        return [
            'tipo_skill' => 'required'
        ];
    }

    public function feedback() {
        return [
            'required' => 'O campo :attribute é obrigatório'
        ];
    }

    public function skill() {
        return $this->hasMany('App\Models\Skill');
    }
}
