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
                foreach ($_POST['Cod_muestra'] as $valor) {  }
                $Cod_muestra=$valor;
                $Ced_esp=$_SESSION['ci'];
                $objmuestra= new muestra();
                $reg2=$objmuestra->consultar_muestra($mysqli,$Cod_muestra);

                $objresultado = new r_suelo();

                $reg=$objresultado->consultar_r_muestra_s($mysqli,$Cod_muestra);
                echo "  <form method='POST' action='carga_recs'>
                          <table class='tcliente'>
                            <tr><th colspan='2'><i class='fa fa-edit'></i> Resultados de la muestra</th></tr>
                            <tr><th>Codigo Muestra: </th><td>".$reg[2]."</td></tr>
                            <tr><th>Cultivo actual: </th><td>".$reg2[3]."</td></tr>
                            <tr><th>Nuevo cultivo: </th><td>".$reg2[41]."</td></tr>
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
                          <input type='hidden' name='id' value='$idm' />
                          <input type='hidden' name='Cod_muestra' value='$Cod_muestra' />
                          <button type='button' id='accion_buttom' name='Volver' value='Volver' onclick=location='../home/inicio' class='boton' ><i class='fa fa-check'></i> Volver a inicio</button>

                          <button type='submit' name='enviar' value='enviar' class='boton' ><i class='fa fa-check'></i> Recomendar</button>
                        </form>
                ";


                include '../../layouts/layout_p.php'; ?>
       </section>

   </body>
</html>
