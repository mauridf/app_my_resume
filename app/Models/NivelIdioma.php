<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelIdioma extends Model
{
    use HasFactory;
    protected $table = 'nivel_idiomas';
    protected $fillable = ['nivel_idioma'];

    public function rules() {
        return [
            'nivel_idioma' => 'required|min:3'
        ];
    }

    public function feedback() {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'nivel_idioma.min' => 'O nome deve ter no mínimo 3 caracteres'
        ];
    }

    public function pessoaIdiomas() {
        return $this->hasMany('App\Models\PessoaIdioma');
    }
}
