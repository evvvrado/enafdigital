<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;

class PagamentosController extends Controller
{
    //
    public function vendas()
    {
        $vendas = Venda::all();
        return view("painel.pagamentos.vendas", ["vendas" => $vendas]);
    }


    public function mapa()
    {
        return view("painel.mapa.mapa");
    }


    public function venda(Venda $venda)
    {
        return view("painel.pagamentos.visualizar", ["venda" => $venda]);
    }
}
