<?php
      
      echo "<form method='POST' action='../../0/caja/procesar'>";
        
          extract($_POST);
          include_once '../../system/class.php';
          $objfactura = new factura();
          $res=$objfactura->consultar_facturas($mysqli);

          echo "<table class='facturai'>
                  <tr>
                    <td>Nombres y Apellidos</td>
                    <td>Cedula</td>
                    <td>Fecha</td>
                    <td>Subtotal</td>
                    <td><i class='fa fa-dollar'></i></td>
                  </tr>";
          while($resultado = $res->fetch_array()){
          echo "
                  <tr>
                    <td>$resultado[1] $resultado[2]</td>
                    <td>$resultado[0]</td>
                    <td>$resultado[4]</td>
                    <td>$resultado[5]</td>
                    <td><button class='botonmenu' type='submit' name='codigo' value='$resultado[3]' >Procesar <i class='fa fa-arrow-right'></i></td>
                  </tr>";
            }

            echo "</table>
                  </form>
              ";
        ?>