<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Decimal a Binario</title>
</head>

<body>

    <?php

    /**
     * Convierte un número decimal a binario.
     *
     * Esta función toma un número decimal como entrada y devuelve su representación binaria como una cadena.
     * La conversión se realiza mediante un bucle que divide el número decimal entre 2 en cada iteración,
     * almacenando el resto en un array. El proceso continúa hasta que el cociente es 0. Finalmente, el array
     * de restos se invierte y se une para obtener la representación binaria del número decimal.
     *
     * @param int $decimal El número decimal a convertir.
     *
     * @return string La representación binaria del número decimal.
     *
     * @example
     *  echo decimalToBinary(10);  // Output: 1010
     */
    function decimalToBinary($decimal)
    {
        $currNum = $decimal;
        $array_restos = [];
        $cociente = null;

        while ($cociente !== 0 && isset($decimal)) {
            $resto  = $currNum % 2;
            $currNum = floor($currNum / 2);
            $cociente = intval($currNum);
            $array_restos[] = $resto;
        }
        return implode('', array_reverse($array_restos));
    }

    $decimal = isset($_GET['decimal']) && is_numeric($_GET['decimal']) ? $_GET['decimal'] : null;
    $binario = decimalToBinary($decimal);

    ?>

    <h1>De decimal a binario</h1>
    <p>Enunciado: Crea un programa se encargue de transformar un número decimal a binario sin utilizar funciones propias del lenguaje que lo hagan directamente. </p>
    <form action="" method="get">
        <label for="decimal">Introduce tu número decimal:</label>
        <input type="text" name="decimal" id="decimal" value="<?= htmlspecialchars($decimal ?? '') ?>" size="9">
        <button type="submit">Convertir</button>
    </form>
    <?php
    if (isset($decimal)) {
    ?>
        <p>El número <?= htmlspecialchars($decimal) ?> en decimal, corresponde con el número <?= $binario ?> en binario.</p>
    <?php
    }
    ?>
</body>

</html>
