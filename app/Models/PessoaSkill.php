<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaSkill extends Model
{
    use HasFactory;
    protected $table = 'pessoa_skills';
    protected $fillable = ['pessoa_id','skill_id'];

    public function pessoa() {
        return $this->belongsTo('App\Models\Pessoa');
    }

    public function skills() {
        return $this->belongsTo('App\Models\Skill');
    }
}
