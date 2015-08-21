<?php
    session_start();
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

                    require_once '../../system/class.php';
                    extract($_POST);
                    
                    for ($i=0;$i<count($Estado);$i++){ $Estado=$Estado[$i]; }
                    for ($i=0;$i<count($Municipio);$i++){ $Municipio=$Municipio[$i]; }


                    $fin = new finca();
                    $fin->registrar_finca($mysqli,$Ced_cliente,$Nom_fin,$Estado,$Municipio,$Direccion2);
        
                ?>


                <?php include '../../layouts/layout_p.php'; ?>
        </section>
    </body>
</html>