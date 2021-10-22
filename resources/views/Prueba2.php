<?php

require("manejo.php");

$conexiones[0]=[1,'x',2];
$conexiones[1] = [2,'x',3];
$conexiones[2] = [2,'x',1];
$conexiones[3] = [4,'z',2];
$conexiones[4] = [2,'x',4];
$conexiones[5] = [0,'x',4];
$conexiones[6] = [4,'x',3];
$conexiones[7] = [1,'z',4];

$matriz = crearmatriz2(5,$conexiones,["x","y","z"]);




print_r(afndtoafd($matriz,["x","y","z"],2));












?>