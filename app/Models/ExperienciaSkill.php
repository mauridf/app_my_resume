<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienciaSkill extends Model
{
    use HasFactory;
    protected $fillable = ['experiencia_id','skill_id'];

    public function experiencia() {
        return $this->belongsTo('App\Models\Experiencia');
    }

    public function skill() {
        return $this->belongsTo('App\Models\Skill');
    }
}
