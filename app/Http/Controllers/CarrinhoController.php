<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Carrinho;
use App\Models\CarrinhoProduto;
use App\Models\Aluno;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\Venda;
use App\Classes\Cartao;
use App\Models\Configuracao;

class CarrinhoController extends Controller
{
    //

    public function adicionar(Curso $curso)
    {
        if (!session()->get("aluno")) {
            session()->put(["produto_adicionar" => url()->current()]);
            return redirect()->route("site.carrinho-identificacao");
        } else {
            if (session()->get("produto_adicionar")) {
                session()->forget("produto_adicionar");
            }
            if (!session()->get("carrinho")) {
                $carrinho = new Carrinho();
                $carrinho->aluno_id = session()->get("aluno")["id"];
                $carrinho->ultima_notificacao = date("Y-m-d");
                $carrinho->save();
                session()->put(["carrinho" => $carrinho->id]);
            } else {
                $carrinho = Carrinho::find(session()->get("carrinho"));
            }


            if ($carrinho->produtos->where("curso_id", $curso->id)->count() > 0) {
                return redirect()->route("site.carrinho-efetuar");
            }


            $produto = new CarrinhoProduto;
            $produto->carrinho_id = $carrinho->id;
            $produto->curso_id = $curso->id;
            $produto->total = $curso->valor;
            $produto->save();

            $carrinho->total += $produto->total;
            $carrinho->save();

            return redirect()->route("site.carrinho-efetuar");
        }
    }

    public function remover(Curso $curso)
    {
        $carrinho = Carrinho::find(session()->get("carrinho"));
        $produto = CarrinhoProduto::where([["carrinho_id", $carrinho->id], ["curso_id", $curso->id]]);
        $produto->delete();
        $carrinho->total -= $curso->valor;
        $carrinho->save();
        if ($carrinho->produtos->count() == 0) {
            $carrinho->delete();
            session()->forget("carrinho");
            return redirect()->route('site.index');
        }
        return redirect()->back();
    }

    public function identificacao(Curso $curso)
    {
        return view("site.carrinho-identificacao", ["curso" => $curso]);
    }

    public function identificar(Request $request, Curso $curso)
    {
        $aluno = Aluno::where("email", $request->email)->first();
        if ($aluno && Hash::check($request->senha, $aluno->senha)) {
            $aluno->ultimo_acesso = date("Y-m-d");
            $aluno->save();
            session()->put(["aluno" => $aluno->toArray()]);
            Log::channel('acessos')->info('LOGIN: O aluno ' . $aluno->nome . ' logou no sistema.');
            return redirect()->route('site.carrinho-efetuar', ['curso' => $curso]);
        } else {
            session()->flash("erro", "E-mail ou senha incorretos");
            return redirect()->back();
        }
    }

    public function pagamento_cartao(Curso $curso)
    {
        // if (!session()->get("carrinho")) {
        //     return redirect()->route('site.index');
        // }
        $configuracao = Configuracao::first();
        $parcelas = 0;
        for ($i = 1; (($curso->valor / $i > $configuracao->min_valor_parcela_cartao) && ($i <= $configuracao->max_parcelas_cartao)); $i++) {
            $parcelas++;
        }
        // $carrinho = Carrinho::find(session()->get("carrinho"));
        $aluno = Aluno::find(session()->get("aluno")["id"]);
        return view("site.carrinho-pagamento", ["forma" => "cartao", "curso" => $curso, "aluno" => $aluno, "configuracao" => $configuracao, "parcelas" => $parcelas]);
    }

    public function pagamento_boleto(Curso $curso)
    {
        // if (!session()->get("carrinho")) {
        //     return redirect()->route('site.index');
        // }
        $configuracao = Configuracao::first();
        // $carrinho = Carrinho::find(session()->get("carrinho"));
        $aluno = Aluno::find(session()->get("aluno")["id"]);
        return view("site.carrinho-pagamento", ["forma" => "boleto", "curso" => $curso, "aluno" => $aluno, "configuracao" => $configuracao]);
    }

    public function confirmacao()
    {
        if (session()->get("venda_finalizada")) {
            $venda = Venda::find(session()->get("venda_finalizada"));
            session()->forget("venda_finalizada");
            return view("site.carrinho-confirmacao", ["venda" => $venda]);
        } else {
            return redirect()->route("site.index");
        }
    }

    public function efetuar(Curso $curso)
    {
        if (!session()->get("aluno")) {
            return redirect()->route('site.carrinho-identificacao', ['curso' => $curso]);
        }
        $configuracao = Configuracao::first();
        // $carrinho = Carrinho::find(session()->get("carrinho"));
        $boleto = true;
        $cartao = true;
        if ($configuracao->usar_configuracoes_gerais_pagamento == true) {
            $boleto = $configuracao->liberar_boleto;
            $cartao = $configuracao->liberar_cartao;
        } else {
            // foreach ($carrinho->cursos as $curso) {
            //     if (!$curso->gerencianet) {
            //         $boleto = false;
            //     }
            //     if (!$curso->cielo) {
            //         $cartao = false;
            //     }
            // }

            if (!$curso->gerencianet) {
                $boleto = false;
            }
            if (!$curso->cielo) {
                $cartao = false;
            }
        }

        $aluno = Aluno::find(session()->get("aluno")["id"]);
        return view("site.carrinho-efetuar", ["curso" => $curso, "aluno" => $aluno, 'boleto' => $boleto, 'cartao' => $cartao, 'configuracao' => $configuracao]);
    }

    public function finalizar_boleto(Request $request)
    {
        return redirect()->route("site.carrinho.finalizar.boleto.gerencianet", ["parcelas" => $request->parcelas]);
    }

    // public function finalizar_cartao(Request $request){
    //     $cartao = new Cartao
    // }
}
