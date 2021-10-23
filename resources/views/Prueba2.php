<?php

    require("manejo.php");




    
    $automata1 = lectura_automata('aut1.txt');
    $lineas = lectura_caminos('cam1.txt');



    $matriz = crearmatriz2($automata1['Cnodos'],$lineas['conexiones'],$lineas['caminos']);

    $Dmatriz = afndtoafd($matriz,$lineas['caminos'],$automata1['inicio']);



   












?>