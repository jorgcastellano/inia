<?php   //listar todas las facturas sin pagar////


        echo " <form method='POST' action='inicio'>
            <div class='buscadores'>
                <input type='text' name='buscador' placeholder='Buscar factura por cédula' />
                <button class='botonmenu' type='submit' name='button'><i class='fa fa-search'></i> Buscar</button>
            </div></form>";

            echo "<form method='POST' action='../caja/procesar'>";
            extract($_POST);
            include_once '../../system/class.php';
            //listar las facturas por numero de cedula del cliente
            $objfactura = new factura();
            if (!empty($buscador)) {
                $res = $objfactura->buscador_cedula($mysqli,$buscador);
                if ($res->num_rows) :
                   echo "<table class='facturai'>
                            <tr>
                                <td>Nombres y Apellidos</td>
                                <td>Cedula</td>
                                <td>Fecha</td>
                                <td>Subtotal</td>
                                <td>Procesar</td>
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
                else : 
                    echo "<h2 align='center'>No existen registros con el numeros de cédula/RIF</h2>";
                    echo "
                        <div align='center'>
                            <button type='button' class='boton' onclick=location='../../0/home/inicio'><i class='fa fa-home'></i> Regresar a inicio</button>
                        </div>
                    ";
                endif;
            //listar todas las facturas impagas en general
            }elseif (empty($buscador) OR !isset($buscador)) {
                $res=$objfactura->consultar_facturas($mysqli);
                if ($res->num_rows) :
                echo "<table class='facturai'>
                <tr>
                    <td>Nombres y Apellidos</td>
                    <td>Cedula</td>
                    <td>Fecha</td>
                    <td>Subtotal</td>
                    <td>Procesar</td>
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

                echo "</table>";
                //en caso de no haber facturas inpagas
                else :
                    echo "<h2 align='center'>En estos momentos no se encuentran facturas pendientes</h2>";
                endif;
        echo "</form>
        <div class='grupobotones'>
            <button class='boton' type='button' onclick=location='inicio' ><i class='fa fa-spin fa-refresh'></i> Actualizar</button>
        </div>";
        }
?>