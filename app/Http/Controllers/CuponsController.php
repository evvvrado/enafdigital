<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CuponsController extends Controller
{
    //

    public function consultar(){
        return view("painel.cupons.consultar");
    }
}
