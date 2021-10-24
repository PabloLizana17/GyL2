<?php

    require("manejo.php");




    
    $automata1 = lectura_automata('aut1.txt');
    $lineas1 = lectura_caminos('cam1.txt');
    $automata2 = lectura_automata('aut2.txt');
    $lineas2 = lectura_caminos('cam2.txt');



    $matriz = crearmatriz2($automata2['Cnodos'],$lineas2['conexiones'],$lineas2['caminos']);

    //$Dmatriz = afndtoafd($matriz,$lineas1['caminos'],$automata1['inicio']);
    print_r($matriz);
    //$complemento = complemento($automata2['Cnodos'],$lineas2['conexiones'],$lineas2['caminos'],$automata2['inicio'],$automata2['Fin']);
    //print_r($lineas2['caminos']);

    //$union = union($automata1['Cnodos'],$lineas1['conexiones'],$lineas1['caminos'],$automata1['inicio'],$automata1['Fin'],$automata2['Cnodos'],$lineas2['conexiones'],$lineas2['caminos'],$automata2['inicio'],$automata2['Fin']);
    //$inteseccion = interseccion($automata1['Cnodos'],$lineas1['conexiones'],$lineas1['caminos'],$automata1['inicio'],$automata1['Fin'],$automata2['Cnodos'],$lineas2['conexiones'],$lineas2['caminos'],$automata2['inicio'],$automata2['Fin']);
    $camino=camino($matriz,$automata2['inicio'],$automata2['Fin'],$lineas2['caminos']);

    print_r($camino);












?>