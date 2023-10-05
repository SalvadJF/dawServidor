<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>

    <?php

    $errores = [];
    $res = null;

    function calcular($op1, $op2, $op)
    {
        switch ($op) :
            case '+':
                $res = $op1 + $op2;
                break;
            case '-':
                $res = $op1 - $op2;
                break;
            case '*':
                $res = $op1 * $op2;
                break;
            case '/':
                $res = $op1 / $op2;
                break;
        endswitch;

    }


    ?>
    <?php
    function mostrar_errores($errores)
    {
        ?>
        <ul>
        <?php foreach ($errores as $error) :?>
            <li> <?= $error ?> </li>
        <?php endforeach; ?>
        </ul>
        <?php
    }
    ?>
    <form action="calculadora2.php" method="get">

        <label for="op1">Operando 1:</label>
        <input type="text" name="op1" id="op1">
        <br>
        <label for="op2">Operando 2:</label>
        <input type="text" name="op2" id="op2">
        <br>
        <label for="op">Operacion:</label>
        <input type="text" name="op" id="op">
        <br>
        <button type="submit">Calcular</button>

    </form>

    <?php

        if (isset($_GET['op1'],$_GET['op2'],$_GET['op']))
        {
            $op1 = $_GET['op1'];
            if (!is_numeric($op1)) :
                $errores[] = "El primer operando es incorrecto";
            endif;
            $errores[] = "Falta el primer operando";

            $op2 = $_GET['op2'];
            if (!is_numeric($op2)) :
                $errores[] = "El segundo operando es incorrecto";
            endif;
            $errores[] = "Falta el segundo operando";

            $op = $_GET['op'];
            if (!is_numeric($op)) :
                $errores[] = "El operando es incorrecto";
            endif;
            $errores[] = "Falta el operando";
        }

        if (isset($op1, $op2, $op))
        {
            if (empty($errores)) :
            $res = calcular($op1, $op2, $op);
            endif;
        }

    ?>
    <?php if (empty($errores)): ?>
        El <strong>resultado</strong> es <strong><?= $res ?></strong>
        <ul>
            <?php
            mostrar_errores($errores);
            endif;
            ?>
        </ul>
</body>
</html>
