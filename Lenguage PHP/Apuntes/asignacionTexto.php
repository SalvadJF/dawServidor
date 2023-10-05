<?php

#   ASIGNACION HEREDOC

#   Si queremos asignar un texto y que respete los saltos de línea y espacios
#   debemos usar $(variable) = <<< (Nombre = usualmente EOT)
$x = <<< "EOT"

Esto es un texto de prueba
para demostrar el uso de
asignacion de texto

EOT;

#    ASIGANCION NOWDOC

#   Si queremos asignar un texto y que no respete los saltos de línea y espacios
#   debemos usar $(variable) = <<< (Nombre = usualmente EOT)
$x = <<< 'EOT'

Esto es un texto de prueba
\n
No se respeta los espacios

EOT;


?>
