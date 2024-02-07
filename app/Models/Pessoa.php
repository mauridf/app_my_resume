<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;
    protected $fillable = ['nome','email','telefone','endereco','sexo','foto','sumario'];

    public function pessoaInteresses() {
        return $this->hasMany('App\Models\PessoaInteresse');
    }

    public function pessoaCertificacao() {
        return $this->hasMany('App\Models\PessoaCertificacao');
    }

    public function pessoaFormacao() {
        return $this->hasMany('App\Models\PessoaFormacao');
    }

    public function pessoaRedesSociais() {
        return $this->hasMany('App\Models\PessoaRedeSocial');
    }

    public function pessoaIdiomas() {
        return $this->hasMany('App\Models\PessoaIdioma');
    }

    public function pessoaSkill() {
        return $this->hasMany('App\Models\PessoaSkill');
    }

    public function pessoaExperiencia() {
        return $this->hasMany('App\Models\PessoaExperiencia');
    }
}
