<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @Entity
 */
class Curso
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private $nome;

    /**
     * @ManyToMany(targetEntity="Aluno", inversedBy="cursos")
     * @var Collection $alunos
     */
    private $alunos;

    public function __construct()
    {
        $this->alunos = new ArrayCollection();
    }

    public function id() : int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function nome() : string
    {
        return $this->nome;
    }

    public function setNome(string $nome) : self
    {
        $this->nome = $nome;
        return $this;
    }

    public function addAluno($aluno) : self
    {
        $this->alunos->add($aluno);
        return $this;
    }

    public function alunos() : Collection
    {
        return $this->alunos;
    }
}