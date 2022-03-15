<?php

namespace App\Classes;

use Illuminate\Support\Facades\Storage;

class Util
{

    public static function convertYoutube($string)
    {
        return preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            "<iframe width=\"350\" height=\"200\" src=\"//www.youtube.com/embed/$2\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>",
            $string
        );
    }

    public static function convertStringToDate($string)
    {
        $year = substr($string, 0, 4);
        $month = substr($string, 4, 2);
        $day = substr($string, 6, 2);

        return $day . "/" . $month . "/" . $year;
    }

    public static function convertDateToString($string)
    {
        $year = substr($string, 6, 4);
        $month = substr($string, 3, 2);
        $day = substr($string, 0, 2);

        return $year . "-" . $month . "-" . $day;
    }

    public static function limparURL($url)
    {
        $disallowed = array('http://', 'https://', 'com/');
        $tratada = null;

        foreach ($disallowed as $d) {
            if (strpos($url, $d) === 0) {
                $tratada =  str_replace($d, '', $url);
            }
        }

        if ($tratada) {
            if (strpos($tratada, '/') > 0) {
                return str_replace('/', '', $tratada);
            }
        }



        if ($tratada) {
            return $tratada;
        } else {
            return $url;
        }
    }


    public static function limparString($string)
    {
        $string = str_replace(' ', '', $string); // Remove espaços

        return preg_replace('/[^A-Za-z0-9]/', '', $string); // Remove caracteres especiais
    }

    public static function limparLivewireTemp()
    {
        $storage = Storage::disk('local');
        foreach ($storage->allFiles('livewire-tmp') as $filePathname) {
            $stamp = now()->subSeconds(4)->timestamp;
            if ($stamp > $storage->lastModified($filePathname)) {
                $storage->delete($filePathname);
            }
        }
    }

    public static function validaCPF($cpf) {
 
        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
         
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
    
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
    
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    
    }
}
