<?php
    $acao = 'estudo de php';
    echo $acao;

    $varFalse = false;
    $varTrue = true;
?>

<?= $acao ?>

<?php if ($varFalse): ?>
    Exibe texto if
<?php else: ?>
    Exibe texto else
<?php endif; ?>

<?php if ($varTrue): ?>
    Exibe texto if
<?php else: ?>
    Exibe texto else
<?php endif; ?>