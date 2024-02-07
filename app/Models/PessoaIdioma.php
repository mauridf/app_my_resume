<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaIdioma extends Model
{
    use HasFactory;
    protected $table = 'pessoa_idiomas';
    protected $fillable = ['pessoa_id','idioma_id','nivel_idioma_id'];

    public function pessoa() {
        return $this->belongsTo('App\Models\Pessoa');
    }

    public function idioma() {
        return $this->belongsTo('App\Models\Idioma');
    }

    public function Nivelidioma() {
        return $this->belongsTo('App\Models\NivelIdioma');
    }
}
