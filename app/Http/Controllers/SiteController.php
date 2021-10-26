<?php

namespace App\Http\Controllers;

use View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Noticia;
use App\Models\Categoria;
use App\Models\Pagina;
use App\Models\Estadual;
use App\Models\Visitas;
use App\Models\DestaqueSuspenso;
use App\Models\Curso;
use App\Models\Aluno;
use App\Models\Venda;
use App\Models\Matricula;
use Illuminate\Support\Facades\Storage;

class SiteController extends Controller
{
    //
    public function __construct()
    {
        View::share('configuracoes', \App\Models\Configuracao::first());
    }

    public function aguarde()
    {
        return view("site.aguarde");
    }

    public function index()
    {

        $eventos = \App\Models\Evento::where("clinica", false)->orderBy("inicio")->get();
        $cursos = Curso::where("pacote", false)->orderBy("created_at", "DESC")->get();
        $professores = \App\Models\Professor::inRandomOrder()->limit(5)->get();

        $pagina = Pagina::where("nome", "Home")->first();
        $destaques = Noticia::where("publicada", true)->orderBy("publicacao", "DESC")->take(4)->get();

        if (!session()->get("destaque")) {
            $destaque_suspenso = DestaqueSuspenso::where([["inicio", "<=", date("Y-m-d H:i:s")], ["fim", ">=", date("Y-m-d H:i:s")]])->orderBy("created_at")->first();
            session()->put(["destaque" => true]);
            return view("site.index", ["eventos" => $eventos, "cursos" => $cursos, 'professores' => $professores, "pagina" => $pagina, "destaques" => $destaques, "destaque_suspenso" => $destaque_suspenso]);
        } else {
            return view("site.index", ["eventos" => $eventos, "cursos" => $cursos, 'professores' => $professores], ["pagina" => $pagina, "destaques" => $destaques]);
        }
    }

    public function quem_somos()
    {
        return view("site.quem_somos");
    }

    public function duvidas()
    {
        return view("site.duvidas");
    }

    public function cursos()
    {
        $cursos = Curso::where("pacote", false)->get();
        return view("site.cursos", ["cursos" => $cursos]);
    }

    // public function curso($slug){
    //     $curso = Curso::where("slug", $slug)->first();
    //     $turma = $curso->turmas->where("ativo", true)->sortBy("data")->first();
    //     return view("site.curso", ["curso" => $curso, "turma" => $turma, "aba" => "detalhes"]);
    // }

    public function curso($slug)
    {
        $cursos = Curso::where("pacote", false)->get();
        $curso = Curso::where("slug", $slug)->first();
        return view("site.curso", ["cursos" => $cursos], ['curso' => $curso]);
    }

    public function instrutores($slug)
    {
        $curso = Curso::where("slug", $slug)->first();
        $turma = $curso->turmas->where("ativo", true)->sortBy("data")->first();
        return view("site.curso", ["curso" => $curso, "turma" => $turma, "aba" => "instrutores"]);
    }
    public function local($slug)
    {
        $curso = Curso::where("slug", $slug)->first();
        $turma = $curso->turmas->where("ativo", true)->sortBy("data")->first();
        return view("site.curso", ["curso" => $curso, "turma" => $turma, "aba" => "local"]);
    }
    public function programacao($slug)
    {
        $curso = Curso::where("slug", $slug)->first();
        $turma = $curso->turmas->where("ativo", true)->sortBy("data")->first();
        return view("site.curso", ["curso" => $curso, "turma" => $turma, "aba" => "programacao"]);
    }

    public function contato()
    {
        return view("site.contato");
    }

    public function minhaConta()
    {
        return view("site.minha-conta");
    }

    public function associese()
    {
        return view("site.associe-se");
    }

    public function diretoria()
    {
        return view("site.diretoria");
    }
    public function professores()
    {
        $professores = \App\Models\Professor::all();
        return view("site.professores", ['professores' => $professores]);
    }

    public function experiencia()
    {
        return view("site.experiencia");
    }

    public function galerias()
    {
        return view("site.galerias");
    }

    public function imprensa()
    {
        return view("site.imprensa");
    }

    public function clinicas()
    {
        $eventos = \App\Models\Evento::where("clinica", true)->get();
        return view("site.clinicas", ["eventos" => $eventos]);
    }

    public function eventos()
    {
        $eventos = \App\Models\Evento::where("clinica", false)->get();
        return view("site.clinicas", ["eventos" => $eventos]);
    }

    public function minhaArea()
    {
        $aluno = Aluno::find(session()->get("aluno")["id"]);
        return view("site.minha-area", ["aluno" => $aluno]);
    }

    public function minhaAreaComprasDetalhes(Venda $venda)
    {
        $aluno = Aluno::find(session()->get("aluno")["id"]);
        return view("site.compras-detalhes", ["aluno" => $aluno, "venda" => $venda]);
    }

    public function minhaAreaCompras()
    {
        $aluno = Aluno::find(session()->get("aluno")["id"]);
        return view("site.minha-area-compras", ["aluno" => $aluno]);
    }

    public function minhaAreaDetalhes(Venda $venda)
    {
        $aluno = Aluno::find(session()->get("aluno")["id"]);
        return view("site.minha-area-detalhes", ["aluno" => $aluno, "venda" => $venda]);
    }

    public function minhaAreaDados()
    {
        $aluno = Aluno::find(session()->get("aluno")["id"]);
        return view("site.minha-area-dados", ["aluno" => $aluno]);
    }

