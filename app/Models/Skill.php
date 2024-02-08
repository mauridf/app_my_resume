<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $fillable = ['tipo_skill_id','tecnologia','porcentagem_conhecimento'];

    public function rules() {
        return [
            'tecnologia' => 'required',
            'porcentagem_conhecimento' => 'required'
        ];
    }

    public function feedback() {
        return [
            'required' => 'O campo :attribute é obrigatório'
        ];
    }

    public function pessoaSkill() {
        return $this->hasMany('App\Models\PessoaSkill');
    }

    public function tipoSkills() {
        return $this->belongsTo('App\Models\TipoSkill');
    }
}
