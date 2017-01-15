<?php 

    $sql='SELECT * FROM analisis WHERE analisis.estatus = "On"';//Consultar analisis para muestra de suelo que esten activos
    $res5= $mysqli->query($sql);//Guardar resultado en $res5

    //Con los siguiente bucles verificamos cuales analisis fueron deseleccionados,seleccionados y no modificados para asi actulizarlos correctamente
    while ($resultado = $res5->fetch_array()) ://bucle general, extrae cada registro del arreglo con los analisis para muestras de suelo
        
            for ($x=0; $x < $temp = count($analisis); $x++)//bucle interno que se repite por cada analisis que este selecionado para la muestra 
                if ($resultado[0] == $analisis[$x]) ://verificar si el analisis extraido del arreglo es el mismo que seleccionado
                    
                        $insert = $resultado[0];//guardar el analisis en $insert para asignarlo a la muestra de suelo
                        $x=$temp;//igualar varibles para no seguir comparando este analisis
                elseif ($x == ($temp-1)) ://si el analisis extraido no es el mismo que el seleccionado

                        $drop = $resultado[0];//guardar el analisis en $drop para que no sea asignado a la mustra de suelo
                endif;

            if (isset($insert)) ://si la variable fue llenada entonces se asignara el analisis contenido en $insert a esa muestra

                
                
                $sol_ana->eliminar_sam($mysqli,$insert,$Cod_sol,$Cod_muestra);//se realiza una operacion de eliminacion llamando a la funcion eliminar_sams en caso de que el analisis ya estubiera preseleccionado (indicando que ya habia sido asignado a esa muestra)
                $sol_ana->registrar_solicitud_analisis($mysqli,$Cod_sol,$insert,$Cod_muestra);//llamado a la funcion que registra el analisis asignado a la muestra de suelo
                
            elseif (isset($drop)) ://si la variable fue llenada no se asignara el analisis contenido en $drop a esa muestra
                
                
                $sol_ana->eliminar_sam($mysqli,$drop,$Cod_sol,$Cod_muestra);//llamado a la funcion que elimina el analisis asignado a la muestra en caso de que halla sido deselecionado  
                                                                           //si por el contrario el analisis no se encontraba seleccionado esta operacion no tiene efecto alguno
            endif;
            unset($insert, $drop);//destruir variables
        
    endwhile;

?>