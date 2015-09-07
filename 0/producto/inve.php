<?php
    session_start();
    include_once '../../system/check.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Productos</title>
        <?php include '../../layouts/head.php' ?>
    </head>
    <body>
        <?php include '../../system/menu.php' ?>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php' ?>
			<hgroup>
				<h1>Listado de Productos</h1>
			</hgroup>
		</div>
               <form method="POST" action="inve">
                    <div class="buscadores">
                        <input type="text" name="buscador" value="<?php echo $_POST['buscador']; ?>" placeholder="Buscar producto" >
                        <button class="botonmenu" type="submit" name="button"><i class="fa fa-search"></i></button>
                        </br>
                        <input type='radio' name="opc" value='1' checked><label> Frase</label>
                        <input type='radio' name="opc"  value='2'<?php if ($_POST['opc'] == 2) echo "checked"; ?>/><label> Por Nombre Completo</label>
                    </div>  
                </form>
        <?php
            extract($_POST);
            include_once '../../system/class.php';
            $objproducto = new producto();
            
            if (!empty($buscador)) {

                switch ($opc) {
                    case 1:
                              $result=$objproducto->buscadorlike($mysqli, $buscador);
                                if (empty($result))
                                    echo "No existe el producto buscado";
                                else {
                                echo "  <table class='anapro'>
                                        <tr>
                                              <td>Nombre</td>
                                              <td>Existencia</td>
                                              <td>Precio</td>
                                             <td><i class='fa fa-check-circle'></i></td>
                                         </tr> ";
                               
                                while ($resultado = $result->fetch_array()) {
                                echo "<tr>
                                <td>".$resultado[1]."</td>";
                                echo "<td>".$resultado[2]."</td>";
                                echo "<td>".$resultado[3]."</td>";
                                echo "<td><input type='radio' name='seleccion' value='$resultado[0]'></td></tr>";
                                }
                     echo "</table>";
                      }
                        break;
                    case 2:

                              $resultado = $objproducto->consultar_produ($mysqli, $buscador);
                                if (empty($resultado))
                                    echo "No existe el producto buscado";
                                else {
                                     echo "  <table class='anapro'>
                                        <tr>
                                              <td>Nombre</td>
                                              <td>Existencia</td>
                                              <td>Precio</td>
                                              <td><i class='fa fa-check-circle'></i></td>
                                         </tr> ";
                                         echo "<tr>
                                <td>".$resultado[1]."</td>";
                                echo "<td>".$resultado[2]."</td>";
                                echo "<td>".$resultado[3]."</td>";
                                echo "<td><input type='radio' name='seleccion' value='$resultado[0]'></td></tr>
                                 </table>";
                                      }
                                break;
                                default:
                                echo "Uy! existe un error";
                                break;
                         }

                    } elseif (empty($buscador) OR !isset($buscador)) {
                        echo "<table class='anapro'>
                                        <tr>
                                              <td>Nombre</td>
                                              <td>Existencia</td>
                                              <td>Precio</td>
                                              <td><i class='fa fa-check-circle'></i></td>
                                         </tr> ";

                    $result = $objproducto->consulta_completo($mysqli);
                    while ($resultado = $result->fetch_array()) 
                    {
                            echo "<tr>
                            <td>".$resultado[1]."</td>";
                            echo "<td>".$resultado[2]."</td>";
                            echo "<td>".$resultado[3]."</td>";
                            echo "<td><input type='radio' name='seleccion' value='$resultado[0]'></td></tr>";
                    }
                    echo "</table>";
                    }
                ?>
        <br /><br />
        <button type="submit" name="Modificar" value="<?php echo seleccion?>" class="boton" >Modificar</button>
        <button type='button' OnClick=location='index' class="boton">Nuevo Producto</button>
        <button type='button' OnClick=location='../home/inicio' class="boton">Pagina Principal</button>
       
        <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>
