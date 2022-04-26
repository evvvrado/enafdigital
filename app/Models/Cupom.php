<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupom extends Model
{
    use HasFactory;

    public function cupom_produtos(){
        return $this->hasMany(CupomProduto::class);
    }
}
