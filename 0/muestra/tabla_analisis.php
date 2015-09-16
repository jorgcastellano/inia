<?php


        $sa= new solicitud_analisis();
        $regi1=$sa-> consultar_sam($mysqli,$codm);
        $regi2=$sa-> consultar_sam($mysqli,$codm);

        
        $codi_analisis='';
        $j="|";

        while ($reg6 = $regi2->fetch_array()) {

            if($reg6[3]==""){


                if($codi_analisis == ''){ 

                    $codi_analisis=$reg6[2];


                }else{ 

                    $codi_analisis .= $j.$reg6[2];

             
                     } 
            }

            if($reg6[4]==""){
                
                if($codi_analisis == ''){

                    $codi_analisis=$reg6[2];

                }else{ 

                    $codi_analisis .= $j.$reg6[2];

                    } 
            }

        }       


        $analisis='';
        $l=", ";

        while ($reg5 = $regi1->fetch_array()) { 

            if($reg5[3]==""){


                if($analisis == ''){ 

                    $analisis =$reg5[6];
                    


                }else{ 


                    $analisis .= $l.$reg5[6];
                    

             
                     } 
            }

            if($reg5[4]==""){
                
                if($analisis == ''){ 

                    $analisis =$reg5[6];
                    

                }else{ 


                    $analisis .= $l.$reg5[6];

                    } 
            }

        } 



?>    
