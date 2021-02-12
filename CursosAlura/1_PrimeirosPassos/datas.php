<?php

function printStr (string $value) : void {
    echo $value . PHP_EOL;
}

date_default_timezone_set('America/Sao_Paulo');

printStr( date("l") );      // dia da semana em ingles
printStr( date("F") );      // mes em ingles
printStr( date('d/m/y') );  // 12/02/21
printStr( date('d/m/Y') );  // 12/02/2021
printStr( date('h:i:s A') );  // 10:11:06 PM
printStr( date('H:i:s') );    // 22:13:06 PM

printStr(PHP_EOL);
$now = new DateTime();
$now2 = new DateTime('now');
$yesterday = new DateTime('yesterday');
$dia15 = new DateTime('2021-02-15');

printStr( $now->format('d/m/Y H:i:s') );
printStr( $now2->format('d/m/Y H:i:s') );
printStr( $yesterday->format('d/m/Y H:i:s') );
printStr( $dia15->format('d/m/Y H:i:s') );

$dateStr = '2020/02/25';
$formatDateStr = 'Y/m/d';
$dia25 = DateTime::createFromFormat($formatDateStr, $dateStr);

printStr( $dia25->format('d/m/Y H:i:s') );

printStr(PHP_EOL);
$ent = new DateTime('09:00');
$sai = new DateTime('18:00');
$intervalo = $ent->diff($sai);

printStr('horas: ' . $intervalo->h);

printStr(PHP_EOL);
$timezone = new DateTimeZone('America/Sao_Paulo');
$agora = new DateTime('now', $timezone);

printStr($agora->format('d/m/y H:i:s'));

printStr(PHP_EOL);
$dt = new DateTime('2021/12/25');
$dt->add(new DateInterval('P1D')); // um dia, altera o proprio objeto $dt
printStr( $dt->format('d/m/y') );

$dt = new DateTimeImmutable('2021/12/25');
$dt2 = $dt->add(new DateInterval('P1D')); // um dia, não altera o proprio objeto $dt, retorna uma nova data
printStr( $dt->format('d/m/y') );
printStr( $dt2->format('d/m/y') );

printStr(PHP_EOL);
$inicio = new DateTime('2022-11-21');
$intervalo = new DateInterval('P4Y'); // 4 anos
$periodo = new DatePeriod($inicio, $intervalo, 5);

foreach ($periodo as $data) {
    printStr($data->format('d/m/Y'));
}