<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interesse extends Model
{
    use HasFactory;
    protected $fillable = ['interesse'];

    public function pessoaInteresses() {
        return $this->hasMany('App\Models\PessoaInteresse');
    }
}
