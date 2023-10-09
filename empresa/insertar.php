<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar un nuevo departamento</title>
</head>
<body>

    <?php require "auxiliar.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $codigo = obtener_post('codigo');
        $denominacion = obtener_post('denominacion');
        $localidad = obtener_post('localidad');

        if (isset($codigo, $denominacion, $localidad)) {
            // Validar datos de entrada
            // Hacer la insercion

            $pdo = conectar();

            $errores = [];

            if ($codigo === ('SELECT $codigo FROM departamentos')) {

                $errores[] = "El codigo ya esta en uso";
            }
            elseif ($codigo === "") || (mb_strlen($codigo) > 2) {

                $errores[] = "Codigo invalido";
            }

            if ($denominacion === null) {

                $errores[] = "El campo denominacion esta vacio";
            }
            elseif (mb_strlen($denominacion) > 255) {

                $errores[] = "Nombre demasiado largo";
            }





        }
    }




    ?>

    <form action="" form="post">

        <label for="codigo">Codigo</label>
        <input type="text" name="codigo" id="codigo">
        <br>
        <label for="denominacion">Denominacion</label>
        <input type="text" name="denominacion" id="denominacion">
        <br>
        <label for="localidad">Localidad</label>
        <input type="text" name="localidad" id="localidad">
        <br>
        <button type="submit">Insertar</button>

    </form>

</body>
</html>
