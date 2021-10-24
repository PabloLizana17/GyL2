<?php

    require("Administracion_de_datos.php");
    use Illuminate\Support\Facades\Log;

    function crearmatriz($Cnodos,$caminos)
    {
        $arreglo=array();
        $matriz=array();
        Log::info("Matriz de automata creada");

        for($i=0;$i<sizeof($caminos);$i++)
        {
            $arreglo[$caminos[$i]]=-1;
        }

        for($i=0;$i<$Cnodos;$i++)
        {
            array_push($matriz,$arreglo);                                
        }

        $matriz["Deterministico"] = true;
        return $matriz;
    }

    function crearmatriz2($Cnodos, $conexiones, $caminos)    
    {
        $matriz = crearmatriz($Cnodos,$caminos);
        
        for($i=0;$i<sizeof($conexiones);$i++)
        {   
            if($matriz[$conexiones[$i][0]][$conexiones[$i][1]] == -1)
            {
                $matriz[$conexiones[$i][0]][$conexiones[$i][1]]=$conexiones[$i][2];
            }
            else
            {
                $arreglo = array();
                if(is_array($matriz[$conexiones[$i][0]][$conexiones[$i][1]]))
                {
                    array_push($matriz[$conexiones[$i][0]][$conexiones[$i][1]],$conexiones[$i][2]); 
                }
                else
                {
                    array_push($arreglo,$matriz[$conexiones[$i][0]][$conexiones[$i][1]]);
                    array_push($arreglo,$conexiones[$i][2]); 
                    $matriz[$conexiones[$i][0]][$conexiones[$i][1]] = $arreglo;
                }
                $matriz['Deterministico'] = false;
            }
        }
        return $matriz;
    }

    function afndtoafd($matriz,$caminos,$inicio)
    { 
        Log::info("inicio de conversion de AFND");
        $matriz2= array();
        $matriz2["Caminos"]= array();
        $arreglo = array();
        $arreglo2 = array();
        array_push($arreglo,$inicio); 
        while(!empty($arreglo))
        {
            $aux= array_shift($arreglo);
            $name='';
            if(is_array($aux))
            {
                for($i=0;$i<sizeof($aux);$i++)
                {
                    $name = $name.$aux[$i]."-";
                    array_push($matriz2["Caminos"],$name);
                }
                if(empty($matriz2[$name]))
                {
                    for($i=0;$i<sizeof($caminos);$i++)
                    {
                        $matriz2[$name][$caminos[$i]]= array();
                        for($j=0;$j<sizeof($aux);$j++)
                        {
                            $conexion = $matriz[$aux[$j]][$caminos[$i]];
                            if($conexion != -1)
                            {
                                array_push($arreglo,$conexion);
                                if(is_array($conexion))
                                {
                                    $matriz2[$name][$caminos[$i]] = array_merge($conexion,$matriz2[$name][$caminos[$i]]);  
                                }
                                else
                                {
                                    array_push($matriz2[$name][$caminos[$i]],$conexion);
                                }
                            }
                        }
                        array_unique($matriz2[$name][$caminos[$i]]); 
                    }

                }

            }
            else
            {
                if(empty($matriz2[$aux]))
                {
                    for($i=0;$i<sizeof($caminos);$i++)
                    {
                        array_push($matriz2["Caminos"],$aux);
                        $conexion = $matriz[$aux][$caminos[$i]];
                        if($conexion != -1)
                        {
                            array_push($arreglo,$conexion);
                            $matriz2[$aux][$caminos[$i]]= array();
                            if(is_array($conexion))
                            {
                                $matriz2[$aux][$caminos[$i]] = array_merge($conexion,$matriz2[$aux][$caminos[$i]]);  
                            }
                            else
                            {
                                array_push($matriz2[$aux][$caminos[$i]],$conexion);
                            }
                            array_unique($matriz2[$aux][$caminos[$i]]); 
                        }
                    }
                }
            }
        }   
        Log::info("AFND convertido a AFD exitosamente");
        $matriz2["Caminos"]= array_unique($matriz2["Caminos"]);
        
        
        return $matriz2;
    }


    function complemento($Cnodos1, $conexiones1, $caminos1, $inicio1, $final1)
    {
        $matriz1=crearmatriz2($Cnodos1,$conexiones1,$caminos1);
        $i=$final1;
        $auto="";
        $j=0;
        $l=0;
        $k=array();
        $m=array();
        $a=0;
        
        if($matriz1['Deterministico'])
        {
            Log::info("Inicio de obtension de complemento");

            while($i!=$inicio1 && $a<50)
            {
                if($j<sizeof($caminos1))
                    $aux=$matriz1[$i][$caminos1[$j]];
                else
                    $aux=-1;
    
                if(is_array($aux) || $aux!=-1)
                {
                    if(is_array($aux))
                    {
                        if($l>=sizeof($aux))
                        {
                            $j++;
                            $l=0;
                        } 
                        else
                        {
                            if($matriz1[$aux[$l]][$caminos1[$j]]!=-1)
                            {
                                array_push($k,$i);
                                array_push($m,$j);
                                $i=$aux[$l];
                                $auto=$auto.$caminos1[$j];
                                $j=0;
                                $l=0;
                            }
                            else
                                $l++;
                        }
                    }
                    else
                    {
                        array_push($k,$i);
                        array_push($m,$j);
                        $i=$aux;
                        $auto=$auto.$caminos1[$j];
                        $j=0;
                        $l=0;
                    }
                }
                elseif($j>=sizeof($caminos1) && $aux==-1)
                {
                    $i=array_pop($k);
                    $auto=substr($auto, 0, -1);
                    $j=array_pop($m);
                    if(is_array($matriz1[$i][$caminos1[$j]]))
                    {
                        $l++;
                    }
                    else
                        $j++;
                }
                else
                {
                    $j++;
                }
                $a++;
            }
        }
        else
        {
            Log::info("Automata es AFND");
            $matriz1=afndtoafd($matriz1,$caminos1,$inicio1);
            Log::info("Inicio obtencion complemento apartir de AFD proveniente del AFND");

            while($i!=$final1 && $a<50)
            {
                if($j<sizeof($caminos1))
                    $aux=$matriz1[$i][$caminos1[$j]];
                else
                    $aux=-1;
    
                if(is_array($aux) || $aux!=-1)
                {
                    if(is_array($aux))
                    {
                        if($l>=sizeof($aux))
                        {
                            $j++;
                            $l=0;
                        } 
                        else
                        {
                            if($matriz1[$aux[$l]][$caminos1[$j]]!=-1)
                            {
                                array_push($k,$i);
                                array_push($m,$j);
                                $i=$aux[$l];
                                $auto=$auto.$caminos1[$j];
                                $j=0;
                                $l=0;
                            }
                            else
                                $l++;
                        }
                    }
                    else
                    {
                        array_push($k,$i);
                        array_push($m,$j);
                        $i=$aux;
                        $auto=$auto.$caminos1[$j];
                        $j=0;
                        $l=0;
                    }
                }
                elseif($j>=sizeof($caminos1) && $aux==-1)
                {
                    $i=array_pop($k);
                    $auto=substr($auto, 0, -1);
                    $j=array_pop($m);
                    if(is_array($matriz1[$i][$caminos1[$j]]))
                    {
                        $l++;
                    }
                    else
                        $j++;
                }
                else
                {
                    $j++;
                }
                $a++;
            }
        }
        if($a>=50)
        {
            Log::error("Falla al obtener el complemento");
            return "complemento no encontrado";

        }

        Log::info("Fin de obtension de complemento");
        return $auto;
    }

    function camino($matriz,$inicio1,$final1,$caminos1)  
    {
        $i=$inicio1;
        $auto="";
        $j=0;
        $l=0;
        $k=array();
        $m=array();
        if(!$matriz['Deterministico'])
        {
            Log::info("Automata es AFND");
            $matriz=afndtoafd($matriz,$caminos1,$inicio1);
        }
        while($i!=$final1)
        {
            if($j<sizeof($caminos1))
                $aux=$matriz[$i][$caminos1[$j]];
            else
                $aux=-1;

            if(is_array($aux) || $aux!=-1)
            {
                if(is_array($aux))
                {
                    if($l>=sizeof($aux))
                    {
                        $j++;
                        $l=0;
                    } 
                    else
                    {
                        if($matriz[$aux[$l]][$caminos1[$j]]!=-1)
                        {
                            array_push($k,$i);
                            array_push($m,$j);
                            $i=$aux[$l];
                            $auto=$auto.$caminos1[$j];
                            $j=0;
                            $l=0;
                        }
                        else
                            $l++;
                    }
                }
                else
                {
                    array_push($k,$i);
                    array_push($m,$j);
                    $i=$aux;
                    $auto=$auto.$caminos1[$j];
                    $j=0;
                    $l=0;
                }
            }
            elseif($j>=sizeof($caminos1) && $aux==-1)
            {
                $i=array_pop($k);
                $auto=substr($auto, 0, -1);
                print($auto);
                $j=array_pop($m);
                if(is_array($matriz[$i][$caminos1[$j]]))
                {
                    $l++;
                }
                else
                    $j++;
            }
            else
            {
                $j++;
            }
        }
        return $auto;
    }

    function union($Cnodos1, $conexiones1, $caminos1, $inicio1, $final1, $Cnodos2, $conexiones2, $caminos2, $inicio2, $final2)
    {
        $matriz1=crearmatriz2($Cnodos1,$conexiones1,$caminos1);
        $matriz2=crearmatriz2($Cnodos2,$conexiones2,$caminos2);

        Log::info("Inicio de obtension de camino primer automata");
        $a=camino($matriz1, $inicio1, $final1, $caminos1);
        Log::info("Fin de obtension de camino primer automata");

        Log::info("Inicio de obtension de camino segundo automata");
        $b=camino($matriz2, $inicio2, $final2, $caminos2);
        Log::info("Fin de obtension de camino segundo automata");

        Log::info("Inicio de obtension de camino union de automatas");
        Log::info("Fin de obtension de camino union de automatas");

        return $a.$b;
    }

    function interseccion($Cnodos1, $conexiones1, $caminos1, $inicio1, $final1, $Cnodos2, $conexiones2, $caminos2, $inicio2, $final2)
    {
        
        Log::info("Inicio de obtension de complemento primer automata");
        $complemento_a = complemento($Cnodos1, $conexiones1, $caminos1, $inicio1, $final1);
        if($complemento_a == "complemento no encontrado")
        {
            log::error("FALLA AL OBTENER LA INTERSECCION");
            return "No es posible obtener la interseccion";
        }
        Log::info("Fin de obtension de complemento primer automata");
        Log::info("Inicio de obtension de complemento primer automata");

        $complemento_b = complemento($Cnodos2, $conexiones2, $caminos2, $inicio2, $final2);

        if($complemento_b == "complemento no encontrado")
        {
            log::error("FALLA AL OBTENER LA INTERSECCION");
            return "No es posible obtener la interseccion";
        }

        Log::info("Fin de obtension de complemento primer automata");
        Log::info("Inicio de obtension de camino interseccion de automatas");
        Log::info("Fin de obtension de camino interseccion de automatas");
        return $complemento_a.$complemento_b;
    }
    function concatenacion($Cnodos1, $conexiones1, $caminos1, $inicio1, $final1, $Cnodos2, $conexiones2, $caminos2, $inicio2, $final2)
    {
        Log::info("Creacion de medios para la concatenacion");
        $matriz1=crearmatriz2($Cnodos1,$conexiones1,$caminos1);
        $matriz2=crearmatriz2($Cnodos2,$conexiones2,$caminos2);
        $a=camino($matriz1, $inicio1, $final1, $caminos1);
        $b=camino($matriz2, $inicio2, $final2, $caminos2);
        $str='';
        Log::info("Inicio de la concatenacion");
        for($i=0;$i<strlen($a);$i++)
        {
            for($j=0;$j<strlen($b);$j++)
            {
                $str=$str.$a[$i].$b[$j];
            }
        }
        Log::info("Concatenacion creada correctamente");
        return $str;
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    ?>