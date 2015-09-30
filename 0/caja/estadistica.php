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


            $anual = date("Y");
            $mensual = "-".date('m')."-";
            $tipo1 = "COMPRA";
            $tipo2 = "DONACION";
            $objventas= new factura();
            $res1=$objventas-> consultar_ventas_anual($mysqli,$tipo1,$anual);
            $res2=$objventas-> consultar_ventas_anual($mysqli,$tipo2,$anual);

            $res3=$objventas-> consultar_ventas_anual($mysqli,$tipo1,$mensual);
            $res4=$objventas-> consultar_ventas_anual($mysqli,$tipo2,$mensual);
            
            $ventaanual1="";

            while($resultado1 = $res1->fetch_array()){
                $ventaanual1+=$resultado1[0];
            }


            
            $ventaanual2="";

            while($resultado2 = $res2->fetch_array()){
                $ventaanual2+=$resultado2[0];
            }
            
            $ventamensual1="";

            while($resultado3 = $res3->fetch_array()){
                $ventamensual1+=$resultado3[0];
            }

            
            $ventamensual2="";

            while($resultado4 = $res4->fetch_array()){
                $ventamensual2+=$resultado4[0];
            }
            

            echo "
                  <table>
                    <tr>
                        <td>VENTAS ANUALES</td>
                        <td>DONACIONES ANUALES</td>
                        <td>VENTAS MENSUALES</td>
                        <td>DONACIONES MENSUALES</td>
                    </tr>
                    <tr>
                        <td>$ventaanual1</td>
                        <td>$ventaanual2</td>
                        <td>$ventamensual1</td>
                        <td>$ventamensual2</td>
                    </tr>
                  </table>

                 ";


            $objproducto= new producto();
            $res5=$objproducto->consulta_completo($mysqli);
            $objfactura=new factura_descripcion();
            

            echo "<table>
                    <tr>
                        <td>PRODUCTO</td>
                        <td>CANTIDAD VENDIDO</td>
                        <td>TOTAL BS</td>
                        <td>TOTAL IVA</td>
                    </tr>

            ";

            while ($reg = $res5->fetch_array()) {

                $anual = date("Y");
                $codigo=$reg[0];
                $res6=$objfactura->consultar_producto_cantidad($mysqli,$codigo,$anual);
                $filas=mysqli_num_rows($res6);
                
                if($filas>0){

                $cantidad='';
                while($reg2 = $res6->fetch_array()){

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
            }

            echo "</table>";



            ?>


            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>