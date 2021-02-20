<?php

namespace alura;

class Pessoa 
{
    private int $id;
    private string $name;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function id()
    {
        return $this->id;
    }

    public function name()
    {
        return $this->name;
    }
}

$data = [
    345 => new Pessoa(345, 'joao'),
    545 => new Pessoa(545, 'maria')
];

var_dump($data);

echo "{$data[345]->id()} {$data[345]->name()}" . PHP_EOL;

if (array_key_exists(545, $data)) {
    echo "{$data[545]->id()} {$data[545]->name()}";
}