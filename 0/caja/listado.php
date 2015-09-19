<?php
        echo " <form method='POST' action='listado'>
          <div class='buscadores'>
              <input type='text' name='buscador'  placeholder='Buscar producto' >
              <button class='botonmenu' type='submit' name='button'><i class='fa fa-search'></i> Buscar</button>
              </br>
              <input type='radio' name='opc' value='1' title='click aquí para seleccionar un método de busqueda' checked><label> Frase</label>
              <input type='radio' name='opc'  value='2' title='click aquí para seleccionar un método de busqueda'<label> Por Nombre Completo</label>
          </div>  </form>";

         echo "<form method='POST' action='../../0/caja/procesar'>";
          extract($_POST);
          include_once '../../system/class.php';
          $objfactura = new factura();
          if(isset('buscador'))
            if (!empty($buscador)) {

            switch ($opc) {
              case 1:
                $result=$objfactura->buscadorlike($mysqli, $buscador);
                 $result = $result->fetch_array();
                  if (empty($result))
                      echo "No existe el producto buscado";
                  else {
                    echo "<table class='facturai'>
                          <tr>
                            <td>Nombres y Apellidos</td>
                            <td>Cedula</td>
                            <td>Fecha</td>
                            <td>Subtotal</td>
                            <td><i class='fa fa-dollar'></i></td>
                         </tr>";
                 $result = $objfactura->buscadorlike($mysqli, $buscador);
                  while ($resultado = $result->fetch_array()) {
                  echo "  <tr>
                    <td>$resultado[1] $resultado[2]</td>
                    <td>$resultado[0]</td>
                    <td>$resultado[4]</td>
                    <td>$resultado[5]</td>
                    <td><button class='botonmenu' type='submit' name='codigo' value='$resultado[3]' >Procesar <i class='fa fa-arrow-right'></i></td>
                  </tr>";
                  }
              echo "</table>";
              }
              break;
              case 2:

                        $resultado = $objfactura->consultar_facturas($mysqli);
                          if (empty($resultado))
                              echo "No existe el producto buscado";
                          else {
                               echo "  <table class='facturai'>
                                       <tr>
                                            <td>Nombres y Apellidos</td>
                                            <td>Cedula</td>
                                            <td>Fecha</td>
                                            <td>Subtotal</td>
                                            <td><i class='fa fa-dollar'></i></td>
                                      </tr>";
                           echo "<tr>
                          
                                  <td>$resultado[1] $resultado[2]</td>
                                  <td>$resultado[0]</td>
                                  <td>$resultado[4]</td>
                                  <td>$resultado[5]</td>
                                  <td><button class='botonmenu' type='submit' name='codigo' value='$resultado[3]' >Procesar <i class='fa fa-arrow-right'></i></td>
                                 </tr>
                           </table>";
                                }
                          break;
                          default:
                          echo "Uy! existe un error";
                          break;
                     }
                  }elseif (empty($buscador) OR !isset($buscador)) {
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
                  </form>";
        ?>