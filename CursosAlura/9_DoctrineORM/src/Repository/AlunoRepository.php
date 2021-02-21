<?php

namespace Alura\Doctrine\Repository;

use Doctrine\ORM\EntityRepository;
use Alura\Doctrine\Entity\Aluno;

// configuramos na classe Aluno que essa classe será o repository padrão
class AlunoRepository extends EntityRepository
{
    // utilizando string para o DQL
    // public function buscaCursosPorAluno()
    // {
    //     try {

    //         $classeAluno = Aluno::class;
    //         $dql = "SELECT aluno, telefones, cursos FROM $classeAluno aluno JOIN aluno.telefones telefones JOIN aluno.cursos cursos";
    //         $query = $this->getEntityManager()->createQuery($dql);
    //         return $query->getResult();

    //     } catch(Exception $ex) {
    //         echo PHP_EOL . $ex->getMessage() . PHP_EOL;
    //     }
    // }

    // utilizando QueryBuilder
    public function buscaCursosPorAluno()
    {
        try {

            $query = $this->createQueryBuilder('a')
                ->join('a.telefones', 't')
                ->join('a.cursos', 'c')
                ->addSelect('t')
                ->addSelect('c')
                ->getQuery();
                
            return $query->getResult();

        } catch(Exception $ex) {
            echo PHP_EOL . $ex->getMessage() . PHP_EOL;
        }
    }
}