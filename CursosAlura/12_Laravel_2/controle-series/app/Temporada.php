<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    public $timestamps = false;

    // propriedades que podem ser manipuladas com Temporada::create
    protected $fillable = ['numero'];

    // relacionamento entre temporada e episodio
    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function getEpisodiosAssistidos(): Collection
    {
        return $this->episodios->filter(function (Episodio $episodio) {
           return $episodio->assistido;
        });
    }
}
