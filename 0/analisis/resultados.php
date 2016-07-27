<?php
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Analisis</title>
        <?php include '../../layouts/head.php' ?>
    </head>
    <body>
        <?php include '../../system/menu.php' ?>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php' ?>
                <hgroup>
                    <h1>Analisis</h1>
                </hgroup>
            </div>

            <?php
             
                extract($_POST);
                //verificamos si se desea modidficar un analisis
                 if (isset($_POST['modificar'])) :
                $Cod_ana=$modificar;
                require_once '../../system/class.php';
                $ana = new analisis();
                $ana->modificar_analisis($mysqli,$Cod_ana,$Nom_ana,$Precio_ana,$Tipo);
                if($mysqli->affected_rows>0){ echo "<span class='notify'><i class='fa fa-check-square'></i>El nuevo analisis se ha modificar con exito</span> ";} 
                    else { echo "<span class='notify_f'><i class='fa fa-times'></i>No se ha podido modificar el nuevo analisis</span> ";}
                $reg=$ana->consultar_analisis($mysqli,$Cod_ana);
                endif;
                //verificamos si se desea registrar un nuevo analisis
                require_once '../../system/class.php';
                $ana = new analisis();  
                if (isset($submit)) :
                    $ana -> registrar_analisis($mysqli,$Nom_ana,$Precio_ana,$Tipo);
                    $reg=$ana->consultar_analisis_Cod($mysqli, $Tipo);
                endif;


            ?>
            <!--mostrar resultados de la modificacion o el registro del analisis-->
            <form method="post" action="formulario">
                <table class="anapro">
                    <tr>
                        <td>Nombre del análisis</td>
                        <td>Precio</td>
                        <td>Laboratorio</td>
                    </tr>
                    <tr>
                        <td><?php echo $reg[1]?></td>
                        <td><?php echo $reg[2]?></td>
                        <td><?php echo $reg[3]?></td>
                    </tr>
                </table>
                <div class="grupobotones">
                    <button type="button" name="insertar" class="boton" onclick=location="formulario"><i class="fa fa-plus"></i> Nuevo análisis</button>
                    <button type="submit" name="ana" value="<?php echo $reg[0]?>" class="boton"><i class="fa fa-pencil"></i> Modificar</button>
                    <button type='button' OnClick=location='index' class="boton"><i class="fa fa-list-alt"></i> Listado de análisis</button>
                </div>
            </form>
             <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>