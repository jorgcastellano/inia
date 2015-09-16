
			<?php 

			
			foreach ($_POST['analisis'] as $id){ $Cod_ana=$id
			$sol = new solicitud_analisis();
       		$sol->registrar_solicitud_analisis($conex,$Id_sa,$Cod_sol,$Cod_ana,$Cod_suelo);
       		}

			?>