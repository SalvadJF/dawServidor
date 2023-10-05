<?php

$x = 4;

$y = 5;


$a = compact('x', 'y');

/**
 * Esto devolvera un array con el valor de ambas
 *
 * $a = compact('x', 'y'); -> $a = [ x => 4, y => 5 ]
 *
 */

extract($a);

 /**
  * Esto es justo lo contrario, crea valiables a
  * partir de un array
  *
  * extract($a); -> $x = 4; $y = 5;
  *
  */

?>
