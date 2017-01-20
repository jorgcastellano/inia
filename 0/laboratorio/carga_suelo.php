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
               <h1>Cargar Resultados Suelo</h1>
             </hgroup>
           </div>
           <?php

                   require_once '../../system/class.php';//Libreria que contiene las clases.
                   extract($_POST);
                   $accion="Guardar";

                  $objresultado = new r_suelo();
                  $reg=$objresultado->consultar_r_muestra_s($mysqli,$Cod_muestra);
                  if(!empty($reg)):
                    $accion="Modificar";
                  endif;
                  if(isset($Modificar)):
                    $accion="Modificar";
                  endif;



          echo "

                    <form class='contact_form' method='POST' action='res_suelo'  id='' name='principal1' onsubmit=''>

                          <label for=''>Arenoso</label>
                          <input type='text' name='Are' value='$reg[3]' id='' title='' maxlength='' placeholder='' />

                          </br></br>
                          <label for=''>Limoso</label>
                          <input type='text' name='Lim' value='$reg[4]' id='' title='' maxlength='' placeholder='' />

                          </br></br>
                          <label for=''>Arcilloso</label>
                          <input type='text' name='Arc' value='$reg[5]' id='' title='' maxlength='' placeholder='' />

                          </br></br>
                          <label for=''>Textura</label>
                          <input type='text' name='Tex' value='$reg[6]' id='' title='' maxlength='' placeholder='' />

                          </br></br>
                          <label for=''>Grupo</label>
                          <input type='text' name='Grup' value='$reg[7]' id='' title='' maxlength='' placeholder='' />

                          </br></br>
                          <label for=''>Fósforo</label>
                          <input type='text' name='Fos' value='$reg[8]' id='' title='' maxlength='' placeholder='' />
                          <input type='text' name='FosL' value='$reg[9]' id='' title='' maxlength='' placeholder='' />
                          </br></br>
                          <label for=''>Potasio</label>
                          <input type='text' name='Pot' value='$reg[10]' id='' title='' maxlength='' placeholder='' />
                          <input type='text' name='PotL' value='$reg[11]' id='' title='' maxlength='' placeholder='' />
                          </br></br>
                          <label for=''>Calcio</label>
                          <input type='text' name='Ca' value='$reg[12]' id='' title='' maxlength='' placeholder='' />
                          <input type='text' name='CaL' value='$reg[13]' id='' title='' maxlength='' placeholder='' />
                          </br></br>
                          <label for=''>Magnecio</label>
                          <input type='text' name='Mag' value='$reg[14]' id='' title='' maxlength='' placeholder='' />
                          <input type='text' name='MagL' value='$reg[15]' id='' title='' maxlength='' placeholder='' />
                          </br></br>
                          <label for=''>%MO</label>
                          <input type='text' name='Mat' value='$reg[16]' id='' title='' maxlength='' placeholder='' />
                          <input type='text' name='MatL' value='$reg[17]' id='' title='' maxlength='' placeholder='' />
                          </br></br>
                          <label for=''>PH</label>
                          <input type='text' name='PH' value='$reg[18]' id='' title='' maxlength='' placeholder='' />
                          <input type='text' name='PHL' value='$reg[19]' id='' title='' maxlength='' placeholder='' />
                          </br></br>
                          <label for=''>CE</label>
                          <input type='text' name='Con' value='$reg[20]' id='' title='' maxlength='' placeholder='' />
                          <input type='text' name='ConL' value='$reg[21]' id='' title='' maxlength='' placeholder='' />
                          </br></br>
                          <label for=''>Aluminio</label>
                          <input type='text' name='Alu' value='$reg[22]' id='' title='' maxlength='' placeholder='' />
                          <input type='text' name='AluL' value='$reg[23]' id='' title='' maxlength='' placeholder='' />
                          </br></br>
                          <input type='hidden' name='Cod_muestra' value='$Cod_muestra' />
                          <button class='boton' type='reset' value='Borrar' name='reset' id='reset'><i class='fa fa-eraser'></i> Limpiar</button>
           							  <button type='button' id='accion_buttom' name='Volver' value='Volver' onclick=location='inicio' class='boton' ><i class='fa fa-check'></i> Volver a inicio</button>
                          <button type='submit' name='$accion' value='$accion' class='boton' ><i class='fa fa-check'></i> Guardar</button>
                    </form>

                ";


            include '../../layouts/layout_p.php'; ?>
       </section>

   </body>
</html>
