<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    public $timestamps = false;
    protected $fillable = ['temporada', 'numero', 'assistido', 'serie_id'];

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    /* Eloquent possui um padrão para retornar tipos
       Criamos um metodo com o formato "get NomeAtributo Attribute" definindo o tipo de retorno
       Esse método é chamado de "Accessor"
     */
    public function getTemporadaAttribute($temporada): int
    {
        return $temporada;
    }

    public function getAssistidoAttribute($assistido): bool
    {
        return $assistido;
    }
}
