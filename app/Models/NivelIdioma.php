<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelIdioma extends Model
{
    use HasFactory;
    protected $table = 'nivel_idiomas';
    protected $fillable = ['nivel_idioma'];

    public function pessoaIdiomas() {
        return $this->hasMany('App\Models\PessoaIdioma');
    }
}
