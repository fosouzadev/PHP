<?php declare(strict_types=1); // impede que seja passado um tipo diferente do definido no parametro

namespace alura;

class ArrayUtil {

    public static function OrdenarAsc(array &$array) {
        sort($array);
    }

    public static function ExcluirItem($item, array &$array) {
        // $strict true compara o valor e o tipo
        $posicao = array_search($item, $array, true);
        
        if ($posicao !== false)
            unset($array[$posicao]);
    }

    public static function Diferenca(array $dados1, array $dados2) : array {
        return array_diff($dados1, $dados2);
    }

    public static function Unir(array $dados1, array $dados2) : array {
        return array_merge($dados1, $dados2);
    }

    public static function Combine(array $dados1, array $dados2) : array {
        return array_combine($dados1, $dados2);
    }

    public static function ExisteChave(string $chave, array $array) : bool {
        return array_key_exists($chave, $array);
    }
}