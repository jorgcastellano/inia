<?php
   session_start();
   include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
   <head>
       <title>Resultados</title>
       <?php include '../../layouts/head.php'; ?>
   </head>
   <body>
       <?php include '../../system/menu.php'; ?>
       <section class="bloque">
           <div>
               <?php include '../../layouts/cabecera-body.php'; ?>
             <hgroup>
               <h1>Resultados de la carga</h1>
             </hgroup>
           </div>
           <?php

                require_once '../../system/class.php';
                extract($_POST);
                echo $Cod_muestra;
                $Ced_esp=$_SESSION['ci'];
                echo $Ced_esp;
                echo $Guardar;
                echo $Modificar;
                $objmuestra = new r_suelo();
                if(isset($Guardar)):
                  echo "string";
                  $objmuestra->registrar_r_muestra_s($mysqli,$Cod_muestra,$Ced_esp,$Are,$Lim,$Arc,$Tex,$Grup,$Fos,$FosL,$Pot,$PotL,$Cal,$CalL,$Mag,$MagL,$Mat,$MatL,$PH,$PHL,$Con,$ConL,$Alu,$AluL);
                endif;
                if(isset($Modificar)):
                  $objmuestra->modificar_r_muestra_s($mysqli,$Cod_muestra,$Are,$Lim,$Arc,$Tex,$Grup,$Fos,$FosL,$Pot,$PotL,$Cal,$CalL,$Mag,$MagL,$Mat,$MatL,$PH,$PHL,$Con,$ConL,$Alu,$AluL);
                endif;
                $reg=$objmuestra->consultar_r_muestra_s($mysqli,$Cod_muestra);
                echo "  <form method='' action=''>
                          <table class='tcliente'>
                            <tr><th colspan='2'><i class='fa fa-edit'></i> Resultados de la muestra</th></tr>
                            <tr><th>Codigo Muestra: </th><td>".$reg[2]."</td></tr>
                            <tr><th>Cedula Especialista: </th><td>".$reg[1]."</td></tr>
                            <tr><th>Arenosa: </th><td>".$reg[3]."</td></tr>
                            <tr><th>Limosa: </th><td>".$reg[4]."</td></tr>
                            <tr><th>Arcillosa: </th><td>".$reg[5]."</td></tr>
                            <tr><th>Textura: </th><td>".$reg[6]."</td></tr>
                            <tr><th>Grupo: </th><td>".$reg[7]."</td></tr>
                            <tr><th>Fosforo: </th><td>".$reg[8]." ".$reg[9]."</td></tr>
                            <tr><th>Potacio: </th><td>".$reg[10]." ".$reg[11]."</td></tr>
                            <tr><th>Calcio: </th><td>".$reg[12]." ".$reg[13]."</td></tr>
                            <tr><th>Magnecio: </th><td>".$reg[14]." ".$reg[15]."</td></tr>
                            <tr><th>MO: </th><td>".$reg[16]." ".$reg[17]."</td></tr>
                            <tr><th>PH: </th><td>".$reg[18]." ".$reg[19]."</td></tr>
                            <tr><th>CE: </th><td>".$reg[20]." ".$reg[21]."</td></tr>
                            <tr><th>Aluminio: </th><td>".$reg[22]." ".$reg[23]."</td></tr>
                          </table>
                          <button type='button' id='accion_buttom' name='Volver' value='Volver' onclick=location='inicio' class='boton' ><i class='fa fa-check'></i> Volver a inicio</button>
                          <button type='submit' name='Modificar' value='Modificar' formaction='carga_suelo' class='boton' ><i class='fa fa-check'></i> Modificar</button>
                          <button type='submit' name='enviar' value='enviar' class='boton' ><i class='fa fa-check'></i> Enviar resultados</button>
                        </form>
                ";


                include '../../layouts/layout_p.php'; ?>
       </section>

   </body>
</html>
