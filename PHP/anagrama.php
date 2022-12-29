<?php


/**
 * Función que comprueba si dos palabras son anagramas.
 *
 * @param string $str1
 * @param string $str2
 * @return bool
 */
function es_anagrama($str1, $str2): bool
{
    if (!is_string($str1) || !is_string($str2)) {
        return false;
    }
    if ($str1 !== $str2) {
        $string1 = strtolower(str_replace(" ","", $str1));
        $string2 = strtolower(str_replace(" ","", $str2));
        $string1 = str_split($string1);
        sort($string1);
        $string1 = implode("", $string1);
        $string2 = str_split($string2);
        sort($string2);
        $string2 = implode("", $string2);
        if (strcmp($string1,$string2) === 0) {
            return true;
        }
        return false;
    } else {
        return false;
    }
}

$str1 = readline("Introduce la primera palabra: ");
$str2 = readline("Introduce la segunda palabra ");

var_dump(es_anagrama($str1,$str2));
