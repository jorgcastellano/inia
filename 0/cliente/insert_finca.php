<?php
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registrar Finca</title>
        <?php include '../../layouts/head.php'; ?>
    </head>
    <body>
        <?php include '../../system/menu.php'; ?>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php'; ?>
				<hgroup>
					<h1>Registrar Finca</h1>
				</hgroup>
			</div>
                <?php
                    if ($_SESSION['privilegios'] == 1) : 
                        require_once '../../system/class.php';
                        extract($_POST);

                        $fin = new finca();
                        $fin->registrar_finca($mysqli,$Ced_cliente,$Nom_fin,$Estado,$Municipio,$Parroquia);
                    endif;
                    header('location: resultados?Ced_cliente='.$Ced_cliente);
                ?>
                <?php include '../../layouts/layout_p.php'; ?>
        </section>
    </body>
</html>