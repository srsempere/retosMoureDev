<?php

// implementación recursiva.
function fibonacci_rec($num)
{
    if ($num == 0) {
        return 0;
    } else if ($num == 1) {
        return 1;
    } else {
        return fibonacci_rec($num - 1) + fibonacci_rec($num - 2);
    }
}

// implementación iterativa.

function fibonacci_iter($num)
{
    if ($num < 0) {
        return false;
    }

    $a = 0;
    $b = 1;

    for ($i=0; $i <= $num ; $i++) {
        $c = $a + $b;
        $a = $b;
        $b = $c;
    }
    return $a;
}

// var_dump(fibonacci_rec(50));

var_dump(fibonacci_iter(50));
