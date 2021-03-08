<?php

namespace App\Services;

use App\Serie;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{
    public function criarSerie(string $nome, int $qtdTemporadas, int $qtdEpisodios): Serie
    {
        $serie = null;

        //DB::transaction(function() use ($nome, $qtdTemporadas, $qtdEpisodios, &$serie) {
        DB::beginTransaction();

        $serie = Serie::create(['nome' => $nome]);

        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);

            for ($j = 1; $j <= $qtdEpisodios; $j++) {
                $temporada->episodios()->create(['numero' => $j]);
            }
        }

        DB::commit();
        //});

        return $serie;
    }
}
