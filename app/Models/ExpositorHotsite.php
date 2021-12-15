<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpositorHotsite extends Model
{
    use HasFactory;

    public function parceiros(){
        return $this->hasMany(ExpositorHotsiteParceiro::class);
    }

    public function duvidas(){
        return $this->hasMany(ExpositorHotsiteDuvida::class);
    }

    public function fotos(){
        return $this->hasMany(ExpositorHotsiteFoto::class);
    }
}
