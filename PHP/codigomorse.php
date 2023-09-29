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
        - En morse se soporta raya "—", punto ".", un espacio " " entre letras o símbolos y dos espacios entre palabras "  ".
        - El alfabeto morse soportado será el mostrado en https://es.wikipedia.org/wiki/Código_morse.
    */

    // Se resuelve con las siguientes funciones:
    //- En el caso de morse a Texto natural:  in_array, para verificar que existe el valor. array_search, para devolver la clave que será
    //  la letra traducida.
    // - En el caso de Texto natural a morse, usamos array_flip para intercambiar claves por llaves y viceversa, y luego buscamos
    // como en el paso anterior.

    function recoge(string $arg): string | null
    {
        return isset($_POST[$arg]) ? trim($_POST[$arg]) : null;
    }

    function descrifra(string $msg)
    {

    }

    $alfabeto_morse = [
        'a' => '.-',
        'b' => '-...',
        'c'=> '-.-.',
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

    $ln = recoge('msg');

    ?>

    <h1>Traductor de morse.</h1>
    <p>Bienvendi@, aquí podrás descrifrar tu mensaje.</p>
    <form action="" method="post">
        <label for="msg">Inserta tu mensaje</label>
        <input type="text" name="msg" id="msg" name='<?= htmlspecialchars(isset($msg)) ?? ''; ?>'>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
