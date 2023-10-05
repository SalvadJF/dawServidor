<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
<?php
        $errores = [];
        if (isset($_GET['op1'])) {
            $op1 = $_GET['op1'];
            if (!is_numeric($op1)) {
                $errores[] = "El primer operando es incorrecto";
            }
        } else {
            $errores[] = "Falta el primer operando";
        }
        if (isset($_GET['op2'])) {
            $op2 = $_GET['op2'];
            if (!is_numeric($op2)) {
                $errores[] = "El segundo operando es incorrecto";
            }
        } else {
            $errores[] = "Falta el segundo operando";
        }
        if (isset($_GET['op'])) {
            $op = $_GET['op'];
            if (!is_numeric($op)) {
                $errores[] = "El operando es incorrecto";
            }
        } else {
            $errores[] = "Falta el operando";
        }
        if (empty($errores)) {
            $res = 0;
            switch ($op) {
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
            }
        }
    ?>
    <?php if (empty($errores)): ?>
        El <strong>resultado</strong> es <strong><?= $res ?></strong>
    <?php else: ?>
        <ul>
            <?php foreach ($errores as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>
