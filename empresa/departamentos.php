<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamentos</title>
</head>
<body>
    <?php require "auxiliar.php";

        function mostrar_tabla(PDOStatement $sent) {
            ?>

            <table border="1">
            <thead>
                <th>Código</th>
                <th>Denominacion</th>
                <th>Localidad</th>
            </thead>
            <tbody>
                <?php foreach ($sent as $fila):?>
                    <tr>
                        <td><?= $fila['codigo']?></td>
                        <td><?= $fila['denominacion'] ?></td>
                        <td><?= $fila['localidad'] ?></td>
                        <td><a href="borrar.php?id=<?= $fila['id'] ?>">Borrar</a></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>


        <a href="insertar.php">Insertar un nuevo departamento</a>
    <?php
        }

        $pdo = conectar();
        $codigo = isset($_GET['codigo']) ? trim($_GET['codigo']) : null;

    ?>

    <form action="" method="get">
        <label for="codigo">Codigo</label>
        <input type="text" name="codigo" id="codigo" value="<?= $codigo ?>">
        <button type="submit">Buscar</button>
        <br>
    </form>

    <?php

        if  ($codigo == null):
            $sent = $pdo->query('SELECT * FROM departamentos');
            mostrar_tabla($sent);

        else:

        $sent = $pdo->prepare('SELECT COUNT(*) FROM departamentos WHERE codigo = :codigo');
        $sent->execute([':codigo' => $codigo]);
        $cantidad = $sent->fetchColumn();

            if ($cantidad == 0): ?>
            <h3>No se ha encontrado ese departamento</h3>
            <?php

            else:
            $sent = $pdo->prepare('SELECT * FROM departamentos WHERE codigo = :codigo');
            $sent->execute([':codigo' => $codigo]);
            mostrar_tabla($sent);
            endif;

        endif;
    ?>




</body>
</html>
