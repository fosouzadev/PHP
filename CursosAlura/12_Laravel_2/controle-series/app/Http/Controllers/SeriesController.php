<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
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

    public function store(SeriesFormRequest $request)
    {
        //$request->validate([
        //   'nome' => 'required|min:3'
        //]);

        //$nome = $request->get('nome'); // ou
        $nome = $request->nome;
        //$formValues = $request->all();

        //$serie = new Serie();
        //$serie->nome = $nome;
        //$serie->save(); // ou
        $serie = Serie::create([ 'nome' => $nome ]);
        //$serie = Serie::create($formValues);

        $qtdTemporadas = $request->qtd_temporadas;
        $qtdEpisodios = $request->ep_por_temporada;

        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);

            for ($j = 1; $j <= $qtdEpisodios; $j++) {
                $temporada->episodios()->create(['numero' => $j]);
            }
        }

        //$request->session()->put('mensagem', "Série criada com sucesso");
        $request->session()->flash('mensagem', "Série {$serie->id} criada com $qtdTemporadas temporadas e $qtdEpisodios episódios");

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
