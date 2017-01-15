<?php
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Productos</title>
        <?php include '../../layouts/head.php' ?>
    </head>
    <body>
        <?php include '../../system/menu.php' ?>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php' ?>
        			<hgroup>
        				<h1>Listado de Productos</h1>
        			</hgroup>
        		</div>
      
      <form method="POST" action="factura_descripcion">
        <?php
          extract($_POST);
          include_once '../../system/class.php';
          $objproducto = new producto();
          
          
                      echo "<table class='anapro'>
                                      <tr>
                                            <td>Nombre</td>
                                            <td>Existencia</td>
                                            <td>Precio</td>
                                            <td>Cantidad</td>
                                       </tr> ";

                  $result = $objproducto->consulta_completo($mysqli);
                  while ($resultado = $result->fetch_array()) 
                  {
                    echo "<tr>
                    <td>".$resultado[1]."</td>";
                    echo "<td>".$resultado[2]."</td>";
                    echo "<td>".$resultado[3]."</td>";
                    echo "<td><input type='num' name='cantidad[]' title='' value=''></td></tr>";
                    echo "<input type='hidden' name='precio[]' value='$resultado[3]' >";
                    echo "<input type='hidden' name='nombre[]' value='$resultado[1]' >";
                  }
                  echo "</table>";
                
        ?>
        <div class="grupobotones">
             <button type="submit" class="boton" name="procesar" value="procesar"><i class="fa fa-pencil"></i> Procesar</button>
             <button type='button' OnClick=location='../home/inicio' class="boton"><i class="fa fa-home"></i> pagina principal</button>
        </div> 
      </form>
        <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>