<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar departamento</title>
</head>
<body>
    <?php
    require '../auxiliar.php';

    if (isset($_POST['id'])) {
        $id = trim(($_POST['id']));
        $errores = [];
        if (!ctype_digit($id)) {
            return volver_departamentos();
        }

        $pdo = conectar();

        $pdo->beginTransaction();
        $sent = $pdo->prepare('SELECT * FROM departamentos WHERE id = :id FOR UPDATE');
        $sent->execute([':id' => $id]);

        if (buscar_departamento_por_id($id, $pdo) === false) {
            return volver_departamentos();
        }

        $sent = $pdo->prepare('SELECT COUNT(e.*) FROM departamentos d JOIN empleados e ON (e.departamento_id = d.id) WHERE d.id = :id GROUP BY d.id ');
        $sent->execute([':id' => $id]);

        if ($sent->fetchColumn() > 0) {
            $errores[] = "No se puede borrar un departamento con trabajadores";
        }
         if (!empty($errores)): ?>
            <ul>
            <?php foreach ($errores as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
            </ul>
        <?php
        else:
        $sent = $pdo->prepare('DELETE FROM departamentos WHERE id = :id');
        $sent->execute([':id' => $id]);
        endif;

        $pdo->commit();

        volver_departamentos();
    }
    $id = isset($_GET['id']) ? trim($_GET['id']) : null;

    if (!isset($id)) {
        return volver_departamentos();
    }
    ?>
    <p>¿Está seguro de que quiere borrar ese departamento?</p>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <button type="submit">Sí</button>
        <a href="index.php">Volver</a>
    </form>
</body>
</html>
