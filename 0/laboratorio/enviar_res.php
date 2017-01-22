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
           $estatus="esp_rec";
           $idm=$id;
           $objmuestra = new muestra();
           $objmuestra->cambiar_estatus($mysqli,$estatus,$idm);
           header("location: ../home/inicio?var1=valor");
          echo "terminadoooooooo";



                include '../../layouts/layout_p.php'; ?>
       </section>

   </body>
</html>
