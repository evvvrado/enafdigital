<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;

class VendasController extends Controller
{
    //
    //
    public function consultar(){
        $vendas = Venda::all();
        return view("painel.vendas.consultar", ["vendas" => $vendas]);
    }
}
