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
        				<h1>Listado de productos</h1>
        			</hgroup>
        		</div>
      <form method="POST" action="compra_resultados">
        <?php
          extract($_POST);
          include_once '../../system/class.php';
          $objproducto = new producto();
          
          echo "<table class='anapro'>
                  <tr>
                    <td>NOMBRE</td>
                    <td>EXISTENCIA</td>
                    <td>PRECIO</td>
                    <td>CANTIDAD</td>
                   </tr> ";
          $result = $objproducto->consulta_completo($mysqli);
          $i = 0;
          while ($resultado = $result->fetch_array()) :
            if (!empty($resultado[2])) :
              echo "<tr>
              <td>".$resultado[1]."</td>";
              echo "<td>".$resultado[2]."</td>";
              echo "<td>".$resultado[3]."</td>";
              echo "<td><input type='text' name='cantidad[]' size='5' pattern='\d{1,8}' maxlength='8' value='$cantidad[$i]' /></td></tr>";
            endif;
            $i++;
          endwhile;
          echo "</table>";
        ?>
        <div align="center">
          <button type='button' onclick=location='../../0/home/inicio' class="boton"><i class="fa fa-ban"></i> Página principal</button>
          <button type="submit" name="compra" value="<?php if(isset($compra)) echo $compra; ?>" class="boton" formaction="compra_resultados"><i class="fa fa-shopping-cart"></i> Procesar compra</button>
        </div> 
      </form>
        <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>
