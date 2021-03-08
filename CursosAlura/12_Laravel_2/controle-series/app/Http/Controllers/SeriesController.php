<?php

namespace App\Http\Controllers;

use App\Episodio;
use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use App\Temporada;
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

    public function store(SeriesFormRequest $request, CriadorDeSerie $criadorDeSerie)
    {
        $nome = $request->nome;
        $qtdTemporadas = $request->qtd_temporadas;
        $qtdEpisodios = $request->ep_por_temporada;

        $serie = $criadorDeSerie->criarSerie($nome, $qtdTemporadas, $qtdEpisodios);

        //$request->session()->put('mensagem', "Série criada com sucesso");
        $request->session()->flash('mensagem', "Série {$serie->id} criada com $qtdTemporadas temporadas e $qtdEpisodios episódios");

        return redirect()->route('listar-series');
    }

    public function destroy(Request $request, RemovedorDeSerie $removedorDeSerie)
    {
        $id = $request->id;
        $serie = $removedorDeSerie->removerSerie($id);

        $request->session()->flash('mensagem', "Série {$serie->nome} excluída com sucesso");

        return redirect('/series');
    }

    public function editaNome(int $id, Request $request)
    {
        $serie = Serie::find($id);
        $novoNome = $request->nome;
        $serie->nome = $novoNome;
        $serie->save();
    }
}
