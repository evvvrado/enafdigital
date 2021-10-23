<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Support\Str;

class CursosController extends Controller
{
    //

    public function getCurso(Curso $curso){
        return response()->json($curso->toJson());
    }

    public function consultar(Request $request){
        if($request->isMethod('get')){
            $cursos = Curso::all();
            return view("painel.cursos.consultar", ["cursos" => $cursos]);
        }else{
            $filtros = [];
            if($request->nome != null){
                $filtros[] = ["nome", "like", "%" . $request->nome . "%"];
            }
            if($request->tipo != null && $request->tipo != -1){
                $filtros[] = ["tipo", "=", $request->tipo];
            }
            if($request->total_horas != null){
                $filtros[] = ["total_horas", "=", $request->total_horas];
            }
            if($request->valor_minimo != null){
                $filtros[] = ["valor", ">=", $request->valor_minimo];
            }
            if($request->valor_maximo != null){
                $filtros[] = ["valor", "<=", $request->valor_maximo];
            }
            $cursos = Curso::where($filtros)->get();
            return view("painel.cursos.consultar", ['cursos' => $cursos, "filtros" => $request->all()]);
        }
    }
    
    public function cadastrar(){
        return view("painel.cursos.cadastrar");
    }
    
    public function editar(Curso $curso){
        return view("painel.cursos.editar", ['curso' => $curso]);
    }

    public function salvar(Request $request){
        if($request->curso_id){
            $curso = Curso::find($request->curso_id);
            $curso->nome = $request->nome;
            $curso->slug = Str::slug($request->nome);
            $curso->save();
        }else{
            $curso = new Curso;
            $curso->nome = $request->nome;
            $curso->slug = Str::slug($request->nome);
            $curso->gerencianet = true;
            $curso->cielo = true;
            $curso->save();
        }

        $curso->tipo = $request->tipo;
        $curso->total_horas = $request->total_horas;
        $curso->descricao = $request->descricao;
        $curso->titulo = $request->titulo;
        $curso->sobre = $request->sobre;
        
        if($request->gerencianet){
            $curso->gerencianet = true;
        }else{
            $curso->gerencianet = false;
        }

        if($request->cielo){
            $curso->cielo = true;
        }else{
            $curso->cielo = false;
        }
        
        if($request->certificacao){
            $curso->certificacao = true;
        }else{
            $curso->certificacao = false;
        }

        // dd($curso->professores);

        $curso->professores()->wherePivotNotIn("professor_id", $request->professores)->detach();
        foreach($request->professores as $professor){
            if(!$curso->professores->contains($professor)){
                $curso->professores()->attach($professor);
            }
        }
        
        $curso->video = $request->video;
        $curso->valor = $request->valor;

        // THUMBNAIL
        if($request->file("thumbnail")){
            Storage::delete($curso->thumbnail);
            $image = $request->file('thumbnail');
            $input['imagename'] = time().'.'.$image->extension();
            $destinationPath = public_path('site/imagens/cursos/' . $curso->id);
            if(!is_dir($destinationPath)){
                mkdir($destinationPath);
            }
            $img = Image::make($image->path());
            $img->resize(360, 200)->save($destinationPath.'/'.$input['imagename']);
            $curso->thumbnail = 'site/imagens/cursos/' . $curso->id . "/" . $input['imagename'];
        }
        
        // BANNER
        if($request->file("banner")){
            Storage::delete($curso->banner);
            $image = $request->file('banner');
            $input['imagename'] = time().'.'.$image->extension();
            $destinationPath = public_path('site/imagens/cursos/' . $curso->id);
            if(!is_dir($destinationPath)){
                mkdir($destinationPath);
            }
            $img = Image::make($image->path());
            $img->resize(1200, 546)->save($destinationPath.'/'.$input['imagename']);
            $curso->banner = 'site/imagens/cursos/' . $curso->id . "/" . $input['imagename'];
        }

        $curso->save();
        toastr()->success("Curso salvo com sucesso!");
        return redirect()->route("painel.cursos");
    }

    public function ativo(Curso $curso){
        if($curso->ativo){
            $curso->ativo = false;
            toastr()->success("Curso desativado");
        }else{
            $curso->ativo = true;
            toastr()->success("Curso ativado");
        }
        $curso->save();
        return redirect()->back();
    }

    public function processa_editor($id, $conteudo){
        libxml_use_internal_errors(true);
        $dom = new \DOMDocument();
        $dom->loadHTML(
            mb_convert_encoding($conteudo, 'HTML-ENTITIES', 'UTF-8'),
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
        );

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $count => $image) {
            $src = $image->getAttribute('src');

            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                if(!is_dir('site/imagens/cursos/')){
                    mkdir('site/imagens/cursos/');
                }
                if(!is_dir('site/imagens/cursos/' . $id . "/")){
                    mkdir('site/imagens/cursos/' . $id . "/");
                }
                $mimeType = $groups['mime'];
                if(!is_dir('site/imagens/cursos/' . $id . "/")){
                    mkdir('site/imagens/cursos/' . $id . "/");
                }
                $path = 'site/imagens/cursos/' . $id . "/" . uniqid('', true) . '.' . $mimeType;

                Image::make($src)
                    ->encode($mimeType, 80)
                    ->save(public_path($path));

                $image->removeAttribute('src');
                $image->setAttribute('src', asset($path));
            }
        }

        return $dom->saveHTML();
    }
}
