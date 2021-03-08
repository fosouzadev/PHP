<?php

namespace App\Http\Controllers;

use App\Temporada;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada)
    {
        $episodios = $temporada->episodios;
        $temporadaId = $temporada->id;

        return view('episodios.index', compact('episodios', 'temporadaId'));
    }

    public function assistir(Temporada $temporada, Request $request)
    {
        echo 'ok';
    }
}
