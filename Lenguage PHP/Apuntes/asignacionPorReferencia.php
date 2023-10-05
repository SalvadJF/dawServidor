<?php

$x = 5;

$y = $x;
# Aqui se copia el valor de la otra variable pero son objetos distintos

$z = &$x;
# Aqui hacemos que la variable apunte al mismo sitio, por si uno cambia ambos cambian
# ESTO SE LLAMA ASIGNACION POR REFERENCIA

?>
