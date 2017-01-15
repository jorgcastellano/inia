            <?php
                extract($_POST);
                if (isset($submit)) :
                    require_once '../../system/class.php';
                    $iva = new  iva();
                    $iva -> insertar_iva($mysqli,$nuevoiva,$Dia,$Mes,$Ano,$reten);
                    endif;
            ?>
            <script type="text/javascript">
                alert("IVA actualizado con éxito");
                window.location="../home/inicio";
            </script>