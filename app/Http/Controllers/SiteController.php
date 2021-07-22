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

class SiteController extends Controller
{
    //
    public function __construct(){
        View::share('configuracoes', \App\Models\Configuracao::first());
    }

    public function index(){
        
        $pagina = Pagina::where("nome", "Home")->first();
        $destaques = Noticia::where("publicada", true)->orderBy("publicacao", "DESC")->take(4)->get();
        if(!session()->get("destaque")){
            $destaque_suspenso = DestaqueSuspenso::where([["inicio", "<=", date("Y-m-d H:i:s")], ["fim", ">=", date("Y-m-d H:i:s")]])->orderBy("created_at")->first();
            session()->put(["destaque" => true]);
            return view("site.index", ["pagina" => $pagina, "destaques" => $destaques, "destaque_suspenso" => $destaque_suspenso]);
        }else{
            return view("site.index", ["pagina" => $pagina, "destaques" => $destaques]);
        }
    }

    public function quem_somos(){
        return view("site.quem_somos");
    }

    public function cursos(){
        return view("site.cursos");
    }

    public function curso(){
        return view("site.curso");
    }
    public function instrutores(){
        return view("site.curso-instrutores");
    }
    public function local(){
        return view("site.curso-local");
    }
    public function programacao(){
        return view("site.curso-programacao");
    }
    public function contato(){
        return view("site.contato");
    }

    public function cadastro(){
        return view("site.cadastro");
    }

    public function login(){
        return view("site.login");
    }

    public function associese(){
        return view("site.associe-se");
    }

    public function diretoria(){
        return view("site.diretoria");
    }



    public function pagamento(){
        return view("site.carrinho-pagamento");
    }
    public function identificacao(){
        return view("site.carrinho-identificacao");
    }
    public function confirmacao(){
        return view("site.carrinho-confirmacao");
    }
    public function dados(){
        return view("site.carrinho-dados");
    }
    public function minhaArea(){
        return view("site.minha-area");
    }
    public function minhaAreaCompras(){
        return view("site.minha-area-compras");
    }
    public function minhaAreaDados(){
        return view("site.minha-area-dados");
    }
    public function minhaAreaMatricula(){
        return view("site.minha-area-matricula");
    }


    
    public function estaduais(){
        $estaduais = Estadual::all();
        return view("site.estaduais", ["estaduais" => $estaduais, "slug" => null]);
    }

    public function estaduais_filtro($slug){
        $estaduais = null;
        foreach(config("globals.regioes") as $key => $regiao){
            if(Str::slug($regiao) == $slug){
                $estaduais = Estadual::where("regiao", $key)->get();
                break;
            }
        }
        return view("site.estaduais", ["estaduais" => $estaduais, "slug" => $slug]);
    }

    public function estadual($slug){
        $estadual = Estadual::where("slug", $slug)->first();
        return view("site.estadual", ["estadual" => $estadual]);
    }

    public function sommelier(){
        return view("site.sommelier");
    }

    public function noticias($slug = null){
        if($slug){
            $categoria = Categoria::where("slug", $slug)->first();
            $noticias = $categoria->noticias->where("publicada", true)->sortByDesc("publicacao");
            $destaques = $categoria->noticias->where("publicada", true)->sortByDesc("publicacao")->take(3);

        }else{
            $noticias = Noticia::where("publicada", true)->orderBy("publicacao", "DESC")->get();
            $destaques = Noticia::where("publicada", true)->orderBy("publicacao", "DESC")->take(3)->get();
        }
        return view("site.noticias", ["noticias" => $noticias, "destaques" => $destaques]);
    }

    public function noticia($categoria, $noticia){
        $noticia = Noticia::where("slug", $noticia)->first();
        $noticia->visualizacoes += 1;
        $noticia->save();
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
    
        $estado = null;
        $cidade = null;
        $cep = null;
    
        $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
    
        if($query && $query["status"] == "success"){
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
        return view("site.noticia", ["noticia" => $noticia]);
    }

    public function recuperar_senha(){
        return view("site.recuperar_senha");
    }

}
