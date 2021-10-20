
<?php

function crearmatriz($Cnodos,$caminos)
{
    $arreglo=array();
    $matriz=array();
    
    for($i=0;$i<$Cnodos;$i++)
    {
        array_push($arreglo,-1);                                
    }

    for($i=0;$i<sizeof($caminos);$i++)
    {
        $matriz[$caminos[$i]]=$arreglo;
    }

    $matriz["Deterministico"] = true;
    return $matriz;

}






    function crearmatriz2($Cnodos, $conexiones, $caminos)    
    {
        $matriz = crearmatriz($Cnodos,$caminos);
        echo sizeof($conexiones);
    
       for($i=0;$i<sizeof($conexiones);$i++)
        {   
            if($matriz[$conexiones[$i][0]][$conexiones[$i][1]] == -1)
            {
                $matriz[$conexiones[$i][0]][$conexiones[$i][1]]=$conexiones[$i][2];
            }
            else
            {
                $arreglo = array();

                array_push($arreglo,$matriz[$conexiones[$i][0]][$conexiones[$i][1]]);
                array_push($arreglo,$conexiones[$i][2]); 
                $matriz[$conexiones[$i][0]][$conexiones[$i][1]] = $arreglo;

                $matriz['Deterministico'] = false;
            }

        }
        
    
        return $matriz;
    
    
   }
           



    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    ?>