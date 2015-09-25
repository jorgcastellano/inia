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
                    <h1>Listado de clientes</h1>
                </hgroup>
            </div>

            <?php
            
            echo " <form method='POST' action='../../0/caja/clientes'>
                <div class='buscadores'>
                <input type='text' name='buscador' placeholder='Buscar cliente por cédula' />
                <button class='botonmenu' type='submit' name='button'><i class='fa fa-search'></i> Buscar</button>
                </div></form>";

            extract($_POST);
            include_once '../../system/class.php';
            $objcliente= new cliente();

            if (!empty($buscador)) {
                $reg = $objcliente->consultar_cliente($mysqli,$buscador);
            
    
            echo "

                <table>
                    <tr>
                        <td>CEDULA</td>
                        <td>NOMBRES y APELLIDOS</td>
                        <td>DIRECCIÓN</td>
                    </tr>
            

                    <tr>
                        <td>$reg[1]</td>
                        <td>$reg[2] $reg[3]</td>
                        <td>$reg[6]</td>
                    </tr>
                   
                </table>

            ";}else{   

            $registro=0;
            $limite=50;
            $res=$objcliente->consultar_clientes($mysqli,$registro,$limite);

            echo "

                <table>
                    <tr>
                        <td>CEDULA</td>
                        <td>NOMBRES y APELLIDOS</td>
                        <td>DIRECCIÓN</td>
                    </tr>
            ";
            while($resultado = $res->fetch_array()){

            echo"

                    <tr>
                        <td>$resultado[1]</td>
                        <td>$resultado[2] $resultado[3]</td>
                        <td>$resultado[6]</td>
                    </tr>
                    ";
            }  


            echo"

                </table>

            "; }     

            ?>


            <?php include '../../layouts/layout_p.php' ?>
        </section>
    </body>
</html>