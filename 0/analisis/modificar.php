<!DOCTYPE html>
<html>
    <head>
        <title>Modificar analisis</title>
        <?php include '../../layouts/head.php' ?>
    </head>
    <body>
        <?php include '../../layouts/navegacion.php' ?>
        <section class="bloque">
            <div>
                <?php include '../../layouts/logo.php' ?>
				<hgroup>
					<h1>Modificar analisis</h1>
				</hgroup>
			</div>
                <?php
                extract($_POST);
                require_once '../../system/class.php';
                $ana = new analisis();
                $reg = $ana->consultar_analisis($conex,$Nom_ana); 

                ?>

                <form class="contact_form" action="update" method="post">
                    </br>
                    <label for="Nom_ana">Nombre del analisis</label>
                        <input type="text" name="Nom_ana" value="<?php echo $reg[1]?>" maxlength="" title"" />
                        </br></br>
                    <label for="Precio_ana">Costo del analisis</label>
                        <input type="text" name="Precio_ana" value="<?php echo $reg[2]?>" maxlength="" title"" />
                        </br></br>
                    <label for="Tipo">Tipo de analisis</label>
                        <select name="Tipo[]">
                            <option value="">Seleccione</option>
                            <option value="1" <?php if($reg['Tipo']=='1'){ echo 'selected'; } ?>>De suelo</option>
                            <option value="2" <?php if($reg['Tipo']=='2'){ echo 'selected'; } ?>>De fitopatologia</option>
                        </select>
                        </br></br>
                        <input type="hidden" name="Cod_ana" value="<?php echo $reg[0]?>" />
                        <button  type="reset" name="reset" class="boton">Limpiar</button>
                        <button class="boton" type="submit" name="submit">Listo</button> 

                </form>

                <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>