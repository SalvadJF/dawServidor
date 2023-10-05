<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manipulacion de Fechas : Calcular Años</title>
    <!-- El programa debe calcular la fecha de nacimiento de la persona -->
    <!-- Tiene que tener 3 campos Dia, Mes, Años , cada uno con su menu desplegable, Los años seran desde este hasta 50 años atras -->
</head>
<body>
    <?php

    const MESES = [     1 =>    'Enero',
                            'Febrero',
                            'Marzo',
                            "Abril",
                            "Mayo",
                            "Junio",
                            "Julio",
                            "Agosto",
                            "Septiembre",
                            "Octubre",
                            "Noviembre",
                            "Diciembre",];

    $anyo_actual = (int) date("Y");

    $dia = isset($_GET['dia'])? $_GET['dia'] : null;
    $mes = isset($_GET['mes'])? $_GET['mes'] : null;
    $anyo = isset($_GET['anyo'])? $_GET['anyo'] : null;

    if (checkdate($mes, $dia, $anyo)):
        $fecha_nac = DateTime::createFromFormat('j-n-Y', "$dia-$mes-$anyo");
        $fecha_act = new  DateTime();
        $diferencia = $fecha_nac->diff($fecha_act);

    else: ?>
        <h3> Error : Fecha incorrecta </h3>
    <?php
    endif;


    ?>

    <h2> ¿Cuantos Años tienes? </h2>

    <form action="" method="get">
        <label for="dia">Fecha de Nacimiento</label>
        <select name="dia" id="dia">
            <?php for ($i = 1; $i <= 31; $i++): ?>
                <option value="<?= $i ?>"><?= $i ?></option>
            <?php endfor ?>
        </select>
        <select name="mes" id="mes">
            <?php foreach (MESES as $m => $nombre_mes): ?>
                <option value="<?= $m ?>"><?= $nombre_mes ?></option>
            <?php endforeach ?>
        </select>
        <select name="anyo" id="anyo">
            <?php
            for ($a = $anyo_actual; $a >= $anyo_actual - 50; $a--): ?>
                <option value="<?= $a ?>"><?= $a ?></option>
            <?php endfor ?>
        </select>
        <br>
        <input type="submit" value="Calcular">
    </form>

    <?php if (isset($diferencia)): ?>
        <p> La persona tiene <?= $diferencia->y ?> años.</p>
    <?php endif?>

</body>
</html>
