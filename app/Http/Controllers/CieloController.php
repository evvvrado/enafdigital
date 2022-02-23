<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Venda;
use App\Models\Curso;
use App\Models\CarrinhoProduto;
use Illuminate\Support\Facades\Log;
use App\Models\PagamentoCartao;
use App\Models\Carrinho;
use App\Models\Matricula;
use Jlorente\CreditCards\CreditCardTypeConfig;
use Jlorente\CreditCards\CreditCardValidator;
use App\Classes\Cielo\CieloRequisicaoCredito;
use App\Classes\Email;

class CieloController extends Controller
{
    //
    public function credito(Request $request, Curso $curso)
    {
        // $carrinho = Carrinho::find(session()->get("carrinho"));
        $codigo = date("Ymd") . str_pad(random_int(0, 99999999), 8, "0", STR_PAD_LEFT);
        $validator = new CreditCardValidator();
        $valido = $validator->isValid(str_replace(" ", "", $request->numero));
        if ($valido) {
            $bandeira = $validator->getType(str_replace(" ", "", $request->numero))->getNiceType();
        } else {
            session()->flash("erro", "Número de cartão inválido");
            return redirect()->back();
        }
        // $bandeira = 'Visa';
        $cielo = new CieloRequisicaoCredito();

        $cielo->addSale($codigo);
        $cielo->addCustomer($request->nome);
        $cielo->addPayment($curso->valor);
        // $cielo->addCreditCard($request->numero, $bandeira, $request->expiracao, $request->cvv, $request->nome, $request->parcelas);
        $cielo->addCreditCard(str_replace(" ", "", $request->numero), config("cielo.bandeiras")[$bandeira], $request->expiracao, $request->cvv, $request->nome, $request->parcelas);
        $res = $cielo->efetuar();

        if ($res["status"] == 200) {

            if ($res["retorno"] == "00" || $res["retorno"] == "11") {

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
                $venda->aluno_id = session()->get("aluno")["id"];
                $venda->carrinho_id = $carrinho->id;
                $venda->codigo = $codigo;
                $venda->total = $carrinho->total;
                $venda->forma = 1;
                $venda->status = 1;
                $venda->gateway = 1;
                $venda->parcelas = $request->parcelas;
                $venda->valor_parcela = $venda->total / $venda->parcelas;
                $venda->desconto = 0;
                $venda->save();

                $pagamento = new PagamentoCartao;
                $pagamento->venda_id = $venda->id;
                $pagamento->status = 1;
                $pagamento->codigo = $res["payment_id"];
                $pagamento->numero = $res["numero"];
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

                session()->forget("carrinho");
                session()->put(["venda_finalizada" => $venda->id]);

                $file = file_get_contents('email/comprovante-compra.html');
                $file = str_replace("{{NOME}}", $venda->aluno->nome, $file);
                $file = str_replace("{{VALOR}}", number_format($venda->total, 2, ",", "."), $file);
                $file = str_replace("{{CODIGO}}", $venda->codigo, $file);
                Email::enviar($file, "Confirmação de Compra", $venda->aluno->email, false);
                return redirect()->route("site.carrinho-confirmacao");
            } else {
                Log::channel('cartao')->error('ERRO:' . json_encode($res));
                if(isset(config("cielo.erros")[$res["retorno"]])){
                    session()->flash("erro", config("cielo.erros")[$res["retorno"]]);
                }else{
                    session()->flash("erro", $res["mensagem"]);
                }
                return redirect()->route("site.carrinho.pagamento.cartao", ["curso" => $curso]);
            }
        } else {
            Log::channel('cartao')->error('ERRO:' . json_encode($res));
            session()->flash("erro", "Erro nos dados do cartão. Verifique se as informações estão corretas e tente novamente.");
            return redirect()->route("site.carrinho.pagamento.cartao", ["curso" => $curso]);
        }
    }

    public function capturar(Venda $venda)
    {
        $pagamento = $venda->cartao;
        $cielo = new CieloRequisicaoCredito();
        $res = $cielo->capturar($pagamento->codigo, $pagamento->venda->total);
        dd($res);
    }

    public function estornar(Venda $venda)
    {
        $pagamento = $venda->cartao;
        $cielo = new CieloRequisicaoCredito();
        $res = $cielo->estornar($pagamento->codigo, $pagamento->venda->total);
        if ($res->getReturnCode() == 9) {
            $venda->cartao->status = 2;
            $venda->cartao->save();
            toastr()->success("Pagamento estornado com sucesso!", "Sucesso!");
        } else {
            toastr()->error($res->getReturnMessage(), "Erro");
        }
        return redirect()->back();
    }
}
