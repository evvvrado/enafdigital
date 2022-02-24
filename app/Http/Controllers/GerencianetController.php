<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Gerencianet\GerencianetRequisicaoBoleto;
use App\Classes\Gerencianet\GerencianetRequisicaoCartao;
use Illuminate\Support\Facades\Log;
use App\Models\Carrinho;
use App\Models\CarrinhoProduto;
use App\Models\Aluno;
use App\Models\Venda;
use App\Models\Curso;
use App\Models\PagamentoBoleto;
use App\Models\PagamentoCarne;
use App\Models\PagamentoCarneParcela;
use App\Models\PagamentoCartao;
use App\Models\Matricula;
use App\Classes\Util;

class GerencianetController extends Controller
{
    //
    public function boleto(Request $request, Curso $curso)
    {
        $gerencianet = new GerencianetRequisicaoBoleto();
        // $carrinho = Carrinho::find(session()->get("carrinho"));
        $aluno = Aluno::find(session()->get("aluno")["id"]);
        if ($request->parcelas == 1) {
            $desconto = 1000;
        } else {
            $desconto = 0;
        }
        // $gerencianet->enviarBoletoEmail(1334034, 'gusouza980@gmail.com');
        $turmas = [];
        // foreach ($carrinho->produtos as $produto) {
            // $produto->turma->inscritos += 1;
            // $produto->turma->save();
        $gerencianet->addItem([
            'name' => $curso->titulo, // nome do item, produto ou serviço
            'amount' => 1, // quantidade
            'value' => intval($curso->valor * 100)
        ]);
        // }

        $cpf = str_replace(".", "", $aluno->cpf);
        $cpf = str_replace("-", "", $cpf);
        $telefone = str_replace("(", "", $aluno->telefone);
        $telefone = str_replace(")", "", $telefone);
        $telefone = str_replace("-", "", $telefone);
        $telefone = str_replace(" ", "", $telefone);

        $gerencianet->addCustomer([
            'name' => $aluno->nome, // nome do cliente
            'cpf' => $cpf, // cpf válido do cliente
            'phone_number' => $telefone, // telefone do cliente
        ]);

        if ($request->parcelas == 1) {
            $gerencianet->addDesconto([
                'type' => 'percentage',
                'value' => $desconto
            ]);
            $gerencianet->addBoleto([
                'expire_at' => date("Y-m-d", strtotime("+15 days")), // data de vencimento do titulo
                'message' => 'Acompanhe o status do seu pagamento no seu painel do cliente.', // mensagem a ser exibida no boleto
            ]);
            $res = $gerencianet->gerarBoleto();
            Log::channel('boletos')->info('BOLETO GERADO:' . json_encode($res));
        } else {
            $gerencianet->addParcelas($request->parcelas);
            $res = $gerencianet->gerarCarne();
            Log::channel('boletos')->info('CARNÊ GERADO:' . json_encode($res));
        }

        if ($res["code"] == 200) {

            $desconto = $desconto / 100;

            $carrinho = new Carrinho();
            $carrinho->aluno_id = session()->get("aluno")["id"];
            $carrinho->ultima_notificacao = date("Y-m-d");
            $carrinho->save();

            $produto = new CarrinhoProduto;
            $produto->carrinho_id = $carrinho->id;
            $produto->curso_id = $curso->id;
            $produto->total = $curso->valor;
            $produto->save();

            $carrinho->total += $produto->total;
            $carrinho->save();

            $venda = new Venda;
            $venda->aluno_id = $aluno->id;
            $venda->carrinho_id = $carrinho->id;
            $venda->codigo = date("Ymd") . str_pad(random_int(1, 99999999), 8, "0", STR_PAD_LEFT);
            $venda->total = $carrinho->total - ($carrinho->total * $desconto / 100);
            $venda->status = 0;
            $venda->gateway = 0;
            $venda->parcelas = $request->parcelas;
            if ($request->parcelas > 1) {
                $venda->forma = 2;
            } else {
                $venda->forma = 0;
            }
            $venda->valor_parcela = number_format($venda->total / $request->parcelas, 2, ".", "");
            $venda->desconto = ($carrinho->total * $desconto / 100);
            $venda->save();
            Log::channel('boletos')->info('VENDA GERADA:' . json_encode($res));

            if ($request->parcelas == 1) {
                $boleto = new PagamentoBoleto;
                $boleto->venda_id = $venda->id;
                $boleto->charge_id = $res["data"]["charge_id"];
                $boleto->codigo_barra = $res["data"]["barcode"];
                $boleto->link = $res["data"]["link"];
                if (isset($res["data"]["pdf"]) && isset($res["data"]["pdf"]["charge"])) {
                    $boleto->pdf = $res["data"]["pdf"]["charge"];
                }
                $boleto->expira = $res["data"]["expire_at"];
                $boleto->status = $res["data"]["status"];
                $boleto->total = $res["data"]["total"];
                $boleto->save();
                $gerencianet->enviarBoletoEmail($boleto->charge_id, $aluno->email);
                Log::channel('boletos')->info('PAGAMENTO POR BOLETO GERADO:' . json_encode($res));
            } else {
                $carne = new PagamentoCarne;
                $carne->venda_id = $venda->id;
                $carne->carnet_id = $res["data"]["carnet_id"];
                $carne->status = $res["data"]["status"];
                $carne->link = $res["data"]["pdf"]["carnet"];
                $carne->save();
                Log::channel('boletos')->info('PAGAMENTO POR CARNÊ GERADO:' . json_encode($res));

                foreach ($res["data"]["charges"] as $charge) {
                    $parcela = new PagamentoCarneParcela;
                    $parcela->pagamento_carne_id = $carne->id;
                    $parcela->charge_id = $charge["charge_id"];
                    $parcela->parcela = $charge["parcel"];
                    $parcela->status = $charge["status"];
                    $parcela->valor = $charge["value"] / 100;
                    $parcela->data_expiracao = $charge["expire_at"];
                    $parcela->link = $charge["pdf"]["charge"];
                    $parcela->save();
                }

                Log::channel('boletos')->info('PARCELAS DO CARNÊ GERADOS:' . json_encode($res));
            }
            $carrinho->aberto = false;
            $carrinho->save();
            session()->forget("carrinho");
            session()->put(["venda_finalizada" => $venda->id]);
            return redirect()->route("site.carrinho-confirmacao");
        } else {
            // foreach ($carrinho->produtos as $produto) {
            //     $produto->turma->inscritos -= 1;
            //     $produto->turma->save();
            // }
            Log::channel('boletos')->error('ERRO:' . json_encode($res));
            session()->flash("erro", "Problema na finalização da compra. Tente novamente mais tarde.");
            return redirect()->route("site.carrinho.pagamento.boleto");
        }
    }

