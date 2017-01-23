<?php
   session_start();
   include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
   <head>
       <title>Pagina de carga</title>
       <?php include '../../layouts/head.php'; ?>
   </head>
   <body>
       <?php include '../../system/menu.php'; ?>
       <section class='bloque'>
           <div>
               <?php include '../../layouts/cabecera-body.php'; ?>
             <hgroup>
               <h1>Cargar Recomendación Suelo</h1>
             </hgroup>
           </div>
           <?php

                   require_once '../../system/class.php';//Libreria que contiene las clases.
                   extract($_POST);
                   $estatus="fin";
                   $objmuestra = new muestra();
                   $reg2=$objmuestra->consultar_muestra($mysqli,$Cod_muestra);
                   $idm=$reg2[0];
                   $objmuestra->cambiar_estatus($mysqli,$estatus,$idm);
                   $objSolicitud = new solicitud();
                   $cod_sol_obt = $objSolicitud -> sacar_cod_sol($mysqli, $Cod_muestra);
                   $cod_sol_obt1 = $cod_sol_obt -> fetch_array();
                   $cod_sol=$cod_sol_obt1[0];
                   $objSA = new solicitud_analisis();
                   $sa = $objSA -> consultar_status_muestras_por_sol($mysqli, $cod_sol);
                   echo "hola";
                   $cont = 0;
                   $var = $mysqli->affected_rows;

                   for($i = 0; $i < $var; $i++) {
                     $sar = $sa -> fetch_array();
                     if($sa[2] == "fin")
                      $cont++;
                   }
                   if($var == $cont)
                    $objSolicitud -> cambiar_status_fin($mysqli, $cod_sol_obt1[0]);



                   $Ced_esp=$_SESSION['ci'];

                   $objrecomendacion = new rec_suelo();
                   if(isset($Guardar)):

                  $objrecomendacion->registrar_rec_suelo($mysqli,$Cod_muestra,$Ced_esp,$TituloA,$DescripcionA,$TituloB,$DescripcionB);
                  endif;
                  if(isset($Modificar)):
                    $objrecomendacion->modificar_rec_suelo($mysqli,$Cod_muestra,$Ced_esp,$TituloA,$DescripcionA,$TituloB,$DescripcionB);
                  endif;

                  $reg=$objrecomendacion->consultar_rec_suelo($mysqli,$Cod_muestra);
                echo  "  <form method='POST' action=''>
                            <table class='tcliente'>
                              <tr><th colspan='2'><i class='fa fa-edit'></i> Recomendaciones para la muestra</th></tr>
                              <tr><th>Codigo Muestra: </th><td>".$reg[1]."</td></tr>
                              <tr><th>".$reg[3]."</th><td>".$reg[4]."</td></tr>
                              <tr><th>".$reg[5]."</th><td>".$reg[6]."</td></tr>

                            </table>
                            <input type='hidden' name='id' value='$idm' />
                            <input type='hidden' name='Cod_muestra' value='$Cod_muestra' />

                            <button type='submit' name='Modificar' value='Modificar' formaction='carga_recs' class='boton' ><i class='fa fa-check'></i> Modificar</button>
                            <button type='button' id='accion_buttom' name='Volver' value='Volver' onclick=location='../home/inicio' class='boton' ><i class='fa fa-check'></i> Finalizar</button>
                          </form>
                  ";




            include '../../layouts/layout_p.php'; ?>
       </section>

   </body>
</html>
