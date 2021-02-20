<?php

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

//$pdo->exec('CREATE TABLE students (id INTEGER PRIMARY KEY, name TEXT, birth_date TEXT);');

$createTables = '
    CREATE TABLE IF NOT EXISTS students (
        id integer primary key,
        name text,
        birth_date text
    );

    CREATE TABLE IF NOT EXISTS phones (
        id integer primary key,
        area_code text,
        number text,
        student_id integer,
        foreign key (student_id) references students(id)
    );
';

$pdo->exec($createTables);

echo 'Tabelas criadas';