<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome'];
    protected $appends = ['links'];

    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }

    /* Eloquent possui um padrão para salvar um tipo
       Criamos um metodo com o formato "set NomeAtributo Attribute" tratado para o tipo que queremos
       Esse método é chamado de "Mutator"
     */
    public function setNomeAttribute(string $nome)
    {
        $this->attributes['nome'] = strtoupper($nome);
    }

    public function getLinksAttribute($links): array
    {
        return [
            'self' => '/api/series/' . $this->id,
            'episodios' => '/api/series/' . $this->id . '/episodios'
        ];
    }
}
