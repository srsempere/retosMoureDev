<?php
// Calcular el área de un polígono.


/**
 * Triángulo:
 * Área = (base * altura) / 2
 *
 * Cuadrado:
 * Área = lado^2 (lado x lado)
 *
 * Rectángulo:
 * Área = base x altura
 */


function area_poligono($poligono)
{
    function areaTriangulo($base, $altura)
    {
        return ($base * $altura) / 2;
    }

    function areaCuadrado($lado)
    {
        return $lado ** 2;
    }

    function areaRectangulo($base, $altura)
    {
        return $base * $altura;
    }

    switch ($poligono) {
        case 'Triángulo' || 'triángulo':
            $base = readline('Introduce la base del triángulo: ');
            $altura = readline('Introduce la altura del triángulo: ');
            echo "El área de tu triángulo es: " . areaTriangulo($base, $altura) . "\n";
            break;
        case 'Cuadrado'|| 'cuadrado':
            $lado = readline('Introduce la longitud de uno de los lados de tu cuadrado: ');
            echo "El área de tu cuadrado es: " . areaCuadrado($lado) . "\n";
            break;
        case 'Rectángulo' || 'rectángulo':
            $base = readline('Introduce la base de tu rectángulo: ');
            $altura = readline('Introduce la altura de tu rectángulo: ');
            echo 'El área de tu rectángulo es: ' . areaRectangulo($base, $altura) . "\n";
            break;
        default:
            echo "El polígono que has introducido no es válido:";
            break;
    }
}

$poligono = readline('Introduce tu polígono: (Triángulo, cuadrado o rectángulo): ');
area_poligono($poligono);
