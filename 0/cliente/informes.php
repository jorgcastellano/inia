<?php
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Buscar Cliente</title>
        <?php include_once '../../layouts/head.php' ?>
    </head>
    <body>
      <?php include_once '../../system/menu.php' ?>
      <section class="bloque">
        <div>
          <?php include_once '../../layouts/cabecera-body.php' ?>
  				<hgroup>
  					<h1>Ficha del cliente</h1>
  				</hgroup>
  			</div>
        <?php
          extract($_POST);
          require '../../system/class.php';
          $objinformes= new solicitud();
          $reg=$objinformes->consulta_cliente($mysqli,$Ced_cliente);

          echo"
          <table class='anapro'>
          <tr>
            <td>SOLICITUD</td>
            <td>FECHA</td>
            <td>ESTATUS</td>
            <td>DETALLES</td>
          </tr>";

          while ($res=$reg->fetch_array()) {
          echo "
          <form method='POST' action='../../0/informes/infosu'>
            <tr>
              <td>".$res[1]."</td>
              <td>".$res[4]."</td>
              <td>".$res[3]."</td>";
              if($res[3]=="fin")
              echo "<td><button class='sinboton' formtarget='_blank' type='submit' name='cod_sol_final' value='".$res[1]."' id='accion_buttom' ><i class='fa fa-arrow-right'></button></i></td>";
              else
              echo "<td></td>";
            echo "</tr>
            </form>";
          }

      echo "</table>";




                include_once '../../layouts/layout_p.php'; ?>
        </section>
        <script type="text/javascript">
          iniciar_act_eliminar(<?php echo $contador ?>);
        </script>
    </body>
</html>
