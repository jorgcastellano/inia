<?php
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sistema interno de gestión de productos y servicios - INIA Mérida</title>
        <?php include '../../layouts/head.php' ?>
    </head>
    <body>
        <?php include '../../system/menu.php' ?>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php' ?>
                <hgroup>
                  <h1>Sistema de Procesos Internos del INIA Mérida (SPIIM)</h1>
                </hgroup>
            </div>
           
           <?php
                if(isset($update)){

                    extract($_POST);

                   $objiva = new ayudante();
                   $objiva -> actualizar_iva($mysqli,$iva);
                }

           ?>
                
            <form  class="contact_form" method="post" action="iva">
                <label for="ivactual"> IVA actual </label>
                <input type="num" name="ivactual" id="ivactual" value="<?php ?>" title="IVA actual " maxlength="5" disabled/>
                </br>
                <label for="nuevoiva"> Nuevo IVA </label>
                <input required type="num" name="nuevoiva" id="nuevoivsa" value="" title="Introduzca el nuevo iva" maxlength="5" />
                </br>
                <label for="nuevoiva2"> Confirme el IVA</label>
                <input required type="num" name="nuevoiva2" id="nuevoivsa2" value="" title="Confirme el nuevo iva" maxlength="5" />
                </br>
                <label for="F_toma">Fecha de activacion</label>
                            <select name="Dia" title="Dia">
                                <option value="">Día</option>
                                <?php for($i=01;$i<32;$i++) { ?>
                                    <option value="<?php if(strlen($i) < 2){ echo  "0"; echo $i; } else {echo $i; } ?>"<?php if($fecha[0]==$i){ echo 'selected'; } ?>><?php if(strlen($i) < 2){ echo  "0"; echo $i; } else {echo $i; } ?></option>
                                <?php } ?>
                            </select>
                            <select name="Mes" title="Mes">
                                <option value="">Mes</option>
                                <?php for($i=01;$i<13;$i++) { ?>
                                    <option value="<?php if(strlen($i) < 2){ echo  "0"; echo $i; } else {echo $i; } ?>"<?php if($fecha[1]==$i){ echo 'selected'; } ?>><?php if(strlen($i) < 2){ echo  "0"; echo $i; } else {echo $i; } ?></option>
                                <?php } ?>
                            </select>
                            <select name="Ano" title="Año">
                                <option value="">Año</option>
                                <?php for($i=1990;$i<2051;$i++) { ?>
                                    <option value="<?php echo $i; ?>"<?php if($fecha[2]==$i){ echo 'selected'; } ?>><?php echo $i; ?></option>
                                <?php } ?>
                            </select>              




                <div align="center">
                    <button name="atras" type="button" onclick=location="inve" class="boton"><i class="fa fa-arrow-left"></i> Ir al Inventario</button>
                    <button  type="reset" name="reset" class="boton"><i class="fa fa-eraser"></i> Limpiar</button>
                    <?php if (isset($_POST['seleccion']) OR isset($_POST['pro']) OR isset($_POST['Modificar1'])) : ?>
                        <button class="boton" type="submit" name="modificar" value="<?php if(isset($reg)) echo $reg[0] ?>" formaction="resultado"><i class="fa fa-check"></i> Guardar cambios</button> 
                        <?php else : ?>
                        <button class="boton" type="submit" name="update"><i class="fa fa-check"></i> Guardar</button> 
                    <?php endif; ?>
                </div>
            </form>
            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>