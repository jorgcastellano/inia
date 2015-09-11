<?php
    session_start();
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
                
               if (isset($_POST['Modificar1'])) :
                extract($_POST);
                $Cod_produ=$Modificar1;
                require_once '../../system/class.php';
                $pro = new producto();  
                $reg = $pro->consultar_produc($mysqli,$Cod_produ);
                endif;
        
                if (isset($_POST['modificar']) AND empty($_POST['seleccion']))
                    header('location: inve');
                require_once '../../system/class.php';

                if (isset($_POST['seleccion'])) :
                    $seleccion = $_POST['seleccion'];
                    $pro = new producto();  
                    $reg = $pro->consultar_produc($mysqli,$seleccion);
                elseif (isset($_POST['pro'])) :
                    $Cod = $_POST['pro'];
                    $pro = new producto();
                    $reg = $pro->consultar_produc($mysqli, $Cod);
                endif;
               
              ?>
            <form  class="contact_form" method="post" action="resultado">
            	<label for="Nom_produ"> Nombre del Producto </label>
            	<input required type="txt" name="Nom_produ" id="Nom_produ" value="<?php if(isset($reg)) echo $reg[1] ?>" title="Introduzca el nombre del producto " maxlength="50"/>
            	</br>
            	<label for="Existencia"> Cantidad de Producto </label>
            	<input required type="num" name="Existencia" id="Existencia" value="<?php if(isset($reg)) echo $reg[2] ?>" title="Introduzca la cantidad de este producto" maxlength="3" />
                </br>
                <label for="Precio_produ"> Precio de Producto </label>
            	<input required type="num" name="Precio_produ" id="Precio_produ" value="<?php if(isset($reg)) echo $reg[3]; ?>" title="Introduzca el precio por unidad de este producto" maxlength="3" />
           		</br>
                <button name="atras" type="button" onclick=location="inve" class="boton"><i class="fa fa-arrow-left"></i> Ir a Inventario</button>
                <button  type="reset" name="reset" class="boton"><i class="fa fa-eraser"></i> Limpiar</button>
               
                <?php if (isset($_POST['seleccion']) OR isset($_POST['pro']) OR isset($_POST['Modificar1'])) : ?>
                    <button class="boton" type="submit" name="modificar" value="<?php if(isset($reg)) echo $reg[0] ?>" formaction="resultado"><i class="fa fa-floppy-o"></i> Guardar cambios</button> 
                    <?php else : ?>
                    <button class="boton" type="submit" name="submit"><i class="fa fa-floppy-o"></i> Registrar Producto</button> 
                <?php endif; ?>
            </form>
            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>