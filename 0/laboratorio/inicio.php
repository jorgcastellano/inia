<?php
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>laboratorio</title>

        <?php include '../../layouts/head.php' ?>

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

            $Ced_esp=$_SESSION['ci'];
            $objmuestra = new muestra();
            $reg = $objmuestra -> consultar_muestra_asignadas($mysqli,$Ced_esp);

      echo "
                  <table class='usuario'>
                   <tr>
                       <td>Código</td>
                       <td>Tipo</td>
                       <td>Fecha inicio</td>
                       <td>Analizar</td>
                   </tr>";

          while ($res = $reg -> fetch_array()) :
      echo "
                  <tr>
                      <td>$res[0]</td>
                      <td>$res[1]</td>
                      <td>$res[2]</td>
                      <form action='consultar_detalles' method='POST'>
                      <input type='hidden' name='Cod_muestra[]' value='$res[0]' />
                    <td><button class='sinboton' type='submit' name='Asignar' value='' id='accion_buttom' ><i class='fa fa-arrow-right'></button></i></td>
                    </tr>
              </form>";
  endwhile;
  echo "        </table>";

           include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>
