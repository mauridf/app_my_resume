<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interesse extends Model
{
    use HasFactory;
    protected $fillable = ['interesse'];

    public function rules() {
        return [
            'interesse' => 'required|min:3'
        ];
    }

    public function feedback() {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'interesse.min' => 'O nome deve ter no mínimo 3 caracteres'
        ];
    }

    public function pessoaInteresses() {
        return $this->hasMany('App\Models\PessoaInteresse');
    }
}
