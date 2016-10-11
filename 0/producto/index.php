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
                  <h1>Sistema de Procesos Internos del INIA Mérida (SPIIM)</h1>
                </hgroup>
            </div>
            <?php

            require_once '../../system/class.php';
            $pro = new producto();

            extract($_GET);

            if (isset($mensaje)) {
              echo "la variable mensaje existe";
            }



            if (isset($_POST['Modificar1'])) :
                extract($_POST);
                $Cod_produ=$Modificar1;

                $reg = $pro->consultar_produc($mysqli,$Cod_produ);
            endif;

                if (isset($_POST['modificar']) AND empty($_POST['seleccion']))
                    header('location: inve');

                if (isset($_POST['seleccion'])) :
                    $seleccion = $_POST['seleccion'];

                    $reg = $pro->consultar_produc($mysqli,$seleccion[0]);
                elseif (isset($_POST['pro'])) :
                    $Cod = $_POST['pro'];

                    $reg = $pro->consultar_produc($mysqli, $Cod);
                endif;

              ?>
            <form  class="contact_form" method="post" action="resultado" onsubmit="return enviar_form_accion();">
            	<label for="Nom_produ"> Nombre del Producto </label>
            	<input required type="txt" name="Nom_produ" id="Nom_produ" value="<?php if(isset($reg)) echo $reg[1] ?>" title="Introduzca el nombre del producto " maxlength="50"placeholder="" pattern="([A-Z]{1}[a-zÑñáéíóú]{1,}\s{0,1})+"/>
            	</br>
            	<label for="Existencia"> Cantidad de Producto </label>

            	<input required type="num" name="Existencia" id="Existencia" value="<?php if(isset($reg)) echo $reg[2] ?>" title="Introduzca la cantidad de este producto" maxlength="7" />


                <select class="opcion3" name="um" required>
                        <option value="">Seleccione</option>
                        <option value="1"<?php if ($reg[5] == "1") echo "selected"; ?>>Por unidad c/u</option>
                    <optgroup label="Capacidad">
                        <option value="2"<?php if ($reg[5] == "2") echo "selected"; ?>>Mililitro</option>
                        <option value="3"<?php if ($reg[5] == "3") echo "selected"; ?>>Litro</option>
                        <option value="4"<?php if ($reg[5] == "4") echo "selected"; ?>>Galon</option>
                    </optgroup>
                    <optgroup label="Masa">
                        <option value="5"<?php if ($reg[5] == "5") echo "selected"; ?>>Gramos</option>
                        <option value="6"<?php if ($reg[5] == "6") echo "selected"; ?>>Kilogramos</option>
                    </optgroup>
                </select>
                </br>
                <label for="Precio_produ"> Precio de Producto </label>
            	<input required type="num" name="Precio_produ" id="Precio_produ" value="<?php if(isset($reg)) echo $reg[3]; ?>" title="Introduzca el precio por unidad de este producto" maxlength="7" />
           		</br>
                <?php if (isset($reg)) {
                        if ($reg[4] == "I"){
                            $selected =  "selected";
                        }
                        elseif ($reg[4] == "E"){
                            $selected2 = "selected";
                        }
                    }
                ?>
                <label for="iva">I.V.A. o Exento</label>
                <select class="opcion4" id="iva" name="iva" required>
                    <option value=""> Selecciones</option>
                    <option value="I" <?php if (isset($selected)) echo $selected; ?>>I.V.A.</option>
                    <option value="E" <?php if (isset($selected2)) echo $selected2; ?>>Exento</option>
                </select>
                <br/>
                <div class="grupobotones">
                    <button name="atras" type="button" onclick=location="inve" class="boton"><i class="fa fa-arrow-left"></i> Ir al Inventario</button>
                    <button  type="reset" name="reset" class="boton"><i class="fa fa-eraser"></i> Limpiar</button>
                    <?php if (isset($_POST['seleccion']) OR isset($_POST['pro']) OR isset($_POST['Modificar1'])) : ?>
                        <button class="boton" type="submit" name="modificar" value="<?php if(isset($reg)) echo $reg[0] ?>" formaction="resultado"><i class="fa fa-check"></i> Guardar cambios</button>
                        <?php else : ?>

                        <button class="boton" type="submit" id="accion_buttom" name="submit" ><i class="fa fa-check"></i> Registrar Producto</button>

                    <?php endif; ?>
                </div>
            </form>
            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>
