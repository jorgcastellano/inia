<?php
    include_once '../../system/check.php';
    extract($_POST);
    if(isset($button)) {
      if($privilegioAdmin == "gerente")
        $_SESSION['privilegios'] = 1;
      else if($privilegioAdmin == "lab") {
        $_SESSION['privilegios'] = 2;
        $_SESSION['jefe'] = 1;
        if($labSelected == 1)
          $_SESSION['tipoLab'] = 1;
        else
          $_SESSION['tipoLab'] = 2;
      } else
        $_SESSION['privilegios'] = 3;
      header('location: inicio');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sistema interno de gestión de productos y servicios - INIA Mérida</title>
        <?php include '../../layouts/head.php' ?>
    </head>
    <body>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php' ?>
                <hgroup>
                    <h1>Lista de privilegios</h1>
                </hgroup>
            </div>

            <div class="" style="text-align: center">
              <form class="contact_form" action="seleccionar_privilegio" method="post">

                <p style="text-align: center">Seleccione el privilegio con el que desea entrar</p>
                <select required class="opcion4" name="privilegioAdmin" onchange="activarLab(this);">
                  <option value=""> - - Seleccione - - </option>
                  <option value="gerente">Gerente del sistema</option>
                  <option value="lab">Laboratorio</option>
                  <option value="caja">Caja</option>
                </select><br>
                <center>
                  <select class="opcion4" name="labSelected" id ="laboratorioSelect" style="display:none; text-align: center">
                    <option value=""> - - Seleccione - - </option>
                    <option value="1">Fitopatología</option>
                    <option value="2">Suelo</option>
                  </select>
                </center>
                <button type="submit" name="button" class="boton">Ingresar <i class="fa fa-arrow-right"></i></button>

              </form>
            </div>

            <?php include '../../layouts/layout_p.php' ?>
        </section>
        <script type="text/javascript">
          function activarLab(sel) {
            var laboratorioSelect = document.getElementById('laboratorioSelect');
            if(sel.value == "lab") {
              laboratorioSelect.style.display="block";
              laboratorioSelect.required="required";
            }
            else {
              laboratorioSelect.style.display="none";
              laboratorioSelect.required=false;
            }
          }
        </script>
    </body>
</html>
