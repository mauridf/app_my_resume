<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaInteresse extends Model
{
    use HasFactory;
    protected $fillable = ['pessoa_id','interesse_id'];

    public function pessoa() {
        return $this->belongsTo('App\Models\Pessoa');
    }

    public function interesse() {
        return $this->belongsTo('App\Models\Interesse');
    }
}
