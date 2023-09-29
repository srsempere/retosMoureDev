<?php

/*
 Enunciado: Crea un programa que cuente cuantas veces se repite cada palabra y que muestre el recuento final de todas ellas.
 - Los signos de puntuación no forman parte de la palabra.
 - Una palabra es la misma aunque aparezca en mayúsculas y minúsculas.
 - No se pueden utilizar funciones propias del lenguaje que lo resuelvan automáticamente.
*/

$cad_prueba = file_get_contents('texto.txt');


// LIMPIADO DE TEXTO.
$texto = strtolower($cad_prueba);

$texto = preg_replace('/[.,;:¡!?"\'-]/', '', $texto);

// Reemplazar todos los caracteres de espacio en blanco (espacios, saltos de línea, etc.) con un espacio
$texto = preg_replace('/\s+/', ' ', $texto);

// DIVISÓN DEL TEXTO
$array_cadena = explode(' ', trim($texto));

$array_ocurrencias = [];


// Recorro el array para comprobar si esa palabra ha salido antes y está dentro de $array ocurrencias
foreach ($array_cadena as $palabra) {
    if (isset($array_ocurrencias[$palabra])) {
        $array_ocurrencias[$palabra]++;
    } else {
        $array_ocurrencias[$palabra] = 1;
    }
}
?>

<ul>

<?php
foreach ($array_ocurrencias as $palabra => $ocurrencia) {
?>
    <li><?= $palabra . ': ' . $ocurrencia . ' veces aparece.'?></li>
<?php
} ?>
</ul>
<?php
