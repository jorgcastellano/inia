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
                    <h1>Procesar factura</h1>
                </hgroup>
            </div>

            <?php

            extract($_POST);
            include_once '../../system/class.php';
            $objfactura = new factura();
            $res=$objfactura->consultar_factura($mysqli,$codigo);
            $objayudante= new ayudante();
            $res2=$objayudante-> consultar_ayudante($mysqli);
            $impuesto=($res[7]*$res2[4])/100;
            $total=$res[7]+$impuesto;
            ?>

            <form method="post" action="procesar">
            <label for=''>Tipo de pago</label>
            <select name="Tipo_pago" >
                <option value="" >Seleccione</option>
                <option value="1" >Efectivo</option>
                <option value="2" >Debíto</option>
                <option value="3" >Credíto</option>
                <option value="4" >Cheque</option>
            </select>

            <label for=''>Forma de pago</label>
            <select name="Forma_pago" >
                <option value="" >Seleccione</option>
                <option value="1" >Compra</option>
                <option value="2" >Donación</option>
            </select>

            <label for=''>Bauche</label>
            <input type="text" name="Bauche" value=""/>

            <label for=''>iva</label>
            <input type="text" name="a" value="<?php echo $res2[4].'%' ?>" disabled/>

            <label for=''>Total</label>
            <input type="text" name="b" value="echo $total" disabled/>

                
            </form>






            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>

