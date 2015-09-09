<?php
    session_start();
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>laboratorio</title>
        <?php include '../../layouts/head.php' ?>
    </head>
    <body>
        <?php include '../../system/menu.php' ?>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php' ?>
			<hgroup>
				<h1>Modificar Producto</h1>
			</hgroup>
		</div>
		
		<?php
       
             if (isset($_POST['modificar'])) :
            extract($_POST);
             $Cod_produ=$modificar;
            require_once '../../system/class.php';
            $producto = new producto();
            $producto->modificar_produ($mysqli,$Cod_produ,$Nom_produ,$Existencia,$Precio_produ);
            endif;
        ?>

        <br /><br />
        <button type='button' OnClick=location='index' class="boton">Nuevo laboratorio</button>
        <button type='button' OnClick=location='../home/inicio' class="boton">Pagina Principal</button>

        <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>
