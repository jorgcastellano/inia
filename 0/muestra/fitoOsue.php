<?php
    session_start();
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registrar Muestra</title>
        <?php include '../../layouts/head.php'; ?>
    </head>
    <body>
        <?php include '../../system/menu.php'; ?>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php'; ?>
				<hgroup>
					<h1>Registrar Muestra</h1>
				</hgroup>
			</div>

            <?php  extract($_POST); ?>
            <form class="contact_form" method="post" action="index"  id="">
                
             <p>El Sistema de procesos internos del INIA Mérida le recuerda que una vez registradas las muestras solo se..... </p>     
                    
                    <input type="hidden" name="Ced_cliente" value="<?php echo $RegistrarM; ?>" />
                    <button type="submit" class="boton" name="RegistrarS" value="Inicio" ><i class="fa fa-plus"></i> Muestra de Suelo</button>
                    <button type="submit" name="RegistrarF" value="Inicio" class="boton" ><i class="fa fa-plus"></i> Muestra de Fitopatologia</button>
            </form>


                <?php include '../../layouts/layout_p.php'; ?>
        </section>
    </body>
</html>