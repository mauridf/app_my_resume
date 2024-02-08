<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    use HasFactory;
    protected $fillable = ['idioma'];

    public function rules() {
        return [
            'idioma' => 'required|min:3'
        ];
    }

    public function feedback() {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'idioma.min' => 'O nome deve ter no mínimo 3 caracteres'
        ];
    }

    public function pessoaIdiomas() {
        return $this->hasMany('App\Models\PessoaIdioma');
    }
}
