<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formacao extends Model
{
    use HasFactory;
    protected $table = 'formacoes'; 
    protected $fillable = ['formacao'];

    public function rules() {
        return [
            'formacao' => 'required|min:3'
        ];
    }

    public function feedback() {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'formacao.min' => 'O nome deve ter no mínimo 3 caracteres'
        ];
    }

    public function pessoaFormacao() {
        return $this->hasMany('App\Models\PessoaFormacao');
    }
}
