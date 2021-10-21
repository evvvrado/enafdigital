<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AlunosController extends Controller
{
    //

    public function consultar(){
        $alunos = Aluno::all();
        return view("painel.alunos.consultar", ["alunos" => $alunos]);
    }

    public function cadastrar(Request $request){

        $aluno = Aluno::where("email", $request->email)->orWhere("cpf", $request->cpf)->first();
        if($aluno){
            session()->flash("erro", "O email ou CPF já pertence a um usuário cadastrado.");
            return redirect()->back();
        }
        
        $validated = $request->validate([
            'nome' => 'max:50',
            'email' => 'max:50|unique:alunos',
            'cpf' => 'max:15|unique:alunos',
            'tel' => 'max:15'
        ]);


        $aluno = new Aluno;
        $aluno->nome = $request->nome;
        $aluno->email = $request->email;
        $aluno->senha = Hash::make($request->senha);
        $aluno->cpf = $request->cpf;
        $aluno->telefone = $request->telefone;
        $aluno->ultimo_acesso = date("Y-m-d");
        $aluno->save();
        session()->put(["aluno" => $aluno->toArray()]);
        if(session()->get("produto_adicionar")){
            return redirect(session()->get("produto_adicionar"));
        }else{
            return redirect()->route('site.minha-area');
        }
    }

    public function logar(Request $request){
        $aluno = Aluno::where("email", $request->email)->first();
        if($aluno && Hash::check($request->senha, $aluno->senha)){
            $aluno->ultimo_acesso = date("Y-m-d");
            $aluno->save();
            session()->put(["aluno" => $aluno->toArray()]);
            Log::channel('acessos')->info('LOGIN: O aluno ' . $aluno->nome . ' logou no sistema.');
            if(session()->get("produto_adicionar")){
                return redirect(session()->get("produto_adicionar"));
            }else{
                return redirect()->route('site.minha-area');
            }
        }else{
            session()->flash("erro", "E-mail ou senha incorretos");
            return redirect()->back();
        }
    }
    public function deslogar(){
        session()->forget("aluno");
        return redirect()->route("site.index");
    }
}
