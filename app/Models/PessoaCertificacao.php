<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaCertificacao extends Model
{
    use HasFactory;
    protected $fillable = ['pessoa_id','certificacao_id'];

    public function pessoa() {
        return $this->belongsTo('App\Models\Pessoa');
    }

    public function certificacao() {
        return $this->belongsTo('App\Models\Certificacao');
    }
}
