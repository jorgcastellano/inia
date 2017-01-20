<?php

        //consultar analisis asignados
        $sa= new solicitud_analisis();
        $regi1=$sa-> consultar_sam($mysqli,$Cod_muestra1);
        $regi2=$sa-> consultar_sam($mysqli,$Cod_muestra1);

        //guardar analisis asignados en una cadena en caso de realizar modificacion a la muestra
        $codi_analisis1='';
        $j="|";

        while ($reg6 = $regi2->fetch_array()) {

                if($codi_analisis1 == ''){

                    $codi_analisis1=$reg6[2];

                }   else{

                        $codi_analisis1 .= $j.$reg6[2];

                     }

        }       

        //guardar analisis asignados en una cadena para posteriormente mostralos
        $analisis1='';
        $l=", ";

        while ($reg5 = $regi1->fetch_array()) {

                if($analisis1 == ''){

                    $analisis1 =$reg5[5];

                }   else{

                        $analisis1 .= $l.$reg5[5];

                    }

        }


        $regi3=$sa-> consultar_sam($mysqli,$Cod_muestra2);
        $regi4=$sa-> consultar_sam($mysqli,$Cod_muestra2);

        //guardar analisis asignados en una cadena en caso de realizar modificacion a la muestra
        $codi_analisis2='';
        $j="|";

        while ($reg7 = $regi4->fetch_array()) {


                if($codi_analisis2 == ''){

                    $codi_analisis2=$reg7[2];

                }   else{

                        $codi_analisis2 .= $j.$reg7[2];

                    }
            }

        //guardar analisis asignados en una cadena para posteriormente mostralos
        $analisis2='';
        $l=", ";

        while ($reg8 = $regi3->fetch_array()) {

                if($analisis2 == ''){

                    $analisis2 =$reg8[5];

                }   else{


                        $analisis2 .= $l.$reg8[5];

                    }

        }

?>
