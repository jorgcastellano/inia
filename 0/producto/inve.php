<?php
    session_start();
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Productos</title>
        <?php include '../../layouts/head.php' ?>
    </head>
    <body>
        <?php include '../../system/menu.php' ?>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php' ?>
			<hgroup>
				<h1>Listado de Productos</h1>
			</hgroup>
		</div>

                  <table class="anapro">
                <tr>
                    <td>Nombre</td>
                    <td>Existencia</td>
                    <td>Precio</td>
                    <td>Selección</td>
                </tr>
                <?php
                    include_once '../../system/class.php';
                    $objprodu = new producto();
                    $result = $objprodu->consulta_completo($mysqli);
                    while ($resultado = $result->fetch_array()) {
                            echo "<tr>
                            <td>".$resultado[1]."</td>";
                            echo "<td>".$resultado[2]."</td>";
                            echo "<td>".$resultado[3]."</td>";
                            echo "<td><input type='radio' name='seleccion' value='$resultado[0]'></td>
                        </tr>";
                    }
                ?>
            </table>  
	
        <br /><br />

        <button type="submit" name="Modificar" formaction="index" class="boton" >Modificar</button>
        <button type='button' OnClick=location='index' class="boton">Nuevo Producto</button>
        <button type='button' OnClick=location='../home/inicio' class="boton">Pagina Principal</button>
       
        <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>
