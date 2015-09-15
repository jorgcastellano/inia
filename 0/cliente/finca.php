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

            <form class="contact_form" method="post" action="insert_finca.php"  id="">
                
                    <?php include_once 'lib_finca.php'; ?>
                    
                    <input type="hidden" name="Ced_cliente" value="<?php echo $_POST['Finca']; ?>" />
                    <button type="reset" class="boton" name="reset"><i class="fa fa-eraser"></i> Limpiar formulario</button>
                    <button type="submit" name="RegistrarM" value="RegistrarM" class="boton" ><i class="fa fa-check"></i> Registrar</button>
            </form>


                <?php include 'layouts/layout_p.php'; ?>
        </section>
    </body>
</html>