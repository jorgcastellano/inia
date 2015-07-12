<!DOCTYPE html>
<html>
    <head>
        <title>Registrar Finca</title>
        <?php include 'layouts/head.php'; ?>
    </head>
    <body>
        <?php include 'layouts/navegacion.php'; ?>
        <section class="bloque">
            <div>
                <?php include 'layouts/logo.php'; ?>
				<hgroup>
					<h1>Registrar Finca</h1>
				</hgroup>
			</div>

            <form class="contact_form" method="post" action="insert6.php"  id="">
                
                <label for="Ced_cliente">Cedula del cliente</label>
                    <input required type="num" name="Ced_cliente" id="Ced_cliente" title="Introduzca la cedula " maxlength="8" placeholder="" pattern="\d{6,}" />
                    </br>
                <label for="Nom_fin">Nombre de la finca</label>
                    <input required type="text" name="Nom_fin" id="Nom_fin" title="Introdusca el nombre de la finca" maxlength="30" placeholder=""  />
                    </br>
                <label for="Estado">Estado</label>
                    <select required name="Estado[]" id="Estado">
                        <option value="">Seleccione</option>
                        <option value="1">Amazonas</option>
                        <option value="2">Aragua</option>
                        <option value="3">Bolivar</option>
                        <option value="4">Falcon</option>
                        <option value="5">Merida</option>
                        <option value="6">Tachira</option>
                        <option value="7">Trujillo</option>
                    </select>
                    </br></br>
                <label  for="Municipio">Municipio</label>
                    <select required name="Municipio[]" id="Municipio">
                        <option value="">Seleccione</option>
                        <option value="1">mun1</option>
                        <option value="2">mun2</option>
                        <option value="3">mun3</option>
                        <option value="4">mun4</option>
                        <option value="5">mun5</option>
                        <option value="6">mun6</option>
                        <option value="7">mun7</option>
                    </select>
                    </br></br>

                <label for="Direccion">Direccion</label>
                    <textarea required name="Direccion" id="Direccion" title="" cols="30" rows="5" maxlength="50" placeholder="Por Favor Especifique aqui la direccion del cliente"></textarea>
                    </br></br>

                    <input type="hidden" name="tipo" value="2" />
                    <button type="reset" class="boton" name="reset">Limpiar formulario</button>
                    <button type="submit" name="submit" class="boton" >Registrar finca</button>
            </form>


                <?php include 'layouts/layout_p.php'; ?>
        </section>
    </body>
</html>