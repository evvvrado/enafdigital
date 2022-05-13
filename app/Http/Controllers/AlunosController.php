<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Classes\Util;
use App\Classes\Email;
use Illuminate\Support\Str;

class AlunosController extends Controller
{
    //

    public function consultar()
    {
        $alunos = Aluno::all();
        return view("painel.alunos.consultar", ["alunos" => $alunos]);
    }

    public function cadastrar(Request $request)
    {

        $aluno = Aluno::where("email", strtolower($request->email))->orWhere("cpf", $request->cpf)->first();
        if ($aluno) {
            session()->flash("erro", "O email ou CPF já pertence a um usuário cadastrado.");
            return redirect()->back();
        }

        $validated = $request->validate([
            'nome' => 'max:50',
            'email' => 'max:50|unique:alunos',
            'cpf' => 'max:15|unique:alunos',
            'tel' => 'max:15'
        ]);

        if (!Util::validaCPF($request->cpf)) {
            session()->flash("erro", "O CPF informado é inválido");
            return redirect()->back();
        }

        $aluno = new Aluno;
        $aluno->nome = $request->nome;
        $aluno->email = strtolower($request->email);
        $aluno->senha = Hash::make($request->senha);
        $aluno->cpf = $request->cpf;
        $aluno->telefone = $request->telefone;
        $aluno->nascimento = $request->nascimento;
        $aluno->rua = $request->rua;
        $aluno->complemento = $request->complemento;
        $aluno->numero = $request->numero;
        $aluno->bairro = $request->bairro;
        $aluno->cidade = $request->cidade;
        $aluno->estado = $request->estado;
        $aluno->cep = $request->cep;
        $aluno->ultimo_acesso = date("Y-m-d");
        $aluno->save();
        session()->put(["aluno" => $aluno->toArray()]);
        if (session()->get("produto_adicionar")) {
            return redirect(session()->get("produto_adicionar"));
        } else {
            return redirect()->route('site.minha-area');
        }
    }

    public function detalhes(Aluno $aluno)
    {
        return view("painel.alunos.detalhes", ["aluno" => $aluno]);
    }

    public function resetar_senha(Aluno $aluno)
    {
        $aluno->senha = Hash::make("12345");
        $aluno->save();

        toastr()->success("Senha resetada com sucesso!");

        return redirect()->back();
    }

    public function logar(Request $request)
    {
        $aluno = Aluno::where("email", strtolower($request->email))->first();
        if ($aluno && Hash::check($request->senha, $aluno->senha)) {
            $aluno->ultimo_acesso = date("Y-m-d");
            $aluno->save();
            session()->put(["aluno" => $aluno->toArray()]);
            Log::channel('acessos')->info('LOGIN: O aluno ' . $aluno->nome . ' logou no sistema.');
            if (session()->get("produto_adicionar")) {
                return redirect(session()->get("produto_adicionar"));
            } else {
                return redirect()->route('site.minha-area');
            }
        } else {
            session()->flash("erro", "E-mail ou senha incorretos");
            return redirect()->back();
        }
    }

    public function deslogar()
    {
        session()->forget("aluno");
        return redirect()->route("site.index");
    }

    public function recuperar_senha(Request $request)
    {
        $aluno = Aluno::where("email", $request->email)->first();
        if (!$aluno) {
            session()->flash("erro", "Não existe uma conta com o e-mail informado");
            return redirect()->back();
        } else {
            $nova_senha = Str::random(6);
            $aluno->senha = Hash::make($nova_senha);
            $aluno->save();
            $file = "Olá <b>" . $aluno->nome . "</b><br>";
            $file .= "Estamos enviando uma senha para que consiga acessar nosso sistema !<br>";
            $file .= "Caso deseje, você poderá alterá-la facilmente acessando o seu painel de aluno no menu 'Meus Dados'. Após isso, basta informar a senha recebida no email no campo 'Senha Antiga' e a senha desejada no campo 'Nova Senha'.<br>";
            $file .= "<br><br>Nova Senha: " . $nova_senha;
            if (Email::enviar($file, "Nova senha", $aluno->email)) {
                session()->flash("sucesso", "Uma senha temporária foi enviada para o e-mail informado no seu cadastro. <br>Dica: Confira sempre novas mensagens nas pastas spam ou lixo eletrônico de seu e-mail ");
                return redirect()->back();
            } else {
                session()->flash("erro", "Não foi possível enviar um e-mail com sua nova senha temporária no momento. Por favor, tente mais tarde.");
                return redirect()->back();
            }
        }
    }
}
