<?php

$password = "123456";

$md5 = md5($password);
echo 'MD5 ' . $md5 . PHP_EOL; // sempre igual
# e10adc3949ba59abbe56e057f20f883e

$bcrypt = password_hash($password, PASSWORD_BCRYPT);
$valid = password_verify($password, $bcrypt);
echo $valid . ' BCRYPT ' . $bcrypt . PHP_EOL; // sempre diferente
# $2y$10$AFmWjABOJx5b1W6j450eUee/58H/FsL7cKlTppZuJapcK8e9EMgs2

$argon2i = password_hash($password, PASSWORD_ARGON2I);
$valid = password_verify($password, $argon2i);
echo $valid . ' ARGON2I ' . $argon2i . PHP_EOL; // sempre diferente
# $argon2i$v=19$m=65536,t=4,p=1$ZUFIVGt4WDlPdmh1MWlGSw$4AaGr+2aPZQk+R/FYxruU9o6oOhMcXehuvP0srrvHXA

$argon2d = password_hash($password, PASSWORD_ARGON2ID);
$valid = password_verify($password, $argon2d);
echo $valid . ' ARGON2D ' . $argon2d . PHP_EOL;  // sempre diferente
# $argon2id$v=19$m=65536,t=4,p=1$RHJtdGFKbktNRlk4eTFZaA$FoDWCF3RT8l3P0iQGVg3bqL7eTblyClNfjiYehPl6W4