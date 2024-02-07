<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificacao extends Model
{
    use HasFactory;
    protected $table = 'certificacoes';
    protected $fillable = ['titulo','instituicao','descricao'];

    public function pessoaCertificacao() {
        return $this->hasMany('App\Models\PessoaCertificacao');
    }
}
