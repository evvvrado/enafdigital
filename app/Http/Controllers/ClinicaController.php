<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\PacoteCurso;
use App\Models\Evento;
use App\Models\EventoCurso;
use App\Models\EventoParticipante;
use App\Models\EventoHotel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ClinicaController extends Controller
{
    //

    public function consultar(Request $request){
        if($request->isMethod('get')){
            $eventos = Evento::where("clinica", true)->get();
            return view("painel.clinicas.consultar", ["eventos" => $eventos]);
        }else{
            $filtros = [];
            if($request->nome != null){
                $filtros[] = ["nome", "like", "%" . $request->nome . "%"];
            }
            if($request->local_endereco != null){
                $filtros[] = ["local_endereco", "like", "%" . $request->local_endereco . "%"];
            }
            if($request->inicio != null){
                $filtros[] = ["inicio", "=", $request->inicio];
            }
            if($request->fim != null){
                $filtros[] = ["fim", "=", $request->fim];
            }
            $filtros[] = ["clinica", "=", true];
            $eventos = Evento::where($filtros)->get();
            return view("painel.clinicas.consultar", ["eventos" => $eventos, "filtros" => $request->all()]);
        }
    }
    
    public function cadastrar(){
        return view("painel.clinicas.cadastrar");
    }

    public function editar(Evento $evento){
        return view("painel.clinicas.editar", ["evento" => $evento]);
    }

    public function salvar(Request $request){
        if($request->evento_id){
            $evento = Evento::find($request->evento_id);
            $evento->nome = $request->nome;
            $evento->slug = Str::slug($request->nome);
        }else{
            $evento = new Evento;
            $evento->nome = $request->nome;
            $evento->slug = Str::slug($request->nome);
            $evento->save();
        }

        $evento->descricao = $request->descricao;
        $evento->titulo = $request->titulo;
        $evento->sobre = $request->sobre;
        $evento->inicio = $request->inicio;
        $evento->fim = $request->fim;
        $evento->hora_inicio = $request->hora_inicio;
        $evento->hora_fim = $request->hora_fim;
        $evento->video = $request->video;

        if($request->file("thumbnail")){
            Storage::delete($evento->thumbnail);
            $evento->thumbnail = $request->file('thumbnail')->store(
                'site/imagens/eventos/' . $evento->id, 'local'
            );
        }

        if($request->file("banner")){
            Storage::delete($evento->banner);
            $evento->banner = $request->file('banner')->store(
                'site/imagens/eventos/' . $evento->id, 'local'
            );
        }

        if($request->clinica){
            $evento->clinica = true;
        }

        $evento->save();

        if($evento->clinica){
            toastr()->success("Clínica salva com sucesso!");
            return redirect()->route("painel.clinicas");
        }else{
            toastr()->success("Evento salvo com sucesso!");
            return redirect()->route("painel.clinicas");
        }

    }

    public function salvar_local(Request $request, Evento $evento){
        $evento->local_nome = $request->local_nome;
        $evento->local_endereco = $request->local_endereco;
        if($request->file("local_foto")){
            Storage::delete($evento->local_foto);
            $evento->local_foto = $request->file('local_foto')->store(
                'site/imagens/eventos/' . $evento->id, 'local'
            );
        }
        $evento->save();
        toastr()->success("Local salvo com sucesso!");
        return redirect()->back();
    }

    public function salvar_divulgacao(Request $request, Evento $evento){
        if($request->file("banner_divulgacao")){
            Storage::delete($evento->banner_divulgacao);
            $evento->banner_divulgacao = $request->file('banner_divulgacao')->store(
                'site/imagens/eventos/' . $evento->id, 'local'
            );
        }
        $evento->save();
        toastr()->success("Banner de divulgacao salvo com sucesso!");
        return redirect()->back();
    }

    public function adicionar_curso(Request $request, Evento $evento){
        $evento_curso = new EventoCurso;
        $evento_curso->evento_id = $evento->id;
        $evento_curso->curso_id = $request->curso_id;
        $evento_curso->data = $request->data;
        $evento_curso->save();
        toastr()->success("Curso adicionado ao evento");
        return redirect()->back();
    }

    public function deletar_curso(EventoCurso $evento_curso){
        $evento_curso->delete();
        toastr()->success("Curso removido do evento");
        return redirect()->back();
    }

    public function adicionar_participante(Request $request, Evento $evento){
        $participante = new EventoParticipante;
        $participante->evento_id = $evento->id;
        $participante->nome = $request->nome;
        $participante->url = $request->url;
        $participante->tipo = $request->tipo;

        if($request->file("foto")){
            Storage::delete($participante->foto);
            $participante->foto = $request->file('foto')->store(
                'site/imagens/eventos/' . $evento->id, 'local'
            );
        }

        $participante->save();
        toastr()->success("Participante adicionado ao evento");
        return redirect()->back();
    }

    public function deletar_participante(EventoParticipante $participante){
        Storage::delete($participante->foto);
        $participante->delete();
        toastr()->success("Participante removido do evento.");
        return redirect()->back();
    }

    public function adicionar_hotel(Request $request, Evento $evento){
        $hotel = new EventoHotel;
        $hotel->evento_id = $evento->id;
        $hotel->nome = $request->nome;
        $hotel->endereco = $request->endereco;
        $hotel->url = $request->url;
        
        if($request->file("foto")){
            Storage::delete($hotel->foto);
            $hotel->foto = $request->file('foto')->store(
                'site/imagens/eventos/' . $evento->id, 'local'
            );
        }

        $hotel->save();

        toastr()->success("Hotel adicionado com sucesso!");
        return redirect()->back();
    }

    public function deletar_hotel(EventoHotel $hotel){
        Storage::delete($hotel->foto);
        $hotel->delete();
        toastr()->success("Hotel removido do evento.");
        return redirect()->back();
    }

    public function adicionar_pacote(Request $request, Evento $evento){
        $pacote = new Curso;
        $pacote->evento_id = $evento->id;
        $pacote->nome = $request->nome;
        $pacote->slug = Str::slug($request->nome);
        $pacote->pacote = true;
        $pacote->valor = $request->valor;
        $pacote->descricao_pacote = $request->descricao_pacote;
        $pacote->save();

        foreach($request->cursos as $curso){
            $pacote_curso = new PacoteCurso;
            $pacote_curso->pacote_id = $pacote->id;
            $pacote_curso->curso_id = $curso;
            $pacote_curso->save();
        }

        toastr()->success("Pacote adicionado com sucesso!");
        return redirect()->back();
    }

    public function deletar_pacote(Curso $pacote){
        $cursos_ligados = PacoteCurso::where("pacote_id", $pacote->id)->get();

        foreach($cursos_ligados as $curso){
            $curso->delete();
        }

        $pacote->delete();
        toastr()->success("Pacote removido com sucesso!");
        return redirect()->back();
    }
}
