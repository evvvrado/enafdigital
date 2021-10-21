<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Gerencianet\GerencianetRequisicaoBoleto;
use Illuminate\Support\Facades\Log;
use App\Models\Carrinho;
use App\Models\Aluno;
use App\Models\Venda;
use App\Models\PagamentoBoleto;
use App\Models\PagamentoCarne;
use App\Models\PagamentoCarneParcela;

class GerencianetController extends Controller
{
    //
    public function boleto($parcelas){
        $gerencianet = new GerencianetRequisicaoBoleto();
        $carrinho = Carrinho::find(session()->get("carrinho"));
        $aluno = Aluno::find(session()->get("aluno")["id"]);
        if($parcelas == 1){
            $desconto = ($carrinho->total * 10 / 100);
        }else{
            $desconto = 0;
        }
        // $gerencianet->enviarBoletoEmail(1334034, 'gusouza980@gmail.com');
        $turmas = [];
        foreach($carrinho->produtos as $produto){
            // $produto->turma->inscritos += 1;
            // $produto->turma->save();
            $gerencianet->addItem([
                'name' => $produto->curso->titulo, // nome do item, produto ou serviço
                'amount' => 1, // quantidade
                'value' => intval($produto->total * 100)
            ]);
        }

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

        if($parcelas == 1){
            $gerencianet->addDesconto([
                'type' => 'currency',
                'value' => $desconto
            ]);
            $gerencianet->addBoleto([
                'expire_at' => date("Y-m-d", strtotime("+15 days")), // data de vencimento do titulo
                'message' => 'Acompanhe o status do seu pagamento no seu painel do cliente.', // mensagem a ser exibida no boleto
            ]);
            $res = $gerencianet->gerarBoleto();
        }else{
            $gerencianet->addParcelas($parcelas);
            $res = $gerencianet->gerarCarne();
        }

        // dd($res);
        if($res["code"] == 200){
            
            $venda = new Venda;
            $venda->aluno_id = $aluno->id;
            $venda->carrinho_id = $carrinho->id;
            $venda->codigo = date("Ymd") . str_pad($carrinho->id, 8, "0", STR_PAD_LEFT);
            $venda->total = $carrinho->total - $desconto;
            $venda->status = 0;
            $venda->gateway = 0;
            $venda->parcelas = $parcelas;
            if($parcelas > 1){
                $venda->forma = 2;
            }
            $venda->valor_parcela = number_format($venda->total / $parcelas, 2,".","");
            $venda->desconto = $desconto;
            $venda->save();

            if($parcelas == 1){
                $boleto = new PagamentoBoleto;
                $boleto->venda_id = $venda->id;
                $boleto->charge_id = $res["data"]["charge_id"];
                $boleto->codigo_barra = $res["data"]["barcode"];
                $boleto->link = $res["data"]["link"];
                if(isset($res["data"]["pdf"]) && isset($res["data"]["pdf"]["charge"])){
                    $boleto->pdf = $res["data"]["pdf"]["charge"];
                }
                $boleto->expira = $res["data"]["expire_at"];
                $boleto->status = $res["data"]["status"];
                $boleto->total = $res["data"]["total"];
                $boleto->save();
                // $gerencianet->enviarBoletoEmail($boleto->charge_id, $aluno->email);
            }else{
                $carne = new PagamentoCarne;
                $carne->venda_id = $venda->id;
                $carne->carnet_id = $res["data"]["carnet_id"];
                $carne->status = $res["data"]["status"];
                $carne->link = $res["data"]["pdf"]["carnet"];
                $carne->save();
                foreach($res["data"]["charges"] as $charge){
                    $parcela = new PagamentoCarneParcela;
                    $parcela->pagamento_carne_id = $carne->id;
                    $parcela->charge_id = $charge["charge_id"];
                    $parcela->parcela = $charge["parcel"];
                    $parcela->status = $charge["status"];
                    $parcela->valor = $charge["value"]/100;
                    $parcela->data_expiracao = $charge["expire_at"];
                    $parcela->link = $charge["pdf"]["charge"];
                    $parcela->save();
                }
            }
            session()->forget("carrinho");
            session()->put(["venda_finalizada" => $venda->id]);
            return redirect()->route("site.carrinho-confirmacao");
        }else{
            foreach($carrinho->produtos as $produto){
                // $produto->turma->inscritos -= 1;
                // $produto->turma->save();
            }
            session()->flash("erro", "Problema na finalização da compra. Tente novamente mais tarde.");
            return redirect()->route("site.carrinho.pagamento.boleto");
        }
    }

    public function notificacao(){
        Log::channel('notificacoes')->info('NOTIFICAÇÃO: Tentativa de notificação no token ' . $_POST['notification']);
        $gerencianet = new GerencianetRequisicaoBoleto();
        $res = $gerencianet->notificacao($_POST["notification"]);
        if($res["code"] == 200){
            $pagamento = PagamentoBoleto::where("charge_id", $res["charge_id"])->first();
            $pagamento->status = $res["status"];
            Log::channel('notificacoes')->info('NOTIFICAÇÃO: Pagamento ' . $res["charge_id"] . " notificado com o status " . config("gerencianet.status")[$res["status"]]);
            $pagamento->save();
        }elseif($res["code"] == -1){
            Log::channel('notificacoes')->error('ERRO:' . $res["erro"]);
        }else{
            Log::channel('notificacoes')->error('ERRO:' . $res["erro"] . "\n" . $res["descricao"]);
        }
    }
}
