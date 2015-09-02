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
           
            <form  class="contact_form" method="post" action="insert.php">
            	<label for="Nom_produ"> Nombre del Producto </label>
            	<input required type="txt" name="Nom_produ" id="Nom_produ" value=" " title="Introduzca el nombre del producto " maxlength="50"/>
            	</br>
            	<label for="Existencia"> Cantidad de Producto </label>
            	<input required type="num" name="Existencia" id="Existencia" value=" " title="Introduzca la cantidad de este producto" maxlength="3" />
                </br>
                <label for="Precio_produ"> Precio de Producto </label>
            	<input required type="num" name="Precio_produ" id="Precio_produ" value=" " title="Introduzca el precio por unidad de este producto" maxlength="3" />
           		</br>
                        <button  type="reset" name="reset" class="boton">Limpiar</button>
                        <button class="boton" type="submit" name="submit">Siguiente –></button> 
            </form>
            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>