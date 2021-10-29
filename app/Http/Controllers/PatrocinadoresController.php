<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patrocinador;
use Illuminate\Support\Facades\Storage;

class PatrocinadoresController extends Controller
{
    //

    public function editar(Patrocinador $patrocinador){
        return view("painel.patrocinadores.editar", ['patrocinador' => $patrocinador]);
    }
    
    public function cadastrar(){
        return view("painel.patrocinadores.cadastrar");
    }

    public function consultar(Request $request){
        if($request->isMethod('get')){
            $patrocinadores = Patrocinador::all();
            return view("painel.patrocinadores.consultar", ['patrocinadores' => $patrocinadores]);
        }else{
            $filtros = [];
            if($request->nome != null){
                $filtros[] = ["nome", "like", "%" . $request->nome . "%"];
            }
            if($request->url != null){
                $filtros[] = ["url", "like", "%" . $request->url . "%"];
            }

            $patrocinadores = Patrocinador::where($filtros)->get();
            return view("painel.patrocinadores.consultar", ['patrocinadores' => $patrocinadores, "filtros" => $request->all()]);
        }
        
    }

    public function salvar(Request $request){
        if($request->patrocinador_id){
            $patrocinador = Patrocinador::find($request->patrocinador_id);
        }else{
            $patrocinador = new Patrocinador;
        }

        $patrocinador->nome = $request->nome;
        $patrocinador->url = $request->url;

        if($request->file("foto")){
            Storage::delete($patrocinador->foto);
            $patrocinador->foto = $request->file('foto')->store(
                'site/imagens/patrocinadores/', 'local'
            );
        }

        $patrocinador->save();

        toastr()->success("Patrocinador salvo com sucesso!");

        return redirect()->route("painel.patrocinadores");
    }

    public function deletar(Patrocinador $patrocinador){
        Storage::delete($patrocinador->foto);
        $patrocinador->delete();
        return redirect()->back();
    }
}
