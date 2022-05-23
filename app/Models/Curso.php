<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    public function professores(){
        return $this->belongsToMany(Professor::class, 'curso_professors');
    }

    public function modulos(){
        return $this->hasMany(Modulo::class);
    }

    public function depoimentos(){
        return $this->hasMany(CursoDepoimento::class);
    }

    public function cursos(){
        return $this->belongsToMany(Curso::class, "pacote_cursos", "pacote_id", "curso_id");
    }

    public function matriculas(){
        return $this->hasMany(Matricula::class);
    }
}
