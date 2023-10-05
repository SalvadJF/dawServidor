<?php

const OPS = ['+', '-', '*', '/'];

/**
 * calcular
 *
 * @param  mixed $op1   El primer operando
 * @param  mixed $op2   El segundo operando
 * @param  mixed $op    El operador
 * @return int|float    El resultado
 */
function calcular($op1, $op2, $op)
{
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
    return $res;

}


function mostrar_errores(&$errores)
{
        ?>
        <ul>
        <?php foreach ($errores as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
        </ul>
        <?php
}


/**
 * comprobar_op1
 *
 * @param  mixed $op1
 * @param  array $errores
 * @return void
 */
function comprobar_op1(mixed $op1, array &$errores)
{
    if (!is_numeric($op1)) {
        $errores[] = 'El primer operando no es correcto';
    }
}

function comprobar_op2($op2, &$errores)
{
    if (!is_numeric($op2)) {
        $errores[] = 'El segundo operando no es correcto';
    }
}


function comprobar_division_cero($op2, $op, &$errores)
{
    if (isset($op2, $op) && $op2 == 0 && $op == '/') {
        $errores[] = 'No se puede dividir entre cero.';
    }
}


function mostrar_resultado($res)
{
    ?>
    El <strong>resultado</strong> es <strong><?= $res ?></strong>
    <?php
}

function obtener_get($par)
{
    return isset($_GET[$par]) ? trim($_GET[$par]) : null;
}

function selected($option, $op)
{
    return $option == $op ? "selected" : "";
}
