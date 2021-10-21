<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagamentoCarne extends Model
{
    use HasFactory;

    public function venda(){
        return $this->belongsTo(Venda::class);
    }

    public function parcelas(){
        return $this->hasMany(PagamentoCarneParcela::class);
    }
}
