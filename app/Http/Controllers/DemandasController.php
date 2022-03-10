<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demanda;


class DemandasController extends Controller
{
    //
    public function consultar(){
        return view("painel.demandas.consultar");
    }

}
