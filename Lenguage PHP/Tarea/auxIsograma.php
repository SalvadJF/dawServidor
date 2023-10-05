<?php


function obtenerTexto($text)
{

    return isset($_GET[$text]) ? trim($_GET[$text]) : null;
}



function comprobarTexto($iso, &$errores)
{

    is_numeric($iso) ? $errores[] = "Se han introducido caracteres numericos": null;

}

function mostrarErrores(&$errores)
{
        ?>
        <ul>
        <?php foreach ($errores as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
        </ul>
        <?php
}

function mostrarResultado($iso)
{
    if (empty($iso)) {
        null;
    }
    else {
    $res = count(array_unique(mb_str_split($iso, 1))) == mb_strlen($iso);

        if ($res == true) {

            ?>
            La palabra <strong><?= $iso ?></strong> es un isograma
            <?php
        }
        else {

            ?>
            La palabra <strong><?= $iso ?></strong> no es un isograma
            <?php

        }
    }


}
