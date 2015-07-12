<!DOCTYPE html>
<html>
    <head>
        <title>Registrar Laboratorio</title>
        <?php include 'layouts/head.php'; ?>
    </head>
    <body>
        <?php include 'layouts/navegacion.php'; ?>
        <section class="bloque">
            <div>
                <?php include 'layouts/logo.php'; ?>
				<hgroup>
					<h1>Registrar Laboratorio</h1>
				</hgroup>
			</div>

                <form class="contact_form" action="insert1.php" method="post">
                    </br>
                    <label for="Nom_lab">Nombre del laboratorio</label>
                        <input type="text" name="Nom_lab" value="" maxlength="" title"" />
                        </br></br>
                        <button  type="reset" name="reset" class="boton">Limpiar</button>
                        <button class="boton" type="submit" name="submit">Siguiente –></button> 

                </form>




                <?php include 'layouts/layout_p.php'; ?>
        </section>
    </body>
</html>