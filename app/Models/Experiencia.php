<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    use HasFactory;
    protected $fillable = ['empresa','cargo','resumo_atividades','ano_mes_inicio','ano_mes_final'];

    public function pessoaExperiencia() {
        return $this->hasMany('App\Models\PessoaExperiencia');
    }

    public function experienciaSkill() {
        return $this->hasMany('App\Models\ExperienciaSkill');
    }
}
