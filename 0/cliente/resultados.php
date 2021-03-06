<?php
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Buscar Cliente</title>
        <?php include_once '../../layouts/head.php' ?>
    </head>
    <body>
      <?php include_once '../../system/menu.php' ?>
      <section class="bloque">
        <div>
          <?php include_once '../../layouts/cabecera-body.php' ?>
  				<hgroup>
  					<h1>Ficha del cliente</h1>
  				</hgroup>
  			</div>
        <?php
          extract($_POST);
          require '../../system/class.php';

            if ($_SESSION['privilegios'] == 1) :
              if(isset($RegistrarM)) :

                $fin = new finca();
                $fin->registrar_finca($mysqli,$Ced_cliente,$Nom_fin[0],$Estado[0],$Municipio[0],$Parroquia[0]);
              endif;
            endif;

                if (isset($_GET['Ced_cliente']))
                    $Ced_cliente = $_GET['Ced_cliente'];

                if (isset($eliminar)) :
                    $finca = new finca();
                    $finca->eliminar($mysqli, $eliminar);
                    $Ced_cliente = $ccliente;
                ?>
                    <script type="text/javascript">
                        alert("Se ah eliminado la finca con éxito");
                    </script>
                <?php
                    //header("location: resultados?Ced_cliente=".$ccliente);
                endif;

                $client = new cliente();

                if (isset($Registrar)) :
                    $client->registrar_cliente($mysqli,$Ced_cliente,$Nom_cliente,$Apelli_cliente,$Contacto,$Telf_cliente,$Dire_cliente,$tipoUsuario, $tipoOrg, $naturalidad);
                    if ($_SESSION['privilegios'] == 1) :
                        $fin = new finca();
                        $fin->registrar_finca($mysqli,$Ced_cliente,$Nom_fin[0],$Estado[0],$Municipio[0],$Parroquia[0]);
                    endif;
                endif;

                if (isset($Actualizar)) :

                    $Id_cliente=$Actualizar;

                    $client->modificar_cliente($mysqli,$Id_cliente,$Ced_cliente,$Nom_cliente,$Apelli_cliente,$Contacto,$Telf_cliente,$Dire_cliente,$tipoUsuario, $tipoOrg);
                    if ($_SESSION['privilegios'] == 1) :
                        $fin = new finca();
                        $nume = count($Nom_fin);
                        for ($i=0; $i<$nume; $i++) :
                            $fin->modificar_finca($mysqli,$Ced_cliente, $cod_finca[$i], $Nom_fin[$i],$Estado[$i],$Municipio[$i],$Parroquia[$i]);
                        endfor;
                    endif;
                endif;

                $reg = $client->consultar_cliente($mysqli,$Ced_cliente);

                if (empty($reg)) :
                  ?>
                  <script type="text/javascript">
                    window.location="index.php?var1=<?php echo $Ced_cliente ?>";
                  </script>
                  <?php

                else : ?>

                    <form class="" method="post" action="index"  id="" onsubmit="return enviar_form_accion();">
                        <table class="tcliente">
                            <tr>
                                <td  colspan="2"><i class="fa fa-user"></i> Datos del cliente</td>
                            </tr>
                            <tr>
                                <td><b >Cédula de identidad:</b></td>
                                <td><?php echo $reg[7]."-".$reg[1]; ?></td>
                            </tr>
                            <tr>
                                <td><b>Nombres:</b></td>
                                <td><?php echo $reg[2]?></td>
                            </tr>
                            <tr>
                                <td><b>Apellidos:</b></td>
                                <td><?php echo $reg[3]?></td>
                            </tr>
                            <tr>
                                <td><b>Referido por:</b></td>
                                <td><?php echo $reg[4]?></td>
                            </tr>
                            <tr>
                                <td><b>Teléfono:</b></td>
                                <td><?php echo $reg[5]?></td>
                            </tr>
                            <tr>
                                <td><b>Domicilio:</b></td>
                                <td><?php echo $reg[6]?></td>
                            </tr>
                            <?php

                              if ($reg[8] == 1)
                                $tUsuario = "Productor";

                             ?>
                            <tr>
                              <td><b>Tipo de usuario:</b></td>
                              <td><?php echo $tUsuario; ?></td>
                            </tr>
                            <?php

                              if($reg[9] == 1)
                                $organizacion = "Productor independiente";
                              else if($reg[9] == 2)
                                $organizacion = "Empresas públicas";
                              else if($reg[9] == 3)
                                $organizacion = "Empresas privadas";
                              else if($reg[9] == 4)
                                $organizacion = "Cooperativas";
                              else if($reg[9] == 5)
                                $organizacion = "Organismos bases";
                              else if($reg[9] == 6)
                                $organizacion = "Instituciones educativas";
                              else if($reg[9] == 7)
                                $organizacion = "Universidades";
                              else
                                $organizacion = "Otros";

                            ?>
                            <tr>
                              <td><b>Tipo de organización:</b></td>
                              <td><?php echo $organizacion; ?></td>
                            </tr>
                        </table>
                        <?php
                            if ($_SESSION['privilegios'] == 1) :
                            $fin = new finca();
                            $reg3 = $fin->consultar_finca_all($mysqli,$Ced_cliente);
                            $i = 1;
                            $contador = 0;
                            while ($reg2 = $reg3->fetch_array()) :
                        ?>
                                <table class="tcliente">
                                    <tr>
                                        <td colspan="2"><i class="fa fa-file-text"></i> Datos de la finca <?php echo "$i"; ?></td>
                                        <td><button id="<?php echo $contador; ?>" onclick="cambio_eliminar(<?php echo $contador; ?>)" type="submit" formaction="resultados" class="sinboton" name="eliminar" value="<?php echo $reg2[0] ?>" ><i class='fa fa-times'></i></button></td>
                                    </tr>
                                    <tr>
                                        <td><b>Nombre de la finca:</b></td>
                                        <td colspan="2"><?php echo $reg2[2]?>
                                        <input type="hidden" name="ccliente" value="<?php echo $reg2[1] ?>"> </td>
        					        </tr>
                                    <tr>
                                        <td colspan="3" id="center"><b>DIRECCIÓN DE LA FINCA</b></td>
                                    </tr>
                                    <tr>
        						       <td><b>Estado:</b></td>
        						       <td colspan="2"><?php echo $reg2[3]?></td>
        					        </tr>
                                    <tr>
        						       <td><b>Municipio:</b></td>
        						       <td colspan="2"><?php echo $reg2[4]?></td>
        					        </tr>
                                    <tr>
        						       <td><b>Parroquia:</b></td>
        						       <td colspan="2"><?php echo $reg2[5]?></td>
        					        </tr>
                                </table>
                        <?php
                                $i++;
                                $contador++;
                            endwhile;
                        endif; ?>
                        <div class="grupobotones">
                            <input type="hidden" name="Ced_cliente" value="<?php echo $Ced_cliente; ?>" />

                            <button type="submit" name="Modificar" value="<?php echo $reg[1]?>" class="boton" ><i class="fa fa-pencil-square-o"></i> Actualizar datos</button>
                            <?php if ($_SESSION['privilegios'] == 1) : ?>
                                <button type="submit" formaction="finca" name="Finca" value="<?php echo $reg[1]?>" class="boton" ><i class="fa fa-plus"></i> Agregar Finca</button>
                                <button type="submit" formaction="../muestra/index" name="RegistrarM" value="Inicio" class="boton" ><i class="fa fa-file-text-o"></i> Nueva solicitud</button>
                                <button type="submit" formaction="informes" name="informes" value="<?php if (isset($reg)) echo $reg[1]; ?>" class="boton" ><i class="fa fa-file-text-o"></i> Informes</button>
                            <?php elseif ($_SESSION['privilegios'] == 3) : ?>
                                <button type="submit" formaction="../../0/producto/compra_productos" name="compra" value="<?php if (isset($reg)) echo $reg[1]; ?>" class="boton" ><i class="fa fa-shopping-cart"></i> Compra de productos</button>
                            <?php endif; ?>
                        </div>
                    </form>
                <?php  endif;
                include_once '../../layouts/layout_p.php'; ?>
        </section>
        <script type="text/javascript">
          iniciar_act_eliminar(<?php echo $contador ?>);
        </script>
    </body>
</html>
