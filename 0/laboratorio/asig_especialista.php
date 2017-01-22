<?php
   session_start();
   include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
   <head>
       <title>Asignar Especialista</title>
       <?php include '../../layouts/head.php'; ?>
   </head>
   <body>
       <?php include '../../system/menu.php'; ?>
       <section class="bloque">
           <div>
               <?php include '../../layouts/cabecera-body.php'; ?>
             <hgroup>
               <h1>Asignar Especialista</h1>
             </hgroup>
           </div>
           <?php

                require_once '../../system/class.php';
                require_once '../../system/classesp.php';//Libreria que contiene las clases.
                extract($_POST);
                if(isset($Asignar)):
                  $estatus="esp_ana";
                  $objmuestra = new muestra();

                  foreach ($_POST['Ced_esp'] as $valor){
                  if(!empty($valor))
                  $Ced_esp = $valor;
                  }
                  $t=1;
                  $objmuestra->cambiar_estatus($mysqli,$estatus,$idm);
                  $objmuestra->asignar_especialista($mysqli,$idm,$Ced_esp,$t);
                  $reg=$objmuestra->consultar_muestra_especialista($mysqli,$idm,$t);
                  $res = $reg -> fetch_array();
                  $idm=$res[1];
                  $reg2=$objmuestra->consultar_muestra_id($mysqli,$idm);
                  $res2 = $reg2 -> fetch_array();
                  if ($res2[2]=='1') { $tip='Vegetal'; }
                  if ($res2[2]=='2') { $tip='Suelo'; }
                  if ($res2[2]=='3') { $tip='Sustrato'; }
                  if ($res2[2]=='4') { $tip='Lixiviado'; }
                  if ($res2[2]=='5') { $tip='Agua'; }
                  if ($res2[2]=='6') { $tip='Insectos'; }
                  if ($res2[2]=='7') { $tip='Otros'; }
                  $Ced_esp=$res[2];
                  $objespecialista= new especialista();
                  $reg3=$objespecialista->consulta_especialista($mysqli,$Ced_esp);
                  $res3 = $reg3 -> fetch_array();

                  echo "<table class='usuario'>
                          <tr>
                            <td>Codigo</td>
                            <td>Tipo</td>
                            <td>Especialista</td>
                            <td>Fecha de asignacion</td>
                          </tr>
                          <tr>
                            <td>".$res2[1]."</td>
                            <td>".$tip."</td>
                            <td>".$res3[2]." ".$res3[3]."</td>
                            <td>".$res[4]."</td>
                          </tr>
                        </table>
                          ";




                endif;

                if(isset($Eliminar)):

                endif;



            ?>
           <form class="contact_form" method="POST" action="#"  id="" name="principal1"> <!--Formulario de suelo-->
              <button type='button' id='accion_buttom' name='Volver' value='Volver' onclick=location='../home/inicio' class='boton' ><i class='fa fa-check'></i> Volver a inicio</button>
           </form>
           <?php include '../../layouts/layout_p.php'; ?>
       </section>

   </body>
</html>
