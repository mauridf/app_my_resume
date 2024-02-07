<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaExperiencia extends Model
{
    use HasFactory;
    protected $fillable = ['pessoa_id','experiencia_id'];

    public function pessoa() {
        return $this->belongsTo('App\Models\Pessoa');
    }

    public function experiencia() {
        return $this->belongsTo('App\Models\Experiencia');
    }
}
