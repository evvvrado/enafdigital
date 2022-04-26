<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CupomProduto extends Model
{
    use HasFactory;

    public function curso(){
        return $this->belongsTo(Curso::class);
    }

    public function evento(){
        return $this->belongsTo(Evento::class);
    }
}
