<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    use HasFactory;

    public function aluno(){
        return $this->belongsTo(Aluno::class);
    }

    public function produtos(){
        return $this->hasMany(CarrinhoProduto::class);
    }

    public function cursos(){
        return $this->belongsToMany(Curso::class, 'carrinho_produtos');
    }
}
