<?php

namespace App;

class Serie extends \Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;

    // propriedades que podem ser manipuladas com Serie::create
    protected $fillable = ['nome'];

    // relacionamento entre series e temporadas
    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }
}
