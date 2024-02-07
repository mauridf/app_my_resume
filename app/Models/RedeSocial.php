<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedeSocial extends Model
{
    use HasFactory;
    protected $table = 'redes_sociais';
    protected $fillable = ['rede_social'];

    public function pessoaRedesSociais() {
        return $this->hasMany('App\Models\PessoaRedeSocial');
    }
}
