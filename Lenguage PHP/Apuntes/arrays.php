<?php

#   Los Arrays en PHP son dinamicos
#   El tipo de datos de un array puede ser el que sea
#   Se pueden usar las claves para acceder a su posicion
#   EJ $a[5] = 'hola';

#   EJ de creacion
$a = [ 'hola', 'pepe', 'juan' ];

#   Asignamos una clave a cada elemento del array

$a = [ 5 => 'hola', 7 => 'pepe', 14 => 'juan' ];

#   Array dentro de un array

$y =    [
            [
                      'hola',
                 2 => 'pepe',
                'x' => 'juan',
            ],
            [
                'a' => 'adios',
                5 => 'mario',
                6 => 'nacho',
            ]
        ]

?>