    public function credito(Request $request, Curso $curso){
        dd($request->payment_token);
        $aluno = Aluno::find(session()->get("aluno")["id"]);
        $gerencianet = new GerencianetRequisicaoCartao();

        $gerencianet->addItem([
            'name' => $curso->nome, // nome do item, produto ou serviço
            'amount' => 1, // quantidade
            'value' => intval($curso->valor * 100)
        ]);

        $gerencianet->addParcelas($request->parcelas);

        $gerencianet->setPaymentToken($request->payment_token);

        $gerencianet->addCustomer([
            'name' => $aluno->nome,
            'cpf' => Util::limparString($aluno->cpf),
            'phone_number' => Util::limparString($aluno->telefone),
            'email' => $aluno->email,
            'birth' => $aluno->nascimento
        ]);

        $gerencianet->addBillingAddress([
            'street' => $aluno->rua,
            'number' => 190,
            'neighborhood' => $aluno->bairro,
            'zipcode' => Util::limparString($aluno->cep),
            'city' => $aluno->cidade,
            'state' => $aluno->estado
        ]);

        // $gerencianet->addDesconto([
        //     'type' => 'percentage',
        //     'value' => 0
        // ]);

        $res = $gerencianet->efetuarPagamento();

        if ($res["code"] == 200) {
            $carrinho = new Carrinho();
            $carrinho->aluno_id = session()->get("aluno")["id"];
            $carrinho->ultima_notificacao = date("Y-m-d");
            $carrinho->save();

            $produto = new CarrinhoProduto;
            $produto->carrinho_id = $carrinho->id;
            $produto->curso_id = $curso->id;
            $produto->total = $curso->valor;
            $produto->save();

            $carrinho->total += $produto->total;
            $carrinho->save();

            $venda = new Venda;
            $venda->aluno_id = $aluno->id;
            $venda->carrinho_id = $carrinho->id;
            $venda->codigo = date("Ymd") . str_pad($carrinho->id, 8, "0", STR_PAD_LEFT);
            $venda->total = $carrinho->total;
            $venda->status = config("gerencianet.status_code")[$res["data"]["status"]];
            $venda->gateway = 0;
            $venda->parcelas = $request->parcelas;
            $venda->forma = 1;
            $venda->valor_parcela = number_format($venda->total / $request->parcelas, 2, ".", "");
            $venda->desconto = 0;
            $venda->save();
            Log::channel('cartao')->info('VENDA GERADA (GERENCIANET):' . json_encode($res));

            $pagamento = new PagamentoCartao;
            $pagamento->venda_id = $venda->id;
            $pagamento->status = config("gerencianet.status_code")[$res["data"]["status"]];
            $pagamento->codigo = $res["data"]["charge_id"];
            $pagamento->gateway = 0;
            $pagamento->save();

            foreach ($venda->carrinho->produtos as $produto) {
                if (!$produto->curso->pacote) {
                    $matricula = new Matricula;
                    $matricula->aluno_id = $venda->aluno_id;
                    $matricula->curso_id = $produto->curso_id;
                    $matricula->save();
                } else {
                    foreach ($produto->curso->cursos as $curso) {
                        $matricula = new Matricula;
                        $matricula->aluno_id = $venda->aluno_id;
                        $matricula->curso_id = $curso->id;
                        $matricula->save();
                    }
                }
            }
            $carrinho->aberto = false;
            $carrinho->save();
            session()->put(["venda_finalizada" => $venda->id]);
            return redirect()->route("site.carrinho-confirmacao");
        } else {
            // foreach ($carrinho->produtos as $produto) {
            //     $produto->turma->inscritos -= 1;
            //     $produto->turma->save();
            // }
            Log::channel('cartao')->error('ERRO (GERENCIANET:' . json_encode($res));
            session()->flash("erro", "Problema na finalização da compra. Tente novamente mais tarde.");
            return redirect()->route("site.carrinho.pagamento.cartao", ['curso' => $curso]);
        }

    }

