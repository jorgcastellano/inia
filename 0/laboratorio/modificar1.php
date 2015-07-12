<!DOCTYPE html>
<html>
    <head>
        <title>Modificar Laboratorio</title>
        <?php include 'layouts/head.php'; ?>
    </head>
    <body>
        <?php include 'layouts/navegacion.php'; ?>
        <section class="bloque">
            <div>
                <?php include 'layouts/logo.php'; ?>
				<hgroup>
					<h1>Modificar Laboratorio</h1>
				</hgroup>
			</div>
                <?php
                extract($_POST);
                require_once './system/class.php';
                $lab = new laboratorio();
                $reg = $lab->consultar_laboratorio($conex,$Nom_lab)

                ?>

                <form class="contact_form" action="update1.php" method="post">
                    </br>
                    <label for="Nom_lab">Nombre del laboratorio</label>
                        <input type="text" name="Nom_lab" value="<?php echo $reg[1]?>" maxlength="" title"" />
                        </br></br>
                        <input type="hidden" name="Cod_lab" value="<?php echo $reg[2]?>" />
                        <button  type="reset" name="reset" class="boton">Limpiar</button>
                        <button class="boton" type="submit" name="submit">Listo</button> 

                </form>




                <?php include 'layouts/layout_p.php'; ?>
        </section>
    </body>
</html>