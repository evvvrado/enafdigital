<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Configuracao;

class ClinicaController extends Controller
{
    //

    public function consultar(){
        return view("painel.clinicas.consultar");
    }
    
    public function cadastrar(){
        return view("painel.clinicas.cadastrar");
    }

    public function editar(){
        return view("painel.clinicas.editar");
    }
}