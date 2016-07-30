<?php
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
              <input type="text" name="buscador" value="<?php if (isset($_POST['buscador'])) echo $_POST['buscador']; ?>" placeholder="Buscar producto" >
              <button class="botonmenu" type="submit" name="button"><i class="fa fa-search"></i> Buscar</button>
              </br>
              <input type='radio' name="opc" value="1" title="click aquí para seleccionar un método de busqueda" checked><label> Frase</label>
              <input type='radio' name="opc"  value="2" title="click aquí para seleccionar un método de busqueda" <?php if (isset($_POST['opc']) AND isset($_POST['buscador'])) if ($_POST['opc'] == 2 AND !empty($_POST['buscador'])) echo "checked"; ?>/><label> Por Nombre Completo</label>
          </div>  
      </form>
      <form method="POST" action="index">
        <?php
          extract($_POST);
          include_once '../../system/class.php';
          $objproducto = new producto();
          if (!empty($buscador)) {

            switch ($opc) {
              case 1:
                $result=$objproducto->buscadorlike($mysqli, $buscador);
                 $result = $result->fetch_array();
                  if (empty($result))
                      echo "No existe el producto buscado";
                  else {
                    echo "<table class='anapro'>
                      <tr>
                            <td>Nombre</td>
                            <td>Existencia</td>
                            <td>Precio</td>
                           <td><i class='fa fa-check-circle'></i></td>
                       </tr> ";
                 $result = $objproducto->buscadorlike($mysqli, $buscador);
                  while ($resultado = $result->fetch_array()) {


                    if($resultado[5]==1){ $unidad="c/u"; }
                    if($resultado[5]==2){ $unidad="mls"; }
                    if($resultado[5]==3){ $unidad="Lts"; }
                    if($resultado[5]==4){ $unidad="Galones"; }
                    if($resultado[5]==5){ $unidad="Gr"; }
                    if($resultado[5]==6){ $unidad="Kg"; }

                  echo "<tr>
                  <td>".$resultado[1]."</td>";
                  echo "<td>".$resultado[2]." ".$unidad."</td>";
                  echo "<td>".$resultado[3]." Bs"."</td>";
                  echo "<td><input type='checkbox' name='seleccion' title='click aquí para modificar este análisis' value='$resultado[0]'></td></tr>";
                  }
              echo "</table>";
              }
              break;
              case 2:

                        $resultado = $objproducto->consultar_produ($mysqli,$buscador);
                          if (empty($resultado))
                              echo "No existe el producto buscado";
                          else {

                              if($resultado[5]==1){ $unidad="c/u"; }
                              if($resultado[5]==2){ $unidad="mls"; }
                              if($resultado[5]==3){ $unidad="Lts"; }
                              if($resultado[5]==4){ $unidad="Galones"; }
                              if($resultado[5]==5){ $unidad="Gr"; }
                              if($resultado[5]==6){ $unidad="Kg"; }
                               echo "  <table class='anapro'>
                                  <tr>
                                        <td>Nombre</td>
                                        <td>Existencia</td>
                                        <td>Precio</td>
                                        <td><i class='fa fa-check-circle'></i></td>
                                   </tr> ";
                                   echo "<tr>
                          <td>".$resultado[1]."</td>";
                          echo "<td>".$resultado[2]." ".$unidad."</td>";
                          echo "<td>".$resultado[3]." Bs"."</td>";
                          echo "<td><input type='checkbox' name='seleccion' value='$resultado[0]'></td></tr>
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
                    
                    if($resultado[5]==1){ $unidad="c/u"; }
                    if($resultado[5]==2){ $unidad="mls"; }
                    if($resultado[5]==3){ $unidad="Lts"; }
                    if($resultado[5]==4){ $unidad="Galones"; }
                    if($resultado[5]==5){ $unidad="Gr"; }
                    if($resultado[5]==6){ $unidad="Kg"; }
                    
                    echo "<tr>
                    <td>".$resultado[1]."</td>";
                    echo "<td>".$resultado[2]." ".$unidad."</td>";
                    echo "<td>".$resultado[3]." Bs"."</td>";
                    echo "<td><input type='checkbox' name='seleccion' title='click aquí para modificar este análisis' value='$resultado[0]'></td></tr>";
                  }
                  echo "</table>";
                }
        ?>
        <div class="grupobotones">
             <button type="button" name="insertar" class="boton" onclick=location="index"><i class="fa fa-plus"></i> Nuevo Producto</button>
             <button type="submit" class="boton" name="modificar" value="modificar"><i class="fa fa-pencil"></i> Modificar Producto</button>
               <button type="submit" class="boton" name="modificar" value="eliminar"><i class='fa fa-trash-o'></i> Eliminar Producto</button>
             <button type='button' OnClick=location='../home/inicio' class="boton"><i class="fa fa-home"></i> Página principal</button>
        </div> 
      </form>
        <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>
