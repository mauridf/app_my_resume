<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;
    protected $fillable = ['nome','email','telefone','endereco','sexo','imagem','sumario'];

    public function rules() {
        return [
            'nome' => 'required|min:3',
            'email' => 'required|email',
            'telefone' => 'required',
            'endereco' => 'required',
            'imagem' => 'required|file|mimes:png,jpeg,jpg'
        ];
    }

    public function feedback() {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'nome.min' => 'O nome deve ter no mínimo 3 caracteres',
            'email' => 'O campo dever possuir um e-mail válido',
            'imagem.mimes' => 'O arquivo deve ser uma imagem do tipo PNG ou JPG'
        ];
    }

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
