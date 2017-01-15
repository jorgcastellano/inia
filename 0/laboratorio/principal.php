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

	        <form action="index" method="post">
	    	      <?php
				          extract($_POST);
                  require_once '../../system/class.php';


              ?>
          </form>
           <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>
