<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalogo;
use App\Models\Professor;
use Illuminate\Support\Facades\Storage;

class ProfessoresController extends Controller
{
    public function consultar(Request $request){
        if($request->isMethod('get')){
            $professores = Professor::all();
            return view("painel.professores.consultar", ['professores' => $professores]);
        }else{
            $filtros = [];
            if($request->nome != null){
                $filtros[] = ["nome", "like", "%" . $request->nome . "%"];
            }
            if($request->atuacao != null && $request->atuacao != -1){
                $filtros[] = ["atuacao", "=", $request->atuacao];
            }
            if($request->empresa != null){
                $filtros[] = ["empresa", "like", "%" . $request->empresa . "%"];
            }
            $professores = Professor::where($filtros)->get();
            return view("painel.professores.consultar", ['professores' => $professores, "filtros" => $request->all()]);
        }
        
    }

    public function cadastrar(){
        return view("painel.professores.cadastrar");
    }

    public function editar(Professor $professor){
        return view("painel.professores.editar", ["professor" => $professor]);
    }

    public function salvar(Request $request){
        if($request->professor_id){
            $professor = Professor::find($request->professor_id);
        }else{
            $professor = new Professor;
        }

        $professor->nome = $request->nome;
        $professor->empresa = $request->empresa;
        $professor->atuacao = $request->atuacao;
        $professor->save();
        
        if($request->file("foto")){
            Storage::delete($professor->foto);
            $professor->foto = $request->file("foto")->store('site/imagens/professores/' . $professor->id, 'local');
            $professor->save();
        }

        toastr()->success("Professor salvo com sucesso!");
        return redirect()->route("painel.professores");
    }

    public function deletar(Professor $professor) {
        Storage::delete($professor->foto);
        $professor->delete();
        toastr()->success("Professor removido com sucesso!");
        return redirect()->back();
    }

    public function destaque(Professor $professor){
        if($professor->destaque){
            $professor->destaque = false;
            $professor->save();
            return response()->json("retirado");
        }else{
            $qtd = Professor::where("destaque", true)->count();
            if($qtd == 4){
                return response()->json("erro");    
            }
            $professor->destaque = true;
            $professor->save();
            return response()->json("destacado");
        }
    }

}
