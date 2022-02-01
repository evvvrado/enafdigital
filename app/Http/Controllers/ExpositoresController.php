<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalogo;
use App\Models\Expositor;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ExpositoresController extends Controller
{

    public function cadastrar()
    {
        return view("painel.expositores.cadastro");
    }



    public function consultar(Request $request)
    {
        if ($request->isMethod('get')) {
            $expositores = Expositor::all();
            return view("painel.expositores.consultar", ['expositores' => $expositores]);
        } else {
            $filtros = [];
            if ($request->nome != null) {
                $filtros[] = ["nome", "like", "%" . $request->nome . "%"];
            }
            if ($request->telefone != null) {
                $filtros[] = ["telefone", "like", "%" . $request->telefone . "%"];
            }
            if ($request->site != null) {
                $filtros[] = ["site", "like", "%" . $request->site . "%"];
            }
            if ($request->email != null) {
                $filtros[] = ["email", "like", "%" . $request->email . "%"];
            }
            if ($request->categoria != null && $request->categoria != -1) {
                $filtros[] = ["categoria", "=", $request->categoria];
            }
            $expositores = Expositor::where($filtros)->get();
            return view("painel.expositores.consultar", ['expositores' => $expositores, "filtros" => $request->all()]);
        }
    }


    public function editar(Expositor $expositor)
    {
        return view("painel.expositores.editar", ["expositor" => $expositor]);
    }

    public function salvar(Request $request)
    {
        if ($request->expositor_id) {
            $expositor = Expositor::find($request->expositor_id);
        } else {
            $expositor = new Expositor;
            $expositor->save();
        }

        $expositor->nome = $request->nome;
        $expositor->telefone = $request->telefone;
        $expositor->site = $request->site;
        $expositor->email = $request->email;
        $expositor->categoria = $request->categoria;

        if ($request->file("foto")) {
            Storage::delete($expositor->foto);
            $expositor->foto = $request->file('foto')->store(
                'site/imagens/expositores/' . $expositor->id,
                'local'
            );
        }

        $expositor->save();
        toastr()->success("Expositor salvo com sucesso!");

        return redirect()->route("painel.expositores");
    }


    public function destaque(Expositor $expositor)
    {
        if ($expositor->destaque) {
            $expositor->destaque = false;
            $expositor->save();
            return response()->json("retirado");
        } else {
            $expositor->destaque = true;
            $expositor->save();
            return response()->json("destacado");
        }
    }
}