    public function alterar_vencimento(PagamentoBoleto $boleto, Request $request)
    {
        // dd($request->all());
        $gerencianet = new GerencianetRequisicaoBoleto();
        $res = $gerencianet->alterarVencimento($boleto->charge_id, $request->data);
        if ($res == 200) {
            $boleto->expira = $request->data;
            $boleto->save();
            toastr()->success("Data alterada com sucesso!");
            return redirect()->back();
        }

        toastr()->error("Erro ao alterar a data de vencimento.");
        return redirect()->back();
    }

    public function alterar_vencimento_parcela_carne(ParcelaCarne $parcela, Request $request)
    {
        $gerencianet = new GerencianetRequisicaoBoleto();
        $res = $gerencianet->alterarVencimentoParcela($parcela->carne->carnet_id, $parcela->parcela, $request->data);
        if ($res == 200) {
            $parcela->data_expiracao = $request->data;
            $parcela->save();
            toastr()->success("Data alterada com sucesso!");
            return redirect()->back();
        }

        toastr()->error("Erro ao alterar a data de vencimento.");
        return redirect()->back();
    }

    public function cancelar_boleto(PagamentoBoleto $boleto)
    {
        $gerencianet = new GerencianetRequisicaoBoleto();
        $res = $gerencianet->cancelarTransacao($boleto->charge_id);
        if ($res == 200) {
            $boleto->status = 'canceled';
            $boleto->save();
            toastr()->success("Boleto cancelado com sucesso!");
            return redirect()->back();
        }
        toastr()->error("Erro ao cancelar o boleto!");
        return redirect()->back();
    }



    public function notificacao()
    {
        Log::channel('notificacoes')->info('NOTIFICAÇÃO: Tentativa de notificação - ' . json_encode($_POST));
        $gerencianet = new GerencianetRequisicaoBoleto();
        $res = $gerencianet->notificacao($_POST["notification"]);
        if ($res["code"] == 200) {
            $pagamento = PagamentoBoleto::where("charge_id", $res["charge_id"])->first();
            if (!$pagamento) {
                $pagamento = PagamentoCarneParcela::where("charge_id", $res["charge_id"])->first();
            }
            $pagamento->status = $res["status"];
            Log::channel('notificacoes')->info('NOTIFICAÇÃO: Pagamento ' . $res["charge_id"] . " notificado com o status " . config("gerencianet.status")[$res["status"]]);
            $pagamento->save();
        } elseif ($res["code"] == -1) {
            Log::channel('notificacoes')->error('ERRO:' . json_encode($res));
        } else {
            Log::channel('notificacoes')->error('ERRO:' . json_encode($res));
        }
    }
}
