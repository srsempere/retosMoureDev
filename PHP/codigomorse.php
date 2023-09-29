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

    function descrifra(string $msg, array $alfabeto_morse)
    {
        $res = [];
        $alfabeto_morse_inver = array_flip($alfabeto_morse);

        // Saneado
        $msg = strtolower($msg);
        $msg = preg_replace('/[.,;:!?"\'-]/', '', $msg);
        $msg = preg_replace('/\s+/', ' ', $msg);

        // Coger el mensaje y cortarlo en trozos.
        $array_msg = explode(' ', $msg);

        foreach ($array_msg as $key => $value) {
            var_dump($value);
            // es la palabra, da igual si en morse o lenguaje natural.
            $palabra = $value;

            if (in_array($palabra[0], $alfabeto_morse_inver)) {
                // Está metiendo lenguaje natural. Usar $alfabeto_morse_inver porque sus valores es la correspondencia.
                $array_letras_palabra = mb_str_split($palabra);

                foreach ($array_letras_palabra as $key => $caracter) {
                    var_dump($caracter);
                    if (in_array($caracter, $alfabeto_morse_inver)) {
                        $res[] = array_search($caracter, $alfabeto_morse_inver);
                    }
                }
                return $res;
            } elseif (true) {
                // Está metiendo lenguaje morse. Usar $alfabeto_morse_inver ...
            } else {
                return 'No estás introduciendo ni español ni lenguaje morse válido.';
            }
        }
    }

    $alfabeto_morse = [
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

    $msg = recoge('msg');
    if ($msg !== '') {
        $res = descrifra($msg, $alfabeto_morse);
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

        if (isset($res)) {
            // var_dump(implode(' ', $res));

        }

    ?>
</body>

</html>
