<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;
use Illuminate\Support\Facades\Storage;

class ContratosController extends Controller
{
    //
    public function consultar(Request $request){
        if($request->isMethod('get')){
            $contratos = Contrato::all();
            return view("painel.categorias.consultar", ["contratos" => $contratos]);
        }else{
            $filtros = [];
            if($request->nome != null){
                $filtros[] = ["nome", "like", "%" . $request->nome . "%"];
            }
            if($request->expositor_id != null){
                $filtros[] = ["expositor_id", "=", $request->expositor_id];
            }
            if($request->valor != null){
                $filtros[] = ["valor", "=", $request->valor];
            }
            if($request->inicio != null){
                $filtros[] = ["inicio", "=", $request->inicio];
            }
            if($request->fim != null){
                $filtros[] = ["fim", "=", $request->fim];
            }
            $contratos = Contrato::where($filtros)->get();
            return view("painel.categorias.consultar", ["contratos" => $contratos, "filtros" => $request->all()]);
        }
        
    }

    public function cadastrar(){
        return view("painel.categorias.cadastro");
    }
    
    public function editar(Contrato $contrato){
        return view("painel.categorias.editar", ['contrato' => $contrato]);
    }

    public function salvar(Request $request){
        if($request->contrato_id){
            $contrato = Contrato::find($request->contrato_id);
        }else{
            $contrato = new Contrato;
        }

        $contrato->nome = $request->nome;
        $contrato->inicio = $request->inicio;
        $contrato->fim = $request->fim;
        $contrato->expositor_id = $request->expositor_id;
        $contrato->valor = $request->valor;

        if($request->ativo){
            $contrato->ativo = true;
        }else{
            $contrato->ativo = false;
        }

        if($request->file("imagem_mobile")){
            Storage::delete($contrato->imagem_mobile);
            $contrato->imagem_mobile = $request->file('imagem_mobile')->store(
                'site/imagens/contratos/', 'local'
            );
        }

        if($request->file("imagem_desktop")){
            Storage::delete($contrato->imagem_desktop);
            $contrato->imagem_desktop = $request->file('imagem_desktop')->store(
                'site/imagens/contratos/', 'local'
            );
        }

        $contrato->save();

        toastr()->success("Contrato salvo com sucesso!");
        return redirect()->route('painel.categorias');
    }

    public function deletar(Contrato $contrato){
        Storage::delete($contrato->imagem_mobile);
        Storage::delete($contrato->imagem_desktop);
        $contrato->delete();
        return redirect()->back();
    }
}
