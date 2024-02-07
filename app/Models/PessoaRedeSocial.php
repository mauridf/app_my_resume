<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaRedeSocial extends Model
{
    use HasFactory;
    protected $table = 'pessoa_redes_sociais';
    protected $fillable = ['pessoa_id','redes_sociais_id','link'];

    public function pessoa() {
        return $this->belongsTo('App\Models\Pessoa');
    }

    public function redesSociais() {
        return $this->belongsTo('App\Models\RedeSocial');
    }
}
