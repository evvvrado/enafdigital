<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalogo;

class AssessoriaController extends Controller
{
    public function midiakit()
    {
        return view("painel.assessoria.midiakit");
    }
    public function cronograma()
    {
        return view("painel.assessoria.cronograma");
    }
}
