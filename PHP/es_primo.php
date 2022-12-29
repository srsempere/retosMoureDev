<?php

function es_primo($num)
{
    if ($num < 1) {
        return false;
    }

    for ($i=2; $i < $num ; $i++) {
        if (($num % $i) === 0) {
            return false;
        }
    }
    return true;
}

function dame_rango($inicio, $fin): array
{
    $rango = [];

    for ($i= $inicio; $i <= $fin ; $i++) {
        array_push($rango, $i);
    }
    return $rango;
}




// Escribir los números primos de 1 al 100:

foreach (dame_rango(1, 100) as $key => $value) {
    if (es_primo($value)) {
        echo $value ."\n";
    }
}
