<!DOCTYPE html>
<html>
    <head>
        <title>Registrar Muestra de suelo</title>
        <?php include 'layouts/head.php' ?>
    </head>
    <body>
        <?php include 'layouts/navegacion.php'; ?>
        <section class="bloque">
            <div>
                <?php include 'layouts/logo.php'; ?>
				<hgroup>
					<h1>Registrar Muestra de suelo</h1>
				</hgroup>
			</div>


<?php

		
		extract($_POST);

		include_once '../includes/conexion_bd.php';

		
		$sql='SELECT * FROM analisis';
		$res2= $conex->query($sql);

		require_once './system/class.php';



			for ($i=0;$i<count($Cod_lab);$i++) { $Cod_lab=$Cod_lab[$i];  }
			
			for ($i=0;$i<count($Carac_terreno);$i++) { $Carac_terreno=$Carac_terreno[$i]; }

			for ($i=0;$i<count($Dia);$i++){ $Dia=$Dia[$i]; }
			for ($i=0;$i<count($Mes);$i++){ $Mes=$Mes[$i]; }
			for ($i=0;$i<count($Ano);$i++){ $Ano=$Ano[$i]; }
				$g = '-';
				$F_toma = $Dia.$g.$Mes.$g.$Ano;		

			$fertil = '';
			$s = '|';
			foreach ($_POST['Fertilizante'] as $id){  if($fertil == ''){ $fertil =$id; }else{ $fertil .= $s.$id; } }


			$suelo = new suelo();
       		$suelo->registrar_suelo($conex,$Cod_suelo,$Cod_lab,$Cod_rsuelo,$Tam_lote,$Profundidad,$Carac_terreno,$Inundacion,$Riego,$Criego,$F_toma,$T_vege,$Cultivo,$Edad_cult,$Dis_siembra,$Nro_pl,$Cult_antes,$Rend_cult,$Restos,$fertil,$Fert_cantidad,$Epoca_aplic,$Aplicacion);
   
       		
        
   

?>
                <form class="contact_form" action="insert9.php" method="post">
                    </br>
					<label for="analisis" title=""><b>Analisis disponibles</b></label></br></br>
						<?php while ($reg2 = $res2->fetch_array(MYSQLI_ASSOC)) { ?>
							<input type="checkbox" name="analisis[]" value="<?php echo $reg2['Cod_ana']; ?>"/><?php echo $reg2['Nom_ana']; ?>
						<?php } ?>

                        </br></br>
                        <button  type="reset" name="reset" class="boton">Limpiar</button>
                        <button class="boton" type="submit" name="submit">Siguiente –></button> 

                </form>



                <?php include 'layouts/layout_p.php'; ?>
        </section>
    </body>
</html>