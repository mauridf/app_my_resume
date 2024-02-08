<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedeSocial extends Model
{
    use HasFactory;
    protected $table = 'redes_sociais';
    protected $fillable = ['rede_social'];

    public function rules() {
        return [
            'rede_social' => 'required'
        ];
    }

    public function feedback() {
        return [
            'required' => 'O campo :attribute é obrigatório'
        ];
    }

    public function pessoaRedesSociais() {
        return $this->hasMany('App\Models\PessoaRedeSocial');
    }
}
