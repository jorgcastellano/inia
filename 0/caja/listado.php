<?php
        echo " <form method='POST' action='inicio'>
            <div class='buscadores'>
                <input type='text' name='buscador' placeholder='Buscar factura por cédula' />
                <button class='botonmenu' type='submit' name='button'><i class='fa fa-search'></i> Buscar</button>
            </div></form>";

            echo "<form method='POST' action='../caja/procesar'>";
            extract($_POST);
            include_once '../../system/class.php';
            $objfactura = new factura();
            if (!empty($buscador)) {
                $res = $objfactura->buscador_cedula($mysqli,$buscador);
                   echo "<table class='facturai'>
                            <tr>
                                <td>Nombres y Apellidos</td>
                                <td>Cedula</td>
                                <td>Fecha</td>
                                <td>Subtotal</td>
                                <td><i class='fa fa-dollar'></i></td>
                            </tr>";
                    while($resultado = $res->fetch_array()){
                    echo "  <tr>
                                <td>$resultado[1] $resultado[2]</td>
                                <td>$resultado[0]</td>
                                <td>$resultado[4]</td>
                                <td>$resultado[5]</td>
                                <td><button class='botonmenu' type='submit' name='codigo' value='$resultado[3]' >Procesar <i class='fa fa-arrow-right'></i></button></td>
                            </tr>";
                    }
                    echo "</table>";
                
                    echo "<div align='center'>
                        <button class='boton' type='button' onclick=location='inicio' ><i class='fa fa-ban'></i> Cancelar</button>
                    </div>";
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
                                <td><button class='botonmenu' type='submit' name='codigo' value='$resultado[3]' >Procesar <i class='fa fa-arrow-right'></i></button></td>
                            </tr>";
                      }

                      echo "</table>
            </form>
            <div align='center'>
                <button class='boton' type='button' onclick=location='inicio' ><i class='fa fa-spin fa-refresh'></i> Actualizar</button>
            </div>";
        }
?>