<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;
use App\Models\ProfessorHotsite;
use App\Models\ProfessorHotsiteDepoimento;
use App\Models\ProfessorHotsiteDuvida;
use Illuminate\Support\Facades\Storage;

class ProfessorHotsiteController extends Controller
{
    //

    public function hotsite(Professor $professor){
        return view("painel.professores.hotsite", ['professor' => $professor, 'hotsite' => $professor->hotsite]);
    }

    public function salvar_informacoes(Request $request, Professor $professor){
        $hotsite = $professor->hotsite;
        if(!$hotsite){
            $hotsite = new ProfessorHotsite;
            $hotsite->professor_id = $professor->id;
        }

        $hotsite->nome = $request->nome;
        $hotsite->email = $request->email;
        $hotsite->telefone = $request->telefone;
        $hotsite->slug = $request->slug;
        $hotsite->video = $request->video;
        $hotsite->sobre = $request->sobre;

        $hotsite->save();

        toastr()->success("Hotsite salvo com sucesso!");
        return redirect()->back();
    }

    public function salvar_textos(Request $request, Professor $professor){
        $hotsite = $professor->hotsite;
        if(!$hotsite){
            $hotsite = new ProfessorHotsite;
            $hotsite->professor_id = $professor->id;
        }

        $hotsite->sessao1_titulo = $request->sessao1_titulo;
        $hotsite->sessao1_texto = $request->sessao1_texto;

        $hotsite->sessao2_titulo = $request->sessao2_titulo;
        $hotsite->sessao2_texto = $request->sessao2_texto;

        $hotsite->sessao3_titulo = $request->sessao3_titulo;
        $hotsite->sessao3_texto = $request->sessao3_texto;

        $hotsite->save();

        toastr()->success("Textos salvos com sucesso!");

        return redirect()->back();
    }

    public function salvar_foto(Request $request, Professor $professor){
        $hotsite = $professor->hotsite;

        if(!$hotsite){
            $hotsite = new ProfessorHotsite;
            $hotsite->professor_id = $professor->id;
        }

        if($request->file("foto")){
            Storage::delete($hotsite->foto);
            $hotsite->foto = $request->file('foto')->store(
                'site/imagens/professores/'. $professor->id.'/hotsite', 'local'
            );
        }

        $hotsite->save();

        toastr()->success("Foto salva com sucesso!");

        return redirect()->back();
    }

    public function salvar_depoimento(Request $request, Professor $professor){
        $hotsite = $professor->hotsite;

        if(!$hotsite){
            $hotsite = new ProfessorHotsite;
            $hotsite->professor_id = $professor->id;
            $hotsite->save();
        }

        $depoimento = new ProfessorHotsiteDepoimento;
        $depoimento->professor_hotsite_id = $hotsite->id;
        $depoimento->nome = $request->nome;
        $depoimento->depoimento = $request->depoimento;

        if($request->file("foto")){
            Storage::delete($depoimento->foto);
            $depoimento->foto = $request->file('foto')->store(
                'site/imagens/professores/'. $professor->id.'/hotsite', 'local'
            );
        }

        if($request->video){
            $depoimento->video = true;
            $depoimento->url = $request->url;
        }

        $depoimento->save();

        toastr()->success("Depoimento salvo");

        return redirect()->back();
    }

    public function excluir_depoimento(ProfessorHotsiteDepoimento $depoimento){
        Storage::delete($depoimento->foto);
        $depoimento->delete();
        toastr()->success("Depoimento removido com sucesso!");
        return redirect()->back();
    }

    public function salvar_duvida(Request $request, Professor $professor){
        $hotsite = $professor->hotsite;

        if(!$hotsite){
            $hotsite = new ProfessorHotsite;
            $hotsite->professor_id = $professor->id;
            $hotsite->save();
        }

        $duvida = new ProfessorHotsiteDuvida;
        $duvida->professor_hotsite_id = $hotsite->id;
        $duvida->duvida = $request->duvida;
        $duvida->resposta = $request->resposta;

        $duvida->save();

        toastr()->success("Dúvida adicionada com sucesso!");

        return redirect()->back();
    }

    public function excluir_duvida(ProfessorHotsiteDuvida $duvida){
        $duvida->delete();
        toastr()->success("Dúvida removida com sucesso!");
        return redirect()->back();
    }
}
