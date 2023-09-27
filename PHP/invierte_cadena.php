<?php
/*
Enunciado: Crea un programa que invierta el orden de una cadena de texto sin usar funciones propias del lenguaje que lo hagan de forma automática. Si le pasamos "Hola mundo" nos retornaría "odnum aloH"
*/

$cadena = readline('Introduce la cadena que desear invertir: ');
$array_cadena = mb_str_split($cadena);
$long_array = count($array_cadena);
$res = [];

for ($e = ($long_array - 1), $i = 0; $e >= 0; $e--, $i++) {
    $res[$i] = $array_cadena[$e];
}

$cadena_invertida = implode('', $res);
echo $cadena_invertida;
