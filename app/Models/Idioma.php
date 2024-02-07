<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    use HasFactory;
    protected $fillable = ['idioma'];

    public function pessoaIdiomas() {
        return $this->hasMany('App\Models\PessoaIdioma');
    }
}
