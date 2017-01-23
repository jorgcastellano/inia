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
                   $accion="Guardar";

                  if(isset($Modificar)):
                    $accion="Modificar";
                    $objrecomendacion= new rec_suelo();
                    $reg=$objrecomendacion->consultar_rec_suelo($mysqli,$Cod_muestra);
                  endif;



          echo "

                    <form class='contact_form' method='POST' action='res_recs'  id='' name='principal1' onsubmit=''>

                          <label for=''>Titulo para el primer item:</label>
                          <input type='text' name='TituloA' value='$reg[3]' id='' title='' maxlength='' placeholder='' />
                          </br></br>
                          <label for=''>Descripcion: </label>
                          <textarea class='areatexto' name='DescripcionA' id='Aplicacion' title='  placeholder='Por Favor Especifique aquí el modo de aplicación del fertilizante'>$reg[4]</textarea>
                          </br></br>

                          <label for=''>Titulo para el segundo item</label>
                          <input type='text' name='TituloB' value='$reg[5]' id='' title='' maxlength='' placeholder='' />
                          </br></br>
                          <label for=''>Descripcion</label>
                          <textarea class='areatexto' name='DescripcionB' id='Aplicacion' title='  placeholder='Por Favor Especifique aquí el modo de aplicación del fertilizante'>$reg[6]</textarea>
                          </br></br>

                          <input type='hidden' name='Cod_muestra' value='$Cod_muestra' />
                          <input type='hidden' name='id' value='$id' />
                          <button class='boton' type='reset' value='Borrar' name='reset' id='reset'><i class='fa fa-eraser'></i> Limpiar</button>
           							  <button type='button' id='accion_buttom' name='Volver' value='Volver' onclick=location='inicio' class='boton' ><i class='fa fa-check'></i> Volver a inicio</button>
                          <button type='submit' name='$accion' value='$accion' class='boton' ><i class='fa fa-check'></i> Guardar</button>
                    </form>

                ";


            include '../../layouts/layout_p.php'; ?>
       </section>

   </body>
</html>
