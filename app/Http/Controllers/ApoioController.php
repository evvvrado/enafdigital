<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apoio;
use Illuminate\Support\Facades\Storage;

class ApoioController extends Controller
{
    //
    public function editar(Apoio $apoio){
        return view("painel.apoio.editar", ['apoio' => $apoio]);
    }
    
    public function cadastrar(){
        return view("painel.apoio.cadastrar");
    }

    public function salvar(Request $request){

        if($request->apoio_id){
            $apoio = Apoio::find($request->apoio_id);
        }else{
            $apoio = new Apoio;
        }

        $apoio->nome = $request->nome;
        $apoio->url = $request->url;

        if($request->file("foto")){
            Storage::delete($apoio->foto);
            $apoio->foto = $request->file('foto')->store(
                'site/imagens/apoios/', 'local'
            );
        }

        $apoio->save();
        
        toastr()->success("Apoio salvo com sucesso!");

        return redirect()->route("painel.apoio");
    }

    public function deletar(Apoio $apoio){
        Storage::delete($apoio->foto);
        $apoio->delete();
        return redirect()->back();
    }

    public function consultar(Request $request){
        if($request->isMethod('get')){
            $apoios = Apoio::all();
            return view("painel.apoio.consultar", ["apoios" => $apoios]);
        }else{
            $filtros = [];
            if($request->nome != null){
                $filtros[] = ["nome", "like", "%" . $request->nome . "%"];
            }
            if($request->url != null){
                $filtros[] = ["url", "like", "%" . $request->url . "%"];
            }
            $apoios = Apoio::where($filtros)->get();
            return view("painel.apoio.consultar", ["apoios" => $apoios, "filtros" => $request->all()]);
        }
        return view("painel.apoio.consultar");
    }
}
