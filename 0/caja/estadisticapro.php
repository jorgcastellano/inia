<?php
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sistema interno de gestión de productos y servicios - INIA Mérida</title>
        <?php include '../../layouts/head.php' ?>
    </head>
    <body>
    	<?php include '../../system/menu.php' ?>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php' ?>
                <hgroup>
                    <h1>Estadisticas de ingresos</h1>
                </hgroup>
            </div>

            <?php
            

            include_once '../../system/class.php';

            $objproducto= new producto();
            $res=$objproducto->consulta_completo($mysqli);
            $objfactura=new factura_descripcion();
            

            echo "<table>
                    <tr>
                        <td>PRODUCTO</td>
                        <td>CANTIDAD VENDIDO</td>
                        <td>TOTAL BS</td>
                        <td>TOTAL IVA</td>
                    </tr>

            ";

            while ($reg = $res->fetch_array()) {

                $anual = date("Y");
                $codigo=$reg[0];
                $res2=$objfactura->consultar_producto_cantidad($mysqli,$codigo,$anual);

                $cantidad='';
                while($reg2 = $res2->fetch_array()){

                    $cantidad+=$reg2[3];
                    $costo_unidad=$reg2[4];
                    $iva=$reg2[1];
                }

                $totalbs=$cantidad*$costo_unidad;
                $totaliva=($totalbs*$iva)/100;

            echo "
                    <tr>
                        <td>$reg[1]</td>
                        <td>$cantidad</td>
                        <td>$totalbs</td>
                        <td>$totaliva</td>
                    </tr>  
            ";              
                
            }

            echo "</table>";



            ?>



            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>