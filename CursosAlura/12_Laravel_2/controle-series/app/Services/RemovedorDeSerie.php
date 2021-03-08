<?php

namespace App\Services;

use App\Episodio;
use App\Serie;
use App\Temporada;
use Illuminate\Support\Facades\DB;

class RemovedorDeSerie
{
    public function removerSerie(int $id): Serie
    {
        $serie = Serie::find($id);

        DB::transaction(function() use ($serie) {
            $serie->temporadas->each(function (Temporada $temporada) {
                $temporada->episodios()->each(function (Episodio $episodio) {
                    $episodio->delete();
                });
                $temporada->delete();
            });

            //Serie::destroy($id);
            $serie->delete();
        });

        return $serie;
    }
}
