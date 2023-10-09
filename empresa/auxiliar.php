<?php

function conectar() {

    return new PDO('pgsql:host=localhost;dbname=empresa', 'empresa', 'salvadorjimenez1993');

}

function buscar_departamento_por_id($id, ?PDO $pdo = null) {

    if ($pdo === null) {
        $pdo = conectar();
    } else {
    $sent = $pdo->prepare('SELECT * FROM departamentos WHERE id = :id');
    $sent->execute([':id' => $id]);
    return $sent->fetch();

}

function volver_departamentos() {

    header('Location: departamentos.php');

}

function obtener_post($par) {

    return isset($_GET[$par]) ? trim($_GET[$par]) : null;

}


}
