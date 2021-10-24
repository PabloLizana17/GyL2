<?php

require("manejo.php");




    
$automata1 = lectura_automata('aut1.txt');
$lineas1 = lectura_caminos('cam1.txt');
$automata2 = lectura_automata('aut2.txt');
$lineas2 = lectura_caminos('cam2.txt');



$matriz1 = crearmatriz2($automata1['Cnodos'],$lineas1['conexiones'],$lineas1['caminos']);
$matriz2 = crearmatriz2($automata2['Cnodos'],$lineas2['conexiones'],$lineas2['caminos']);
$camino1 = camino($matriz1,$automata1['inicio'],$automata1['Fin'],$lineas1['caminos']);
$camino2 = camino($matriz2,$automata2['inicio'],$automata2['Fin'],$lineas2['caminos']);
$union = union($automata2['Cnodos'],$lineas2['conexiones'],$lineas2['caminos'],$automata2['inicio'],$automata2["Fin"],$automata1['Cnodos'],$lineas1['conexiones'],$lineas1['caminos'],$automata1['inicio'],$automata1["Fin"]);
$interseccion = interseccion($automata2['Cnodos'],$lineas2['conexiones'],$lineas2['caminos'],$automata2['inicio'],$automata2["Fin"],$automata1['Cnodos'],$lineas1['conexiones'],$lineas1['caminos'],$automata1['inicio'],$automata1["Fin"]);
$concatenacion = concatenacion($automata2['Cnodos'],$lineas2['conexiones'],$lineas2['caminos'],$automata2['inicio'],$automata2["Fin"],$automata1['Cnodos'],$lineas1['conexiones'],$lineas1['caminos'],$automata1['inicio'],$automata1["Fin"]);









?>