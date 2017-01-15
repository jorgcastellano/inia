<?php
   session_start();
   include_once '../../system/check.php';
?>
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
               <h1>Cargar Resultados Suelo</h1>
             </hgroup>
           </div>
           <?php

                   require_once '../../system/class.php';//Libreria que contiene las clases.
                   extract($_POST);


            ?>
           <form class="contact_form" method="POST" action="insert"  id="" name="principal1" onsubmit=""> <!--Formulario de suelo-->

           <label for="">Arenoso</label>
           <input type="num" name="Arenoso" value="" id="" title="" maxlength="" placeholder="" />
           <input type="num" name="rango1" value="" id="" title="" maxlength="" placeholder="" />
            </br></br>
            <label for="">Limoso</label>
            <input type="num" name="Limoso" value="" id="" title="" maxlength="" placeholder="" />
            <input type="num" name="rango2" value="" id="" title="" maxlength="" placeholder="" />
             </br></br>
             <label for="">Arcilloso</label>
             <input type="num" name="Arcilloso" value="" id="" title="" maxlength="" placeholder="" />
             <input type="num" name="rango3" value="" id="" title="" maxlength="" placeholder="" />
              </br></br>
              <label for="">Textura</label>
              <input type="num" name="Textura" value="" id="" title="" maxlength="" placeholder="" />
              <input type="num" name="rango4" value="" id="" title="" maxlength="" placeholder="" />
               </br></br>
               <label for="">Grupo</label>
               <input type="num" name="Grupo" value="" id="" title="" maxlength="" placeholder="" />
               <input type="num" name="rango5" value="" id="" title="" maxlength="" placeholder="" />
                </br></br>
                <label for="">Fósforo</label>
                <input type="num" name="Fósforo" value="" id="" title="" maxlength="" placeholder="" />
                <input type="num" name="rango6" value="" id="" title="" maxlength="" placeholder="" />
                 </br></br>
                 <label for="">Potasio</label>
                 <input type="num" name="Potasio" value="" id="" title="" maxlength="" placeholder="" />
                 <input type="num" name="rango7" value="" id="" title="" maxlength="" placeholder="" />
                  </br></br>
                  <label for="">Calcio</label>
                  <input type="num" name="Calcio" value="" id="" title="" maxlength="" placeholder="" />
                  <input type="num" name="rango8" value="" id="" title="" maxlength="" placeholder="" />
                   </br></br>
                   <label for="">Magnecio</label>
                   <input type="num" name="Magnecio" value="" id="" title="" maxlength="" placeholder="" />
                   <input type="num" name="rango9" value="" id="" title="" maxlength="" placeholder="" />
                    </br></br>
                    <label for="">%MO</label>
                    <input type="num" name="%MO" value="" id="" title="" maxlength="" placeholder="" />
                    <input type="num" name="rango10" value="" id="" title="" maxlength="" placeholder="" />
                     </br></br>
                     <label for="">PH</label>
                     <input type="num" name="PH" value="" id="" title="" maxlength="" placeholder="" />
                     <input type="num" name="rango11" value="" id="" title="" maxlength="" placeholder="" />
                      </br></br>
                      <label for="">CE</label>
                      <input type="num" name="CE" value="" id="" title="" maxlength="" placeholder="" />
                      <input type="num" name="rango12" value="" id="" title="" maxlength="" placeholder="" />
                       </br></br>
                       <label for="">Aluminio</label>
                       <input type="num" name="Aluminio" value="" id="" title="" maxlength="" placeholder="" />
                       <input type="num" name="Arenoso" value="" id="" title="" maxlength="" placeholder="" />
                        </br></br>
                        <label for=""></label>
                        <input type="num" name="" value="" id="" title="" maxlength="" placeholder="" />
                        <input type="num" name="Arenoso" value="" id="" title="" maxlength="" placeholder="" />
                         </br></br>
                         <button class="boton" type="reset" value="Borrar" name="reset" id="reset"><i class="fa fa-eraser"></i> Limpiar</button>
           							<?php if(isset($ModificarR)): ?><button type="submit" id="accion_buttom" name="ModificarR" value="ModificarR" class="boton" ><i class="fa fa-check"></i> Guardar cambios</button><?php endif; ?>
                           			<?php if($RegistrarR=='ContinueM'): ?><button type="submit" name="RegistrarR" value="ContinueR" class="boton" ><i class="fa fa-check"></i> Registrar</button><?php endif; ?>
                           			<?php if($RegistrarR=='Inicio'): ?><button type="submit" name="RegistrarR" value="Inicio" class="boton" ><i class="fa fa-check"></i> Registrar</button><?php endif; ?>

           </form>
           <?php include '../../layouts/layout_p.php'; ?>
       </section>

   </body>
</html>
