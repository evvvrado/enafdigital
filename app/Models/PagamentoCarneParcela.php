<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagamentoCarneParcela extends Model
{
    use HasFactory;

    public function carne(){
        return $this->belongsTo(PagamentoCarne::class);
    }
}
