<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    public function hotsite(){
        return $this->hasOne(ProfessorHotsite::class);
    }

    public function cursos(){
        return $this->belongsToMany(Curso::class, "curso_professors", "professor_id", "curso_id");
    }
}
