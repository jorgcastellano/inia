<!DOCTYPE html>
<html>
    <head>
        <title>Registrar Finca</title>
        <?php include 'layouts/head.php'; ?>
    </head>
    <body>
        <?php include 'layouts/navegacion.php'; ?>
        <section class="bloque">
            <div>
                <?php include 'layouts/logo.php'; ?>
				<hgroup>
					<h1>Registrar Finca</h1>
				</hgroup>
			</div>

                <?php
                
                extract($_POST);
                require_once './system/class.php';


                for ($i=0;$i<count($Estado);$i++){ $Estado=$Estado[$i]; }
                for ($i=0;$i<count($Municipio);$i++){ $Municipio=$Municipio[$i]; }


                $fin = new finca();
                $fin->registrar_finca($conex,$Ced_cliente,$Nom_fin,$Estado,$Municipio,$Direccion);

                ?>



                <?php include 'layouts/layout_p.php'; ?>
        </section>
    </body>
</html>