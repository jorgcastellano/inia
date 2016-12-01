<?php
   session_start();
   include_once '../../system/check.php';
?>
<!--Los siguientes formularios son utilizados para el registro  de una muestra y en caso de querer modificar una muestra previa
   mente registrada estos seran precargados con datos extraidos de la BD-->
<!DOCTYPE html>
<html>
   <head>
       <title>Registro de muestras</title>
       <?php include '../../layouts/head.php'; ?>
   </head>
   <body>
       <?php include '../../system/menu.php'; ?>
       <section class="bloque">
           <div>
               <?php include '../../layouts/cabecera-body.php'; ?>
             <hgroup>
               <h1>Registrar Muestra</h1>
             </hgroup>
           </div>
           <?php

                   require_once '../../system/class.php';//Libreria que contiene las clases.
                   extract($_POST);


            ?>
           <form class="contact_form" method="POST" action="insert"  id="" name="principal1" onsubmit=";"> <!--Formulario de suelo-->

             <label for=""></label>
             <input type="text" name="" value="" id="" title="" maxlength="" placeholder="" />
              </br></br>

           </form>
           <?php include '../../layouts/layout_p.php'; ?>
       </section>

   </body>
</html>
