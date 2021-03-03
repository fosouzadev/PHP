<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        //$series = Serie::all();
        $series = Serie::query()->orderBy('nome')->get();

        $mensagem = $request->session()->get('mensagem');
        //$request->session()->remove('mensagem'); // não necessário quando sessão criada com metodo flash

        return view('series.index', [ 'series' => $series, 'mensagem' => $mensagem ]);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        //$nome = $request->get('nome'); // ou
        $nome = $request->nome;

        //$serie = new Serie();
        //$serie->nome = $nome;
        //$serie->save(); // ou
        $serie = Serie::create([
            'nome' => $nome
        ]);

        //$request->session()->put('mensagem', "Série criada com sucesso");
        $request->session()->flash('mensagem', "Série criada com sucesso");

        return redirect()->route('listar-series');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        Serie::destroy($id);
        $request->session()->flash('mensagem', "Série excluída com sucesso");

        return redirect('/series');
    }
}
