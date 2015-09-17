<?php
      
      echo "<form method='POST' action='../../0/caja/procesar'>";
        
          extract($_POST);
          include_once '../../system/class.php';
          $objfactura = new factura();
          $res=$objfactura->consultar_facturas($mysqli);

          echo "<table class='anapro'>
                <tr>
                <td>Codigo</td>
                <td>Cedula</td>
                <td>Fecha</td>
                <td><i class=''></i></td>
                </tr>";
          while($resultado = $res->fetch_array()){
          echo "
                <tr>
                <td>$resultado[0]</td>
                <td>$resultado[1]</td>
                <td>$resultado[2]</td>
                <td><button class='sinboton' type='submit' name='codigo' value='$resultado[0]' ><i class='fa fa-money'></i></td>
                </tr>";
            }

            echo "</table>
                  </form>

              ";
          
          
                      
                
        ?>
