<?php

# El interprete no intentara reconocer caracteres especiales EJ \n (salto de linea)
# La unica excepcion si quremos meter una ' dentro del texto, que seria \'
'hola';

# El interprete identifica los caracteres especiales
"hola";

# Si queremo0s que se reconozca una variable dentro de una string y que este junto
# a otra cadena usaremos {} para aislar la variable
$x = 5;
"hola {$x}pepe";
?>
