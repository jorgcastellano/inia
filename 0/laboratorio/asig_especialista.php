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

                   require_once '../../system/class.php';//Libreria que contiene las clases.
                   extract($_POST);

                  echo $Especialista;
                  echo $Cod_muestra;
                   /*foreach ($_POST['Especialista'] as $id){
                     echo $id;
                   }
                  foreach ($_POST['Cod_muestra'] as $id){
                    echo $id;
                  }

                   //objsuelo= new suelo();
                  // objsuelo->*/

            ?>
           <form class="contact_form" method="POST" action="insert"  id="" name="principal1" onsubmit=""> <!--Formulario de suelo-->

           </form>
           <?php include '../../layouts/layout_p.php'; ?>
       </section>

   </body>
</html>
