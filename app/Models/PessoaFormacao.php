<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaFormacao extends Model
{
    use HasFactory;
    protected $fillable = ['pessoa_id','formacao_id','nome_curso','instituicao_curso','ano_mes_inicio','ano_mes_final'];

    public function pessoa() {
        return $this->belongsTo('App\Models\Pessoa');
    }

    public function formacao() {
        return $this->belongsTo('App\Models\Formacao');
    }
}
