<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuracao;
use App\Models\Pagina;
use Illuminate\Support\Facades\Log;

class ConfiguracoesController extends Controller
{
    //

    public function contato(){
        $configuracoes = Configuracao::first();
        return view("painel.configuracoes.contato", ["configuracoes" => $configuracoes]);
    }

    public function contato_salvar(Request $request){
        $configuracoes = Configuracao::first();

        $old = $configuracoes->getOriginal();

        $configuracoes->rua = $request->rua;
        $configuracoes->numero = $request->numero;
        $configuracoes->cep = $request->cep;
        $configuracoes->complemento = $request->complemento;
        $configuracoes->bairro = $request->bairro;
        $configuracoes->cidade = $request->cidade;
        $configuracoes->estado = $request->estado;
        $configuracoes->telefone = $request->telefone;
        $configuracoes->whatsapp = $request->whatsapp;
        $configuracoes->email = $request->email;
        $configuracoes->facebook = $request->facebook;
        $configuracoes->instagram = $request->instagram;
        $configuracoes->tiktok = $request->tiktok;
        $configuracoes->youtube = $request->youtube;
        $configuracoes->linkedin = $request->linkedin;
        $configuracoes->pinterest = $request->pinterest;
        $configuracoes->google_negocio = $request->google_negocio;

        $configuracoes->save();

        foreach($configuracoes->getChanges() as $campo => $valor){
            if(!in_array($campo, ["updated_at"])){
                Log::channel('configuracoes')->info('<b>EDITANDO CONFIGURAÇÕES</b>: O usuario <b>' . session()->get("usuario")["usuario"] . '</b> alterou o valor do campo <b>' . $campo . '</b> de <b>' . $old[$campo] . '</b> para <b>' . $valor . '</b>');
            }
        }


        toastr()->success("Informações de contato salvas com sucesso!");
        return redirect()->back();
    }

    public function seo(){
        $paginas = Pagina::all();
        return view("painel.configuracoes.seo", ["paginas" => $paginas]);
    }

    public function seo_salvar(Request $request, Pagina $pagina){
        $old = $pagina->getOriginal();

        $pagina->titulo = $request->titulo;
        $pagina->descricao = $request->descricao;
        $pagina->palavras = $request->palavras;
        $pagina->save();

        foreach($pagina->getChanges() as $campo => $valor){
            if(!in_array($campo, ["updated_at"])){
                Log::channel('configuracoes')->info('<b>EDITANDO PAGINA "'.$pagina->nome.'"</b>: O usuario <b>' . session()->get("usuario")["usuario"] . '</b> alterou o valor do campo <b>' . $campo . '</b> de <b>' . $old[$campo] . '</b> para <b>' . $valor . '</b>');
            }
        }
        
        toastr()->success("Alterações salvas com sucesso");
        return redirect()->back();
    }

    public function destaque_suspenso(){
        $configuracoes = Configuracao::first();
        return view("painel.configuracoes.destaque_suspenso", ["configuracoes" => $configuracoes]);
    }

    public function meios_pagamento(){
        $configuracoes = Configuracao::first();
        return view("painel.configuracoes.meios_pagamento", ["configuracoes" => $configuracoes]);
    }

    public function meios_pagamento_salvar(Request $request){
        $configuracoes = Configuracao::first();

        $configuracoes->min_valor_parcela_boleto = $request->min_valor_parcela_boleto;
        $configuracoes->max_parcelas_boleto = $request->max_parcelas_boleto;

        $configuracoes->min_valor_parcela_cartao = $request->min_valor_parcela_cartao;
        $configuracoes->max_parcelas_cartao = $request->max_parcelas_cartao;
        
        if($request->usar_configuracoes_gerais_pagamento){
            $configuracoes->usar_configuracoes_gerais_pagamento = true;
        }else{
            $configuracoes->usar_configuracoes_gerais_pagamento = false;
        }
        
        if($request->liberar_boleto){
            $configuracoes->liberar_boleto = true;
        }else{
            $configuracoes->liberar_boleto = false;
        }
        
        if($request->liberar_cartao){
            $configuracoes->liberar_cartao = true;
        }else{
            $configuracoes->liberar_cartao = false;
        }

        $configuracoes->save();

        toastr()->success("Configurações de pagamentos salvas.");
        return redirect()->back();
    }

}