    public function minhaAreaDadosSalvar(Request $request)
    {
        $aluno = Aluno::find(session()->get("aluno")["id"]);
        $aluno->nome = $request->nome;
        $aluno->email = $request->email;
        $aluno->cpf = $request->cpf;
        $aluno->telefone = $request->telefone;
        $aluno->rua = $request->rua;
        $aluno->cidade = $request->cidade;
        $aluno->estado = $request->estado;
        $aluno->save();
        return redirect()->back();
    }

    public function minhaAreaDadosSenhaAlterar(Request $request)
    {
        $aluno = Aluno::find(session()->get("aluno")["id"]);
        if (Hash::check($request->senha_antiga, $aluno->senha)) {
            $aluno->senha = Hash::make($request->senha_nova);
            $aluno->save();
        } else {
            session()->flash("erro", "A senha antiga informada está incorreta");
        }
        return redirect()->back();
    }

    public function minhaAreaDadosAvatarAlterar(Request $request)
    {
        if ($request->file("avatar")) {
            $aluno = Aluno::find(session()->get("aluno")["id"]);
            Storage::delete($aluno->avatar);
            $aluno->avatar = $request->file('avatar')->store(
                'site/imagens/avatares/' . $aluno->id,
                'local'
            );
            $aluno->save();
        }

        return redirect()->back();
    }

    public function minhaAreaMatricula()
    {
        $aluno = Aluno::find(session()->get("aluno")["id"]);
        return view("site.minha-area-matricula", ["aluno" => $aluno]);
    }

    public function minhaAreaMatriculaConteudo(Matricula $matricula)
    {
        $aluno = Aluno::find(session()->get("aluno")["id"]);
        return view("site.matricula-conteudo", ["matricula" => $matricula, "aluno" => $aluno]);
    }

    public function estaduais()
    {
        $estaduais = Estadual::all();
        return view("site.estaduais", ["estaduais" => $estaduais, "slug" => null]);
    }

    public function estaduais_filtro($slug)
    {
        $estaduais = null;
        foreach (config("globals.regioes") as $key => $regiao) {
            if (Str::slug($regiao) == $slug) {
                $estaduais = Estadual::where("regiao", $key)->get();
                break;
            }
        }
        return view("site.estaduais", ["estaduais" => $estaduais, "slug" => $slug]);
    }

    public function estadual($slug)
    {
        $estadual = Estadual::where("slug", $slug)->first();
        return view("site.estadual", ["estadual" => $estadual]);
    }

    public function sommelier()
    {
        return view("site.sommelier");
    }

    public function noticias($slug = null)
    {
        if ($slug) {
            $categoria = Categoria::where("slug", $slug)->first();
            $noticias = $categoria->noticias->where("publicada", true)->sortByDesc("publicacao");
            $destaques = $categoria->noticias->where("publicada", true)->sortByDesc("publicacao")->take(3);
        } else {
            $noticias = Noticia::where("publicada", true)->orderBy("publicacao", "DESC")->get();
            $destaques = Noticia::where("publicada", true)->orderBy("publicacao", "DESC")->take(3)->get();
        }
        return view("site.noticias", ["noticias" => $noticias, "destaques" => $destaques]);
    }

    public function noticia($categoria, $noticia)
    {
        $noticia = Noticia::where("slug", $noticia)->first();
        $noticia->visualizacoes += 1;
        $noticia->save();
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        $estado = null;
        $cidade = null;
        $cep = null;

        $query = @unserialize(file_get_contents('http://ip-api.com/php/' . $ip));

        if ($query && $query["status"] == "success") {
            $estado = $query["region"];
            $cidade = $query["city"];
            $cep = $query["zip"];
        }

        $visita = new Visitas;
        $visita->noticia_id = $noticia->id;
        $visita->ip = $ip;
        $visita->estado = $estado;
        $visita->cidade = $cidade;
        $visita->cep = $cep;

        $visita->save();
        return view("site.blog", ["noticia" => $noticia]);
    }

    public function recuperar_senha()
    {
        return view("site.recuperar_senha");
    }

    public function feira()
    {
        return view("site.feira");
    }

    public function feiraEmpresas()
    {
        return view("site.feira-empresas");
    }

    public function feiraCatalogo()
    {
        return view("site.catalogo");
    }

    public function clinica($slug)
    {
        $evento = \App\Models\Evento::where("slug", $slug)->first();
        return view("site.clinica", ["evento" => $evento]);
    }

    public function evento($slug)
    {
        $evento = \App\Models\Evento::where("slug", $slug)->first();
        return view("site.clinica", ["evento" => $evento]);
    }

    public function hotsite()
    {
        return view("site.hotsite");
    }

    // ARTIGO

    public function artigoGrid()
    {
        $noticias = Noticia::where([["publicacao", "<=", date("Y-m-d")], ["tipo", 1]])->orderby("publicacao", "DESC")->get();
        return view("site.blog-grid", ['noticias' => $noticias, 'tipo' => 1]);
    }

    //BLOG

    public function blogGrid()
    {
        $noticias = Noticia::where([["publicacao", "<=", date("Y-m-d")], ["tipo", 0]])->orderby("publicacao", "DESC")->get();
        return view("site.blog-grid", ['noticias' => $noticias, 'tipo' => 0]);
    }

    public function blogLista()
    {
        return view("site.blog-lista");
    }

    public function blogPost()
    {
        return view("site.blog");
    }

    // FEIRA

}
