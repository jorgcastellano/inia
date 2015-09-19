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
           
            $objfactura_des = new factura_descripcion();
            $res2=$objfactura_des->consultar_factura($mysqli, $codigo);
            
            echo "

            <form method='post' action='procesar'>
                <table class=''>
                    <tr>
                        <td>CANTIDAD</td>
                        <td>DESCRIPCION</td>
                        <td>P. UNIT</td>
                        <td>TOTAL</td>
                    </tr>
            ";

            $iva='';
            $exe='';
            while($resultado = $res2->fetch_array()){
          echo "
                  <tr>
                    <td>$resultado[3]</td>
                    <td>$resultado[2]</td>
                    <td>$resultado[4]</td>
                    <td>$resultado[5]</td>
                  </tr>";

                  if($resultado[6]=='I'){ $iva+=$resultado[5]; }
                  if($resultado[6]=='E'){ $exe+=$resultado[5]; }
            }

            $subtotal=$iva+$exe;

            if(isset($procesar)){ 
                $observacion=$Observacion;
                $impuesto=($iva*$ivaporciento)/100; 
                $retencion=($impuesto*$retencionporciento)/100;
                $alicuota=$impuesto-$retencion;
                $total=$subtotal+$alicuota;

                $hidden="<input type='hidden' name='codigo' value='$codigo'/>
                    <input type='hidden' name='exento' value='$exe'/>
                    <input type='hidden' name='base' value='$iva'/>
                    <input type='hidden' name='iva' value='$impuesto'/>
                    <input type='hidden' name='retencion' value='$retencion'/>
                    <input type='hidden' name='alicuota' value='$alicuota'/>
                    <input type='hidden' name='total' value='$total'/>";


                $boton="<button type='submit' name='confirmar' value='' formaction='confirmar' class='boton'><i class='fa fa-check'></i> Confirmar</button>";

            }else{
                $impuesto="<input type='text' name='ivaporciento' value='' />";
                $retencion="<input type='text' name='retencionporciento' value='' />";
                $observacion="<textarea cols='30' rows='12' name='Observacion' value='' placeholder='Observacion' ></textarea>";
            
                $hidden="<input type='hidden' name='codigo' value='$codigo'/>";

                $boton="<button type='button' name='regresar' onclick=location='inicio' class='boton'><i class='fa fa-home'></i> Regresar a inicio</button>
                    <button type='submit' name='procesar' value='procesar' class='boton'><i class='fa fa-check'></i> Procesar</button>";

            }




         echo "
                    
                    <tr>
                        <td rowspan='8'>$observacion</td>
                        <td colspan='2'>Sub-total</td>
                        <td>$subtotal</td>
                    </tr>
                    <tr>
                        <td colspan='2'>adiciones, bonificaciones</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan='2'>Monto Total Exento o Exonerado</td>
                        <td>$exe</td>
                    </tr>
                    <tr>
                        <td colspan='2'>I.V.A. Base</td>
                        <td>$iva</td>
                    </tr>
                    <tr>
                        <td colspan='2'>I.V.A.</td>
                        <td>$impuesto</td>
                    </tr>
                    <tr>
                        <td colspan='2'>Retencion</td>
                        <td>$retencion</td>
                    </tr>
                    <tr>
                        <td colspan='2'>Monto total del impuesto segun alicuota</td>
                        <td>$alicuota</td>
                    </tr>
                    <tr>
                        <td colspan='2'>MONTO TOTAL</td>
                        <td>$total</td>
                    </tr>




                </table>
                    
                    $hidden

                <div align='center'>
                   $boton 
                </div>
                
                </form>
              ";
              ?>

            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>

