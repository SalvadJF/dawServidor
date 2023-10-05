<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isograma</title>
</head>
<body>
    <?php require 'auxIsograma.php';

    $iso = obtenerTexto('palabra');

    ?>

    <h1>ISOGRAMA</h1>

    <form action="" method="get">
        <label for="cabezado">Introduzca su Palabra</label>
        <br>
        <label for="palabra"></label>
        <input type="text" name="palabra" id="palabra">
        <br>
        <button type="submit" name="boton">Enviar</button>
    </form>

    <?php

    $errores = [];

    comprobarTexto($iso, $errores);

    if (!empty($errores)) {

        mostrarErrores($errores);
    }
    else {

     mostrarResultado($iso);

    }

    ?>


</body>
</html>
