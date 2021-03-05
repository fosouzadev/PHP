<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    public $timestamps = false;

    // propriedades que podem ser manipuladas com Episodio::create
    protected $fillable = ['numero'];

    public function temporada()
    {
        return $this->belongsTo(Temporada::class);
    }
}
