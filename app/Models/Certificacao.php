<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificacao extends Model
{
    use HasFactory;
    protected $table = 'certificacoes';
    protected $fillable = ['titulo','instituicao','descricao'];

    public function rules() {
        return [
            'titulo' => 'required|min:3'
        ];
    }

    public function feedback() {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'titulo.min' => 'O nome deve ter no mínimo 3 caracteres'
        ];
    }

    public function pessoaCertificacao() {
        return $this->hasMany('App\Models\PessoaCertificacao');
    }
}
