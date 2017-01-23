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
                     extract($_POST);
                     require_once '../../system/class.php';
                       $estatus="esp_res";
                       $t=1;
                       $Ced_esp=$_SESSION['ci'];
                       $objmuestra = new muestra();
                       $reg = $objmuestra -> consultar_muestra_asignadas($mysqli,$Ced_esp,$estatus,$t);
                       if($mysqli->affected_rows>0):

                             echo "
                                    <table class='usuario'>
                                          <tr>
                                              <td>Código</td>
                                              <td>Tipo</td>
                                              <td>Cultivo</td>
                                              <td>Fecha inicio</td>
                                              <td>Analizar</td>
                                          </tr>";

                                 while ($res = $reg -> fetch_array()) :
                             echo "
                                         <tr>
                                             <td>$res[0]</td>
                                             <td>$res[1]</td>
                                             <td>$res[2]</td>
                                             <td>$res[3]</td>
                                             <form action='../laboratorio/consultar_detalles' method='POST'>
                                             <input type='hidden' name='Cod_muestra[]' value='$res[0]' />
                                           <td><button class='sinboton' type='submit' name='Asignar' value='' id='accion_buttom' ><i class='fa fa-arrow-right'></button></i></td>
                                           </tr>
                                     </form>";
                                  endwhile;
                              echo "</table>";
                        else:
                          echo "<div class='notify_f'>No hay muestras para analizar</div>";
                        endif;



                include '../../layouts/layout_p.php'; ?>
       </section>

   </body>
</html>
