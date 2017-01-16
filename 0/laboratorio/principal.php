<?php
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>laboratorio</title>

        <?php include '../../layouts/head.php' ?>

        <script type="text/javascript">
        //scrip de selección que determina cual formulario se desea cargar


        function mostrarformulario(){

          if (document.getElementById('formulario1').checked == true) {

            document.getElementById('primero').style.display='block';

          } else {

            document.getElementById('primero').style.display='none';
            }

          if (document.getElementById('formulario2').checked == true) {

            document.getElementById('segundo').style.display='block';

          } else {

            document.getElementById('segundo').style.display='none';
          }


        }

        </script>
    </head>
    <body>
        <?php include '../../system/menu.php' ?>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php' ?>
				<hgroup>
					<h1>Laboratorios</h1>
				</hgroup>
			</div>

      <?php
          extract($_POST);
          require_once '../../system/class.php';
          require_once '../../system/classesp.php';
      ?>
	        <form action="index" method="post">

            <input type="radio" name="formulario" value="suelo" id="formulario1" onclick="mostrarformulario();" checked="checked"/>Asignar muestras
            <input type="radio" name="formulario" value="fito" id="formulario2" onclick="mostrarformulario();"/>Asignar recomendaciones
          </form>
              <div id='primero' style='display:none;'>
                <?php
                include 'lib_asig_especialista.php' ?>
              </div>

              <div id='segundo' style='display:none;'>
                <?php  //include 'lib_asig_recomendador.php';?>
              </div>

           <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>
