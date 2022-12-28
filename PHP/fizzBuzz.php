<?php

for ($i=0; $i < 101 ; $i++) {
    $divisiblebythree = $i % 3 == 0;
    $divisiblebyfive = $i % 5 == 0;

    if ($divisiblebythree && $divisiblebyfive) {
        echo 'fizzbuzz' . "\n";
    } else if ($divisiblebythree) {
        echo 'fizz' . "\n";
    } else if ($divisiblebyfive) {
        echo 'buzz' . "\n";
    } else {
        echo $i . "\n";
    }
}
