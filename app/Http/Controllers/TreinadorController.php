<?php

namespace App\Http\Controllers;
use View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ProfessorHotsite;


class TreinadorController extends Controller
{

    public function treinador($slug){
        $hotsite = ProfessorHotsite::where("slug", $slug)->first();
        $professor = $hotsite->professor;
        return view("site.treinador", ['professor' => $professor]);
    }

    
}

