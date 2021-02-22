<?php

namespace Alura\Doctrine\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{
    public function getEntityManager(): EntityManagerInterface
    {
        $rootDir = __DIR__ . '/../..';
        $config = Setup::createAnnotationMetadataConfiguration(
            [$rootDir . '/src'],
            true  // isDevMode
        );

        $connection = [
            // sqlite
            'driver' => 'pdo_sqlite',
            'path' => $rootDir . '/var/data/banco.sqlite'

            // mysql
            // 'driver' => 'pdo_mysql',
            // 'host' => 'localhost',
            // 'dbname' => 'curso_doctrine',
            // 'user' => 'root',
            // 'password' => 'senhalura'
        ];

        return EntityManager::create($connection, $config);
    }
}