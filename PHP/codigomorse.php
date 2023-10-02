<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Código Morse</title>
</head>

<body>
    <?php
    /**
     Enunciado: Crea un programa que sea capaz de transformar texto natural a código morse y viceversa.
        - Debe detectar automáticamente de qué tipo se trata y realizar la conversión.
        - En morse se soporta raya "—", punto ".", un espacio " " entre letras o símbolos y tres espacios entre palabras "  ".
        - El alfabeto morse soportado será el mostrado en https://es.wikipedia.org/wiki/Código_morse.
     */

    // Se resuelve con las siguientes funciones:
    //- En el caso de morse a Texto natural:  in_array, para verificar que existe el valor. array_search, para devolver la clave que será
    //  la letra traducida.
    // - En el caso de Texto natural a morse, usamos array_flip para intercambiar claves por llaves y viceversa, y luego buscamos
    // como en el paso anterior.

    function recoge(string $arg): string
    {
        return isset($_POST[$arg]) ? trim($_POST[$arg]) : '';
    }

    function descrifra(string $msg, array $natural_a_morse, array &$res)
    {
        if (preg_match('/[.-]/', $msg)) {
            // El mensaje contiene código morse.
            $array_palabras_morse = explode('/', $msg);
            foreach ($array_palabras_morse as $palabra_morse) {
                $array_caracteres_palabra_morse = explode(' ', $palabra_morse);
                $array_palabra_natural = [];
                foreach ($array_caracteres_palabra_morse as $caracter_morse) {
                    if (array_search($caracter_morse, $natural_a_morse)) {
                        $array_palabra_natural[] = array_search($caracter_morse, $natural_a_morse);
                    }
                }
                $res[] = implode('', $array_palabra_natural);
            }

        } else {
            // El mensaje está en código natural.
            $morse_a_natural = array_flip($natural_a_morse);
            $array_msg = explode(' ', $msg);
            foreach ($array_msg as $palabra) {
                // Creo el array en el que insertar cada caracter.
                $array_palabra_en_morse = [];
                $array_palabra = mb_str_split($palabra);
                // Ahora, se selecciona caracter por caracter y se busca su equivalencia en el array $natural_a_morse.
                foreach ($array_palabra as $caracter) {
                    if (array_search(mb_strtolower($caracter), $morse_a_natural)) {  // Falta un paréntesis de cierre aquí
                        // Se van almacenando las equivalencias en morse en $array_palabra_en_morse.
                        $array_palabra_en_morse[] = array_search(mb_strtolower($caracter), $morse_a_natural);  // También falta un punto y coma al final aquí
                        // Se hace un implode teniendo en cuenta los espacios, para tener la palabra formada en morse.
                    }
                }
                // Se unen todos los carácteres morse en una sola palabra OJO LOS ESPACIOS! Entre caracteres 1 espacio.
                $res[] = implode(' ', $array_palabra_en_morse);
            }
        }
    }


    $natural_a_morse = [

        'a' => '.-',
        'b' => '-...',
        'c' => '-.-.',
        'ch' => '----',
        'd' => '-..',
        'e' => '.',
        'f' => '..-.',
        'g' => '--.',
        'h' => '....',
        'i' => '..',
        'j' => '.---',
        'k' => '-.-',
        'l' => '.-..',
        'm' => '--',
        'n' => '-.',
        'ñ' => '--.--',
        'o' => '---',
        'p' => '.--.',
        'q' => '--.-',
        'r' => '.-.',
        's' => '...',
        't' => '-',
        'u' => '..-',
        'v' => '...-',
        'w' => '.--',
        'x' => '-..-',
        'y' => '-.--',
        'z' => '--..',
        '0' => '-----',
        '1' => '.----',
        '2' => '..---',
        '3' => '...--',
        '4' => '....-',
        '5' => '.....',
        '6' => '-...',
        '7' => '--...',
        '8' => '---..',
        '9' => '----.',
        '.' => '.-.-.-',
        ',' => '--..--',
        '?' => '..--..',
        '"' => '.-..-.',
        '/' => '-..-.',
    ];
    $res = [];
    $msg = recoge('msg');
    if ($msg !== '') {
        descrifra($msg, $natural_a_morse, $res);
        $msg_descifrado = implode('/', $res);
    }



    ?>

    <h1>Traductor de morse.</h1>
    <p>Bienvendi@, aquí podrás descrifrar tu mensaje.</p>
    <form action="" method="post">
        <label for="msg">Inserta tu mensaje</label>
        <input type="text" name="msg" id="msg" name='<?= htmlspecialchars(isset($msg)) ?? ''; ?>'>
        <button type="submit">Enviar</button>
    </form>

    <?php

    if (isset($msg_descifrado)) {
    ?>
        <p><?= $msg_descifrado; ?></p>
    <?php
    }

    ?>
</body>

</html>
