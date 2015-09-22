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
                  <table class='factura2'>
                    <tr>
                        <td>Ventas anuales</td>
                        <td>Donaciones anuales</td>
                        <td>Ventas mensuales</td>
                        <td>Donaciones mensuales</td>
                    </tr>
                    <tr>
                        <td>$ventaanual1</td>
                        <td>$ventaanual2</td>
                        <td>$ventamensual1</td>
                        <td>$ventamensual2</td>
                    </tr>
                  </table>

                 ";



            ?>


            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>