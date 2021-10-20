
<?php

function crearmatriz($Cnodos,$caminos)
{
    $arreglo=array();
    $matriz=array();
    
    for($i=0;$i<$Cnodos;$i++)
    {
        array_push($arreglo,"-");                                 // Crea matriz con los vertices dados
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
    
        for($i=0;$i<sizeof($conexiones);$i++)
        {   
            if($matriz[[$conexiones[$i][1]][$conexiones[$i][2]]]=="-")
            {
                $matriz[[$conexiones[$i][1]][$conexiones[$i][2]]]=$conexiones[$i][3];
            }
            else
            {
                $matriz[[$conexiones[$i][1]][$conexiones[$i][2]]] = $matriz[[$conexiones[$i][1]][$conexiones[$i][2]]]."-".$conexiones[$i][3];
                $matriz['Deterministico'] = false;
            }

        }

    
        return $matriz;
    
    
   }
           



    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    ?>