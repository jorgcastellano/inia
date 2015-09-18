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
            echo $codigo;
            
            include_once '../../system/class.php';
            /*$objfactura = new factura();
            $res=$objfactura->consultar_factura($mysqli,$codigo);*/
            $objfactura_des = new factura_descripcion();
            $res2=$objfactura_des->consultar_factura($mysqli, $codigo);
            /*$objayudante= new ayudante();
            $res3=$objayudante-> consultar_ayudante($mysqli);
            $impuesto=($res[6]*$res2[4])/100;
            $total=$res[6]+$impuesto;*/
            
            echo "

            <form method='post' action=''>
                <table class=''>
                    <tr>
                        <td>CANTIDAD</td>
                        <td>DESCRIPCION</td>
                        <td>P. UNIT</td>
                        <td>TOTAL</td>
                    </tr>
            ";

            while($resultado = $res2->fetch_array()){
          echo "
                  <tr>
                    <td>$resultado[3]</td>
                    <td>$resultado[2]</td>
                    <td>$resultado[4]</td>
                    <td>$resultado[5]</td>
                  </tr>";
            }

         echo "
                    
                    <tr>
                        <td rowspan='8'><textarea cols='30' rows='12' placeholder='Observacion' ></textarea></td>
                        <td colspan='2'>Sub-total</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan='2'>adiciones, bonificaciones</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan='2'>Monto Total Exento o Exonerado</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan='2'>I.V.A. Base</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan='2'>I.V.A.</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan='2'>Retencion</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan='2'>Monto total del impuesto segun alicuota</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan='2'>MONTO TOTAL</td>
                        <td></td>
                    </tr>




                </table>


                </form>
              ";
                extract($_POST);
                
                include_once '../../system/class.php';
                $objfactura = new factura();
                $res=$objfactura->consultar_factura($mysqli,$codigo);
                $objayudante= new ayudante();
                $res2=$objayudante-> consultar_ayudante($mysqli);
                //Calculos de subtotal con iva
                $impuesto=($res[6]*$res2[4])/100;
                $total=$res[6]+$impuesto;

            ?>





           <?php /*<form class="contact_form" method="post" action="procesar">
            <label for=''>Tipo de pago</label>
            <select name="Tipo_pago" >
                <option value="" >Seleccione</option>
                <option value="1" >Efectivo</option>
                <option value="2" >Debíto</option>
                <option value="3" >Credíto</option>
                <option value="4" >Cheque</option>
            </select>
            <br/>
            <label for=''>Forma de pago</label>
            <select name="Forma_pago" >
                <option value="" >Seleccione</option>
                <option value="1" >Compra</option>
                <option value="2" >Donación</option>
            </select>
            <br/>
            <label for=''>Bauche</label>
            <input type="text" name="Bauche" value=""/>
            <br/>
            <label for=''>Subtotal</label>
            <input type="text" name="Subtotal" value="<?php echo $res[6] ?>"disabled/>
            <br/>
            <label for=''>iva</label>
            <input type="text" name="a" value="<?php echo $res2[4].'%' ?>" disabled/>
            <br/>
            <label for=''>Total</label>
            <input type="text" name="b" value="<?php echo $total ?>" disabled/>

            <div align="center">
                <button type="button" name="regresar" onclick=location="inicio" class="boton"><i class="fa fa-home"></i> Página principal</button>
                <button type="submit" name="guardar" class="boton"><i class="fa fa-check"></i> Generar factura</button>
            </div>
            </form>*/ ?>
            </form>
            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>

