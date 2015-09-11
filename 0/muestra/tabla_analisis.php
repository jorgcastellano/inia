<?php


        $sa= new solicitud_analisis();
        $reg4=$sa-> consultar_sam($mysqli,$codm);
        
        $code_analisis='';
        $analisis='';
        $l=", ";
        $j="|";

      
        while ($reg5 = $reg4->fetch_array()) { 

            if($reg5[3]==""){


                if($analisis == ''){ 

                    $analisis =$reg5[6];
                    $code_analisis=$reg[2];


                }else{ 


                    $analisis .= $l.$reg5[6];
                    $code_analisis .= $j.$reg[2];

             
                     } 
            }

            if($reg5[4]==""){
                
                if($analisis == ''){ 

                    $analisis =$reg5[6];
                    $code_analisis=$reg[2];

                }else{ 


                    $analisis .= $l.$reg5[6];
                    $code_analisis .= $j.$reg[2];

                    } 
            }

        } 

       




?>    
