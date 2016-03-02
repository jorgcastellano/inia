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
        <section class="bloque">
            <div>
                <?php
                    echo '
                        <header>
                            <section>
                                <img src="../../imgs/logo_new.jpg" />
                            </section>
                        </header>
                    ';
                ?>
                <hgroup>
                    <h1>Procesar factura</h1>
                </hgroup>
            </div>
            <?php

                extract($_POST);
                include_once '../../system/class.php';
                $objfactdescrip = new factura_descripcion();

                //Inciamos una transacción
                if (isset($comprado)) :
                    $sql = "BEGIN";
                    $mysqli->query($sql);
                

                    //Invocacion de los objetos
                    $objcliente = new cliente();
                    $objproducto = new producto();
                    $objfactura = new factura();

                    //Consulta de clientes y productos
                    $ress = $objcliente->consultar_cliente($mysqli, $comprado);
                    $result = $objproducto->consulta_completo($mysqli);

                    //Proceso de compra
                    //Primero hacer la factura básica
                    $objfactura -> facturar($mysqli, $ress[1], $total);
                    $id = $objfactura -> consultar_factura_insertada($mysqli, $ress[1]);
                    
                    //Luego la descripcion o compras actualizando el inventario de una vez
                    $i = 0;
                    while ($resultado = $result->fetch_array()) :
                      if (!empty($cantidad[$i])) :
                        $precio = ($resultado[3] * $cantidad[$i]);
                        $objfactdescrip->facturar_productos($mysqli, $id[0], $resultado[1], $cantidad[$i], $resultado[3], $precio, $resultado[0]);
                        $nuevaexistencia = $resultado[2] - $cantidad[$i];
                        $objproducto->actualizar_existencia($mysqli, $nuevaexistencia, $resultado[0]);
                      endif;
                      $i++;
                    endwhile;
                endif;

            $res2=$objfactdescrip->consultar_factura($mysqli, $id[0]);

            ?>
                <script language="JavaScript" type="text/javascript">
                    function salirpagina() {
                        alert("compa");
                    }
                }
                </script>

            <form method='POST' action='procesar' onsubmit='<?php if (isset($funcionsalir)) {echo $funcionsalir;} ?>'>
            <?php
            echo "    <table class='factura2'>
                    <tr>
                        <td>CANTIDAD</td>
                        <td>DESCRIPCION</td>
                        <td>P. UNIT</td>
                        <td>I.V.A.</td>
                        <td>TOTAL</td>
                    </tr>
            ";

            $iva = 0;
            $exe = 0;
            while($resultado = $res2->fetch_array()){
                if($resultado[6]=='I') {
                    $iva+=$resultado[5];
                    $ivad = "Si";
                }
                elseif($resultado[6]=='E') {
                    $exe+=$resultado[5];
                    $ivad = "No";
                }
                echo "
                  <tr>
                    <td>$resultado[3]</td>
                    <td>$resultado[2]</td>
                    <td>$resultado[4]</td>
                    <td>$ivad</td>
                    <td>$resultado[5]</td>
                  </tr>";
                  unset($ivad);
            }

            $subtotal=$iva+$exe;

            if (isset($retencionporciento))
                if (empty($retencionporciento))
                    $retencionporciento = 0;

            if(isset($procesar)) {
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
                    <input type='hidden' name='total' value='$total'/>
                    <input type='hidden' name='observacion' value='$observacion'/>
                    <input type='hidden' name='ivaporciento' value='$ivaporciento'/>
                    <input type='hidden' name='retencionporciento' value='$retencionporciento'/>
                    <input type='hidden' name='funcionsalir' value='salirpagina()'/>
                    ";

                $formulario2='
                <div class="contact_form"><br>
                    <label for="tipofactura">Tipo de factura</label>
                    <select required id="tipofactura" name="tipofactura">
                        <option value="COMPRA">Compra</option>
                        <option value="DONACION">Donación</option>
                    </select><br>
                    
                    <label for="metodo">Método de pago</label>
                    <select id="metodo" name="metodo">
                        <option value="NINGUNO">Ninguno</option>
                        <option value="EFECTIVO">Efectivo</option>
                        <option value="T/DEBITO">Débito</option>
                        <option value="T/CREDITO">Crédito</option>
                        <option value="DEPOSITO">Depósito</option>
                        <option value="CHEQUE">Cheque</option>
                    </select><br>

                    <label for="bauche">Bauche/nro. de referencia</label>
                    <input type="text" id="bauche" name="bauche" maxlength="10" pattern="^\d{6,10}$" />
                </div>
                ';

                $boton="
                <button type='submit' name='borrar' value='$codigo' formaction='cancel.php' class='boton'><i class='fa fa-ban'></i> Cancelar factura</button>
                <button type='submit' name='codigo' value='$codigo' formaction='../../0/caja/procesar' class='boton'><i class='fa fa-pencil'></i> Modificar factura</button>
                <button type='submit' name='confirmar' value='confirmar' formtarget='_blank' formaction='../../0/factura/factu.php' class='boton'><i class='fa fa-check'></i> Pagado</button>
                ";

            }else{
                $impuesto="<input required type='text' name='ivaporciento' value='' size='5px' />%";
                $retencion="<input type='text' name='retencionporciento' value='' size='5px' />%";
                $observacion="<textarea cols='25' rows='10' name='observacion' value='' placeholder='Observacion' ></textarea>";
            
                $hidden="<input type='hidden' name='codigo' value='$codigo'/>";

                $boton="<button type='submit' name='borrar' value='$codigo' formaction='cancel.php' class='boton'><i class='fa fa-ban'></i> Cancelar factura</button>
                    <button type='submit' name='procesar' value='procesar' class='boton'><i class='fa fa-check'></i> Guardar cambios</button>";
            }
            echo "</table>
                    <table class='factura3'>
                        <tr>
                            <td rowspan='8'>$observacion</td>
                            <td colspan='2' id='espaciosubtotal'>Sub-total</td>
                            <td>$subtotal</td>
                        </tr>
                        <tr>
                            <td colspan='2'>Adiciones, bonificaciones</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan='2'>Monto total exento o exonerado</td>
                            <td>$exe</td>
                        </tr>
                        <tr>
                            <td colspan='2'>I.V.A. base</td>
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
                            <td colspan='2'><b>MONTO TOTAL</b></td>
                            <td><b>$total</b></td>
                        </tr>
                    </table>
                    
                    $hidden

                    $formulario2
                    
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