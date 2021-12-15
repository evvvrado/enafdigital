<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expositor;
use App\Models\ExpositorHotsite;
use App\Models\ExpositorHotsiteFoto;
use App\Models\ExpositorHotsiteDuvida;
use App\Models\ExpositorHotsiteParceiro;
use Illuminate\Support\Facades\Storage;

class ExpositorHotsiteController extends Controller
{
    //

    public function hotsite(Expositor $expositor){
        return view("painel.expositores.hotsite", ['expositor' => $expositor, 'hotsite' => $expositor->hotsite]);
    }


    public function salvar_informacoes(Request $request, Expositor $expositor){
        $hotsite = $expositor->hotsite;
        if(!$hotsite){
            $hotsite = new ExpositorHotsite;
            $hotsite->expositor_id = $expositor->id;
        }

        $hotsite->slogan = $request->slogan;
        $hotsite->slug = $request->slug;
        $hotsite->site = $request->site;
        $hotsite->telefone = $request->telefone;
        $hotsite->email = $request->email;
        $hotsite->endereco = $request->endereco;
        $hotsite->cor_fundo = $request->cor_fundo;
        $hotsite->cor_destaque = $request->cor_destaque;

        $hotsite->save();

        toastr()->success("Informações salvas com sucesso!");

        return redirect()->back();
    }

    public function salvar_textos(Request $request, Expositor $expositor){
        $hotsite = $expositor->hotsite;
        if(!$hotsite){
            $hotsite = new ExpositorHotsite;
            $hotsite->expositor_id = $expositor->id;
        }

        $hotsite->sessao1_titulo = $request->sessao1_titulo;
        $hotsite->sessao1_texto = $request->sessao1_texto;
        $hotsite->coluna1_titulo = $request->coluna1_titulo;
        $hotsite->coluna1_texto = $request->coluna1_texto;
        $hotsite->coluna2_titulo = $request->coluna2_titulo;
        $hotsite->coluna2_texto = $request->coluna2_texto;

        $hotsite->save();

        toastr()->success("Textos salvos com sucesso!");

        return redirect()->back();
    }

    public function salvar_foto(Request $request, Expositor $expositor){
        
        $hotsite = $expositor->hotsite;
        if(!$hotsite){
            $hotsite = new ExpositorHotsite;
            $hotsite->expositor_id = $expositor->id;
        }

        if($request->file("logo")){
            Storage::delete($hotsite->logo);
            $hotsite->logo = $request->file('logo')->store(
                'site/imagens/expositores/'. $expositor->id.'/hotsite', 'local'
            );
        }

        if($request->file("foto1")){
            Storage::delete($hotsite->foto1);
            $hotsite->foto1 = $request->file('foto1')->store(
                'site/imagens/expositores/'. $expositor->id.'/hotsite', 'local'
            );
        }

        if($request->file("foto2")){
            Storage::delete($hotsite->foto2);
            $hotsite->foto2 = $request->file('foto2')->store(
                'site/imagens/expositores/'. $expositor->id.'/hotsite', 'local'
            );
        }

        $hotsite->save();

        toastr()->success("Foto salva com sucesso!");

        return redirect()->back();
    }

    public function salvar_galeria1(Request $request, Expositor $expositor){
        $hotsite = $expositor->hotsite;
        if(!$hotsite){
            $hotsite = new ExpositorHotsite;
            $hotsite->expositor_id = $expositor->id;
        }

        $hotsite->galeria1_titulo = $request->galeria1_titulo;
        $hotsite->galeria1_descricao = $request->galeria1_descricao;

        $hotsite->save();

        toastr()->success("Primeira galeria salva com sucesso!");

        return redirect()->back();
    }

    public function salvar_galeria2(Request $request, Expositor $expositor){
        $hotsite = $expositor->hotsite;
        if(!$hotsite){
            $hotsite = new ExpositorHotsite;
            $hotsite->expositor_id = $expositor->id;
        }

        $hotsite->galeria2_titulo = $request->galeria2_titulo;
        $hotsite->galeria2_descricao = $request->galeria2_descricao;

        $hotsite->save();

        toastr()->success("Segunda galeria salva com sucesso!");

        return redirect()->back();
    }

    public function adicionar_foto_galeria(Request $request, Expositor $expositor){
        $hotsite = $expositor->hotsite;
        if(!$hotsite){
            $hotsite = new ExpositorHotsite;
            $hotsite->expositor_id = $expositor->id;
        }

        if($request->file("foto")){
            $foto = new ExpositorHotsiteFoto;
            $foto->expositor_hotsite_id = $hotsite->id;
            $foto->galeria = $request->galeria;
            $foto->foto = $request->file('foto')->store(
                'site/imagens/expositores/'. $expositor->id.'/hotsite', 'local'
            );
            $foto->save();
        }
        toastr()->success("Foto adicionada com sucesso!");
        return redirect()->back();
    }

    public function salvar_duvida(Request $request, Expositor $expositor){
        $hotsite = $expositor->hotsite;

        if(!$hotsite){
            $hotsite = new ExpositorHotsite;
            $hotsite->expositor_id = $expositor->id;
            $hotsite->save();
        }

        $duvida = new ExpositorHotsiteDuvida;
        $duvida->expositor_hotsite_id = $hotsite->id;
        $duvida->duvida = $request->duvida;
        $duvida->resposta = $request->resposta;

        $duvida->save();

        toastr()->success("Dúvida adicionada com sucesso!");

        return redirect()->back();
    }

    public function excluir_duvida(ExpositorHotsiteDuvida $duvida){
        $duvida->delete();
        toastr()->success("Dúvida removida com sucesso!");
        return redirect()->back();
    }

    public function salvar_parceiro(Request $request, Expositor $expositor){
        $hotsite = $expositor->hotsite;

        if(!$hotsite){
            $hotsite = new ExpositorHotsite;
            $hotsite->expositor_id = $expositor->id;
            $hotsite->save();
        }

        $parceiro = new ExpositorHotsiteParceiro;
        $parceiro->expositor_hotsite_id = $hotsite->id;
        $parceiro->nome = $request->nome;
        $parceiro->url = $request->url;

        if($request->file("logo")){
            $parceiro->logo = $request->file('logo')->store(
                'site/imagens/expositores/'. $expositor->id.'/hotsite', 'local'
            );
        }


        $parceiro->save();

        toastr()->success("Parceiro salvo");

        return redirect()->back();
    }

    public function excluir_parceiro(ExpositorHotsiteParceiro $parceiro){
        Storage::delete($parceiro->logo);
        $parceiro->delete();
        toastr()->success("Parceiro removido com sucesso!");
        return redirect()->back();
    }
}
