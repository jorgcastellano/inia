<!DOCTYPE html>
<html>
    <head>
        <title>Registro de muestras</title>
        <?php include '../../layouts/head.php'; ?>
        <script type="text/javascript">

function mostrarformulario(){
if (document.principal.formulario[0].checked == true) {

document.getElementById('primero').style.display='block';

} else {

document.getElementById('primero').style.display='none';
}

if (document.principal.formulario[1].checked == true) {

document.getElementById('segundo').style.display='block';

} else {

document.getElementById('segundo').style.display='none';
}


}


function mostrarReferencia(){
//Si la opcion con id Conocido_1 (dentro del documento > formulario con name fcontacto >     y a la vez dentro del array de Conocido) esta activada
if (document.fcontacto.Conocido[1].checked == true) {
//muestra (cambiando la propiedad display del estilo) el div con id 'desdeotro'
document.getElementById('desdeotro').style.display='block';
//por el contrario, si no esta seleccionada
} else {
//oculta el div con id 'desdeotro'
document.getElementById('desdeotro').style.display='none';
}

if (document.fcontacto.Conocido[0].checked == true) {
//muestra (cambiando la propiedad display del estilo) el div con id 'desdeotro'
document.getElementById('desdeeste').style.display='block';
//por el contrario, si no esta seleccionada
} else {
//oculta el div con id 'desdeotro'
document.getElementById('desdeeste').style.display='none';
}

}
</script>
    </head>
    <body>
        <?php include '../../system/menu.php'; ?>
        <section class="bloque">
            <div>
                <?php include '../../layouts/cabecera-body.php'; ?>
				<hgroup>
					<h1>Registrar Muestra</h1>
				</hgroup>
			</div>


            <form action="" method="" name="principal">

             <p>elige un formulario:<br />

            <input type="radio" name="formulario" value="primero" id="Conocido_0" onclick="mostrarformulario();" />primero
            <input type="radio" name="formulario" value="segundo" id="Conocido_1" onclick="mostrarformulario();" /> segundo
            </p>

            <div id="primero" style="display:none;">


            <?php $var=4; 

                echo $var;

            ?>


            <form action="" method="" name="fcontacto">

            <p>primer formulario:<br />

            <input type="radio" name="Conocido" value="Google" id="Conocido_0" onclick="mostrarReferencia();" /> Google
            <input type="radio" name="Conocido" value="Otros" id="Conocido_1" onclick="mostrarReferencia();" /> Otros
            </p>
                
                <div id="desdeotro" style="display:none;">
                <p>Referencia de la oferta:</p>
                <p><input type="text" name="otro" class="input" /></p>
                </div>

                <div id="desdeeste" style="display:none;">
                <p>Referencia de la oferta:</p>
                <p><input type="text" name="otro" value="desdeeste" class="input" /></p>
                </div>
            </form>
            </div>


            <div id="segundo" style="display:none;">

            <?php  

                echo $var;
            ?>
            <form action="" method="" name="fcontacto2">

            <p>segundo formulario:<br />

            <input type="radio" name="Conocido" value="Google" id="Conocido_0" onclick="mostrarReferencia();" /> Google
            <input type="radio" name="Conocido" value="Otros" id="Conocido_1" onclick="mostrarReferencia();" /> Otros
            </p>
                
                <div id="desdeotro" style="display:none;">
                <p>Referencia de la oferta:</p>
                <p><input type="text" name="otro" class="input" /></p>
                </div>

                <div id="desdeeste" style="display:none;">
                <p>Referencia de la oferta:</p>
                <p><input type="text" name="otro" value="desdeeste" class="input" /></p>
                </div>
            </form>

            </div>

            </form>

            
            <?php include '../../layouts/layout_p.php'; ?>
        </section>
    </body>
</html>