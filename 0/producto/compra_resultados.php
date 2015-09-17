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
        				<h1>Listado de productos a comprar</h1>
        			</hgroup>
        		</div>
      <form method="POST" action="compra_completa">
        <?php
          extract($_POST);
          include_once '../../system/class.php';
          $objproducto = new producto();
          $objcliente = new cliente();
          $ress = $objcliente->consultar_cliente($mysqli, $compra);
          $result = $objproducto->consulta_completo($mysqli);
          $i = 0; $total = 0;
          while ($resultado = $result->fetch_array()) :
            if (!empty($cantidad[$i])) :
              $total += ($resultado[3] * $cantidad[$i]);
            endif;
            $i++;
          endwhile;

          echo "
                <input type='hidden' name='total' value='$total' />
                <table class='anapro'>
                  <tr>
                    <td>Nombre del cliente</td>
                    <td>Cédula</td>
                    <td>Total</td>
                  </tr>
                  <tr>
                    <td>$ress[2] $ress[3]</td>
                    <td>$ress[1]</td>
                    <td>$total</td>
                  </tr> ";
          
          echo "<table class='anapro'>
                  <tr>
                    <td>Nombre</td>
                    <td>Existencia</td>
                    <td>Precio</td>
                    <td>Cantidad</td>
                   </tr> ";
          $result = $objproducto->consulta_completo($mysqli);
          $i = 0;
          while ($resultado = $result->fetch_array()) :
            if (empty($cantidad[$i])) :
              echo "<input type='hidden' name='cantidad[]' value='$cantidad[$i]' />";
            else :
              echo "<tr>
                      <td>".$resultado[1]."</td>";
                      echo "<td>".$resultado[2]."</td>";
                      echo "<td>".$resultado[3]."</td>";
                      echo "<td><input type='text' name='cantidad[]' size='5' pattern='\d{1,8}' maxlength='8' value='$cantidad[$i]' /></td>
                    </tr>";
            endif;
            $i++;
          endwhile;
          echo "</table>";
        ?>
        <div align="center">
          <button type='button' onclick=location='../../0/home/inicio' class="boton"><i class="fa fa-ban"></i> Cancelar</button>
          <button type="submit" formaction="compra_resultados" class="boton" name="compra" value="<?php if(isset($compra)) echo $compra; ?>"><i class="fa fa-pencil"></i> Actualizar compra</button>
          <button type="submit" formaction="compra_productos" class="boton" name="compra" value="<?php if(isset($compra)) echo $compra; ?>"><i class="fa fa-shopping-cart"></i> Agregar o eliminar productos</button>
          <button type="submit" name="comprado" value="<?php if(isset($compra)) echo $compra; ?>" class="boton"><i class="fa fa-check"></i> Confirmar compra</button>
        </div>
      </form>
        <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>
