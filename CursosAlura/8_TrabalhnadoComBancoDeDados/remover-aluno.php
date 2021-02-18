<?php

use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';


$pdo = ConnectionCreator::createConnection();

$statement = $pdo->prepare('DELETE FROM students WHERE id = :id');
$statement->bindValue(':id', 2, PDO::PARAM_INT);

if ($statement->execute()) {
    echo 'Excluido';
}