<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $fillable = ['tipo_skill_id','tecnologia','porcentagem_conhecimento'];

    public function pessoaSkill() {
        return $this->hasMany('App\Models\PessoaSkill');
    }

    public function tipoSkills() {
        return $this->belongsTo('App\Models\TipoSkill');
    }
}
