<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    use HasFactory;
    protected $fillable = ['empresa','cargo','resumo_atividades','ano_mes_inicio','ano_mes_final'];

    public function rules() {
        return [
            'empresa' => 'required|min:3',
            'cargo' => 'required'
        ];
    }

    public function feedback() {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'empresa.min' => 'O nome deve ter no mínimo 3 caracteres'
        ];
    }

    public function pessoaExperiencia() {
        return $this->hasMany('App\Models\PessoaExperiencia');
    }

    public function experienciaSkill() {
        return $this->hasMany('App\Models\ExperienciaSkill');
    }
}
