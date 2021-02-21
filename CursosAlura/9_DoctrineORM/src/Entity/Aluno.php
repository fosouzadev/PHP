<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @Entity(repositoryClass="Alura\Doctrine\Repository\AlunoRepository")
 */
class Aluno
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
     * @OneToMany(targetEntity="Telefone", mappedBy="aluno", cascade={"remove", "persist"})
     */
    private $telefones;

    /**
     * @ManyToMany(targetEntity="Curso", mappedBy="alunos")
     * @var Collection $cursos
     */
    private $cursos;

    public function __construct()
    {
        $this->telefones = new ArrayCollection();
        $this->cursos = new ArrayCollection();
    }

    public function id() : int
    {
        return $this->id;
    }

    public function setId(int $id) : self
    {
        $this->id = $id;
        return $this;
    }

    public function nome() : string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;
        return $this;
    }

    public function addTelefone(Telefone $telefone): self
    {
        $this->telefones->add($telefone);
        $telefone->setAluno($this);
        return $this;
    }

    public function telefones(): Collection
    {
        return $this->telefones;
    }

    public function AddCurso(Curso $curso): self
    {
        $this->cursos->add($curso);
        $curso->addAluno($this);
        return $this;
    }

    public function cursos(): Collection
    {
        return $this->cursos;
    }
}