
                <label for="Nom_fin">Nombre de la finca</label>
                <input required type="text" name="Nom_fin[]" id="Nom_fin" value="<?php echo $reg3[2]?>" title="Introduzca el nombre de la finca" maxlength="30" placeholder=""  />
                <span class="form_hint">Debe contener solo caracteres alfanumericos"</span>
                <br />

                <label for="Estado">Estado</label>
                <select class="opcion4" required name="Estado[]" id="Estado">
                    <option value="">Seleccione</option>
                    <option onclick="municipio" value="Amazonas" <?php if($reg3[3]=="Amazonas"){ echo 'selected'; } ?>>Amazonas</option>
                    <option value="Aragua" <?php if($reg3[3]=="Aragua"){ echo 'selected'; } ?>>Aragua</option>
                    <option value="Bolívar" <?php if($reg3[3]=="Bolívar"){ echo 'selected'; } ?>>Bolívar</option>
                    <option value="Falcon" <?php if($reg3[3]=="Falcon"){ echo 'selected'; } ?>>Falcon</option>
                    <option value="Mérida" <?php if($reg3[3]=="Mérida"){ echo 'selected'; } ?>>Mérida</option>
                    <option value="Táchira" <?php if($reg3[3]=="Táchira"){ echo 'selected'; } ?>>Táchira</option>
                    <option value="Trujillo" <?php if($reg3[3]=="Trujillo"){ echo 'selected'; } ?>>Trujillo</option>
                </select>
                </br>

                <label for="Municipio">Municipio</label>
                <select class="opcion4" required name="Municipio[]" id="Municipio">
                    <option value="">Seleccione</option>
                    <option value="mun1" <?php if($reg3[4]=="mun1"){ echo 'selected'; } ?>>mun1</option>
                    <option value="mun2" <?php if($reg3[4]=="mun2"){ echo 'selected'; } ?>>mun2</option>
                    <option value="mun3" <?php if($reg3[4]=="mun3"){ echo 'selected'; } ?>>mun3</option>
                    <option value="mun4" <?php if($reg3[4]=="mun4"){ echo 'selected'; } ?>>mun4</option>
                    <option value="mun5" <?php if($reg3[4]=="mun5"){ echo 'selected'; } ?>>mun5</option>
                    <option value="mun6" <?php if($reg3[4]=="mun6"){ echo 'selected'; } ?>>mun6</option>
                    <option value="mun7" <?php if($reg3[4]=="mun7"){ echo 'selected'; } ?>>mun7</option>
                </select>
                </br>

                <label for="Direccion2">Parroquia</label>
                    <input type="text" required name="Parroquia[]" value="<?php echo $reg3[5] ?>" id="Direccion2"  title="" cols="30" rows="5" maxlength="60" />
                    </br>
