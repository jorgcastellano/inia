<!DOCTYPE html>
<html>
    <head>
        <title>Registrar analisis</title>
        <?php include '../../layouts/head.php' ?>
    </head>
    <body>
        <?php include '../../layouts/navegacion.php' ?>
        <section class="bloque">
            <div>
                <?php include '../../layouts/logo.php' ?>
				<hgroup>
					<h1>Registrar analisis</h1>
				</hgroup>
			</div>

                <form class="contact_form" action="insert" method="post">
                    </br>
                    <label for="Nom_ana">Nombre del analisis</label>
                        <input type="text" name="Nom_ana" value="" maxlength="" title"" />
                        </br></br>
                    <label for="Precio_ana">Costo del analisis</label>
                        <input type="text" name="Precio_ana" value="" maxlength="" title"" />
                        </br></br>
                    <label for="Tipo">Tipo de analisis</label>
                        <select name="Tipo[]">
                            <option value="">Seleccione</option>
                            <option value="1">De suelo</option>
                            <option value="2">De fitopatologia</option>
                        </select>
                        </br></br>
                        <button  type="reset" name="reset" class="boton">Limpiar</button>
                        <button class="boton" type="submit" name="submit">Siguiente –></button> 

                </form>

                <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>