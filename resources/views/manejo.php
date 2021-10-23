<?php

    function crearmatriz($Cnodos,$caminos)
    {
        $arreglo=array();
        $matriz=array();

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
        $matriz2= array();
        $arreglo = array();
        $arreglo2 = array();
        array_push($arreglo,$inicio); 
        while(!empty($arreglo))
        {
            $aux= array_shift($arreglo);
            print_r($arreglo);
            $name='';
            if(is_array($aux))
            {
                for($i=0;$i<sizeof($aux);$i++)
                {
                    $name = $name.$aux[$i]."-";
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
        return $matriz2;
    }

    function complemento($Cnodos1, $conexiones1, $caminos1, $inicio1, $final1)
    {
        $matriz1=crearmatriz2($Cnodos1,$conexiones1,$caminos1);
        $i=$final1;
        $auto="";
        $j=0;
        $l=0;
        $k=-1;
        if($matriz1['Deterministico'] )
        {
            while($matriz1[$i][0]!=$inicio1 || $i=-1)
            {
                if($matriz1[$i][$caminos1[$j]]!=-1)
                {
                    $k=$i;
                    if(gettype($matriz1[$i][$caminos1[$j]])=="array")
                    {
                        $aux=$matriz1[$i][$caminos1[$j]];
                        if($l>=sizeof($aux))
                            $j++;
                        else
                        {
                            $i=$aux[$l];
                            $auto=$auto.$caminos1[$j];
                            $j=0;
                            $l=0;
                        }
                    }
                    else
                    {
                        $i=$matriz1[$i][$caminos1[$j]];
                        $auto=$auto.$caminos1[$j];
                        $j=0;
                    }
                    
                }
                elseif($j>=sizeof($caminos1))
                {  
                    $i=$k;
                    if(gettype($matriz1[$i][$caminos1[$j]])=="array")
                    {
                        $j=0;
                        $l++;
                    }
                    else
                        $j=1;
                }
                else
                {  
                    $j++;
                }
            }
        }
        else
        {
            $matriz1=afndtoafd($matriz1,$caminos1,$inicio1);

        }

        if($i==-1)
        {
            print("No tiene complemento");
        }
        else
            return $auto;
    }

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    ?>