<?php
    session_start();
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
				<h1>Registro de laboratorio</h1>
			</hgroup>
		</div>
		<?php
		extract($_POST);
    		if(isset($Modificar)) :
              	$Nom_lab=$Modificar;
                require_once '../../system/class.php';
				$lab = new laboratorio();
				$reg = $lab->consultar_laboratorio($mysqli,$Nom_lab);
      
        
       		 endif;
              
		?>

                <form class="contact_form" action="insert" method="post">
                    </br>
                        <label for="Nom_lab">Nombre del laboratorio</label>
                        <input type="text" name="Nom_lab" value="<?php echo $reg[1]; ?>" maxlength="" title"" />
                        </br></br>
                        <input type="hidden" name="cod" value="<?php echo $reg[0]; ?>">
                        <button  type="reset" name="reset" class="boton"><i class="fa fa-eraser"></i> Limpiar</button>
                        <?php if(isset($Modificar)): ?><button type="submit" name="Actualizar" value="Actualizar" class="boton" formaction="update" ><i class="fa fa-check"></i> Guardar cambios</button>
                        <?php else : ?><button type="submit" name="Registrar" value="Registrar" class="boton" ><i class="fa fa-check"></i> Registrar</button><?php endif; ?>

                </form>




               <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>
