<?php

namespace alura\banco\traits;

// é um elemento que implementa método que podem ser injetados em qualquer classe
trait AcessoAtributos {

    public function __get(string $nomeAtributo)
    {
        $nomeMetodo = 'obter' . ucfirst($nomeAtributo);
        return $this->$nomeMetodo();
    }

    public function __set($nomeAtributo, $valor)
    {
        $nomeMetodo = 'definir' . ucfirst($nomeAtributo);
        $this->$nomeMetodo($valor);
    }

}