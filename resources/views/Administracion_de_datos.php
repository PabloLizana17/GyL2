<?php
   use Illuminate\Foundation\Inspiring;
   use Illuminate\Support\Facades\Artisan;

    function lectura_Aut($archivo)
    {
        $fp = fopen ($archivo,"r");
        $i = 0 ;
        $datos = array();
        while (!feof($fp)){
            $linea = fgets($fp);
            array_push($datos,$linea);
        }
        
            return $datos;
    }
    

    function lectura_automata($archivo)
    {
        $arreglo = lectura_Aut($archivo);
        $data = array();

        $data['Cnodos']= intval($arreglo[0]);
        $i=0;
        $str="";
        while($arreglo[1][$i] != ',')
        {
            $str=$str.$arreglo[1][$i];
            $i++;
            
        }
       $data['inicio'] = intval($str); 
       $str= "";
       $i++;
       while($i<strlen($arreglo[1]))
       {
            $str=$str.$arreglo[1][$i];
            $i++;
        

       }
       $data['Fin'] = intval($str); 

       return $data;




    }
    function lectura_caminos($archivo)
    {
        $arreglo = lectura_Aut($archivo);
        $data = array();
        $data["caminos"]= array();
        $i=0;
        while(($i*2)+1<sizeof($arreglo))
        {
            $a = trim($arreglo[($i*2)+1]);
            array_push($data['caminos'],$a);
            $i++;
        }

        $i=0;
        $data['caminos'] = array_unique($data['caminos']);

        $data['conexiones'] = array();


        while($i<sizeof($arreglo))
        {
            
            $aux = array();
            $j=0;
            $str ='';
            
            
           while($arreglo[$i][$j] != ',')
            {
                $str=$str.$arreglo[$i][$j];
                $j++;

            }
            $aux[0]=intval($str);
            $j++;
            $str= "";

            while($j<strlen($arreglo[$i])-1)
            {
                $str=$str.$arreglo[$i][$j];
                $j++;
            }
            $aux[2]=intval($str);
            $i++;
            $aux[1]=trim($arreglo[$i]);
            array_push($data['conexiones'],$aux);
            
              
            $i++; 
          



        }
        return $data;

    }





   


