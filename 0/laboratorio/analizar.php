<?php
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
					<h1>Laboratorios</h1>
				</hgroup>
			</div>

      <?php
      include '../laboratorio/principal.php';
      include '../../layouts/layout_p.php' ?>

   </section>
</body>
</html>
