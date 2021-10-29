<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalogo;
use App\Models\Galeria;
use App\Models\GaleriaFoto;
use Illuminate\Support\Facades\Storage;

class GaleriaController extends Controller
{

    public function consultar(Request $request)
    {
        if($request->isMethod('get')){
            $galerias = Galeria::all();
            return view("painel.galeria.consultar", ['galerias' => $galerias]);
        }else{
            $filtros = [];
            if($request->nome != null){
                $filtros[] = ["nome", "like", "%" . $request->nome . "%"];
            }
            $galerias = Galeria::where($filtros)->get();
            return view("painel.galeria.consultar", ['galerias' => $galerias, "filtros" => $request->all()]);
        }
        
    }

    public function salvar(Request $request){
        if($request->galeria_id){
            $galeria = Galeria::find($request->galeria_id);
        }else{
            $galeria = new Galeria;
        }

        $galeria->nome = $request->nome;
        $galeria->save();

        toastr()->success("Galeria salva com sucesso!");

        return redirect()->back();
    }

    public function adicionar_foto(Request $request, Galeria $galeria){
        $foto = new GaleriaFoto;
        
        if($request->file("imagem")){
            Storage::delete($foto->imagem);
            $foto->imagem = $request->file('imagem')->store(
                'site/imagens/galerias/' . $galeria->id, 'local'
            );
        }

        $foto->galeria_id = $galeria->id;

        $foto->save();
        
        return redirect()->back();
    }

    public function deletar_foto(GaleriaFoto $foto){
        Storage::delete($foto->imagem);
        $foto->delete();
        toastr()->success("Foto removida!");
        return redirect()->back();
    }

    public function deletar(Galeria $galeria){
        foreach($galeria->fotos as $foto){
            Storage::delete($foto->imagem);
            $foto->delete();
        }
        $galeria->delete();
        toastr()->success("Galeria excluida com sucesso!");
        return redirect()->back();
    }

    public function cadastrar(Galeria $galeria)
    {
        return view("painel.galeria.cadastrar", ['galeria' => $galeria]);
    }
}
