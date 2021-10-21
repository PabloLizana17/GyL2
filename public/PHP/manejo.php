
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
                array_push($arreglo,$matriz[$conexiones[$i][0]][$conexiones[$i][1]]);
                array_push($arreglo,$conexiones[$i][2]); 
                $matriz[$conexiones[$i][0]][$conexiones[$i][1]] = $arreglo;

                $matriz['Deterministico'] = false;
            }
            
        }
       
    
        return $matriz;
    
    
   }

   
   /*function afndtoafd($matriz,$caminos)
   { 
       $matriz2= array();
       $queue = array(); 
       array_push($matriz2,$matriz[0]);
       for($i=0;$i<sizeof($caminos);$i++)
       {
            array_push($queue,$matriz[0][$caminos[$i]]);
       }

        while(empty($queue))
        {
            $aux = $queue[0];    
                
            if(is_array($aux))
            {   
                $name = '';
                for($i=0;$i<sizeof($aux);$i++)
                {
                    $name = $name.$aux[$i];

                    for($j=0;$j<sizeof($caminos);$j++)
                    {   
                        $camino = $matriz[$i][$caminos[$j]] ;
                        array_push($queue,$camino);
                        $matriz2[$name][$caminos[$j]] = $camino;  
                    }
                        
                }

            }
            else
            {
                for($j=0;$j<sizeof($caminos);$j++)
                {   
                    $camino = $matriz[$aux][$caminos[$j]];
                    array_push($queue,$camino);
                    $matriz2[$name][$caminos[$j]] = $camino;  
                }

            }

        }
        array_splice($queue, 0);

        return $matriz2;

   }
           
*/


    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    ?>