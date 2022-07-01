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

    public function cancelar(){
        if($venda->forma == 0){
            $venda->boleto->status = "canceled";
            $venda->save();
        }elseif($venda->forma == 1){
            if($venda->gateway == 1){
                $venda->cartao->status = 2;
                $venda->save();
            }else{
                if ($venda->cartao){
                    $venda->cartao->status = 6;
                    $venda->save();
                }
            }
        }else{
            if($venda->carne && $venda->carne->parcelas > 0){
                foreach($venda->carne->parcelas as $parcela){
                    $parcela->status = "canceled";
                    $parcela->save();
                }
            }   
        }

        toastr()->success("Pagamento marcado como cancelado!");
        return redirect()->back();
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
