<?php include 'classmenu.php'; ?>

	<nav class="menu">
		<ul class="menu-margen">
			<?php
				$arreglo1 = array();
				$arreglo2 = array();
				$arreglo3 = array();
				$menu1 = new controladorMenu();
	            $arreglo1 = $menu1 -> menuHome();
	            $arreglo2 = $menu1 -> cerrar_sesion();
				if ($logeado == "Off") : ?>
					<form method="POST" action="../../includes/proceso_login.php">
		                <li class="users"><input type="email" name="correo" placeholder="Correo electrónico"></li>
		                <li class="pass"><input type="password" name="password" placeholder="Contraseña"></li>
		                <div><li><button class="botonmenu" type="submit" name="button">Entrar</button></li></div>
		            </form>
        	<?php 	elseif ($indexes == "Yes" AND $logeado == "On") :
	            	echo '<div class="csesion"><li><i class="fa fa-user"></i> Usuario: '.$_SESSION['nombre'].'</li>';
	            	echo $arreglo2[0]."</li></div>";
	        ?>
	        <?php  	else :
	            	echo $arreglo1[0]."</li>";
	            	if ($_SESSION['privilegios'] == 1) :
	        ?>
		            	<form method="POST" action="../cliente/resultados">
			                <li><input type="text" name="Ced_cliente" placeholder="Busqueda por cédula" pattern="\d{6,8}"></li>
			                <div><li><button class="botonmenu" type="submit" name="button"><i class="fa fa-search"></i></button></li></div>
			            </form>
		    <?php
		    		endif;
	            	echo '<div class="csesion">
	            			<li><i class="fa fa-user"></i> Usuario: '.$_SESSION['nombre'].' '.$_SESSION['apellido'].'</li>';
	            	echo $arreglo2[0].'</li></div>';
			endif; ?>
		</ul>
	</nav>