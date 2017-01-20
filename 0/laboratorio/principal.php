

      <?php
          extract($_POST);
          require_once '../../system/class.php';
          require_once '../../system/classesp.php';
      ?>
	        <form action="index" method="post">
            <div style="text-align: center; margin-top: 20px">
              <select  name="listado" onchange="mostrarformulario(this);" class="opcion4">
                <option value="">Seleccione listado de muestras</option>
                <option value="1">Nuevas muestras</option>
                <option value="2">Nuevos Resultados</option>
              </select>
            </div>

          </form>
              <div id='primero' style='display:none;'>
                <?php
                include 'lib_asig_especialista.php' ?>
              </div>

              <div id='segundo' style='display:none;'>
                <?php  //include 'lib_asig_recomendador.php';?>
              </div>

           <?php include '../../layouts/layout_p.php' ?>
        </section>
        <script type="text/javascript">
          //scrip de selección que determina cual formulario se desea cargar
          function mostrarformulario(x){
            if(x.value==1){
              document.getElementById('primero').style.display="block";
              document.getElementById('segundo').style.display="none";
            } else {
              document.getElementById('segundo').style.display="block";
              document.getElementById('primero').style.display="none";
            }
          }
        </script>
