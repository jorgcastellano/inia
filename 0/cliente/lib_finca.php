
                <label for="Nom_fin">Nombre de la finca</label>
                <input required type="text" name="Nom_fin[]" id="Nom_fin" value="<?php echo $reg3[2]?>" title="Introduzca el nombre de la finca" maxlength="30" placeholder=""  />
                <span class="form_hint">Debe contener solo caracteres alfanumericos"</span>
                <br />

                <label for="Estado">Estado</label>

                    <select class="opcion4" required name="Estado[]" id="Estado">
                        <option value="">Seleccione</option>
                        <option value="Amazonas" <?php if($reg3[3]=="Amazonas"){ echo 'selected'; } ?>>Amazonas</option>
                        <option value="Anzoátegui" <?php if($reg3[3]=="Anzoátegui"){ echo 'selected'; } ?>>Anzoátegui</option>
                        <option value="Apure" <?php if($reg3[3]=="Apure"){ echo 'selected'; } ?>>Apure</option>
                        <option value="Aragua" <?php if($reg3[3]=="Aragua"){ echo 'selected'; } ?>>Aragua</option>
                        <option value="Barinas" <?php if($reg3[3]=="Barinas"){ echo 'selected'; } ?>>Barinas</option>
                        <option value="Bolívar" <?php if($reg3[3]=="Bolívar"){ echo 'selected'; } ?>>Bolívar</option>
                        <option value="Carabobo" <?php if($reg3[3]=="Carabobo"){ echo 'selected'; } ?>>Carabobo</option>
                        <option value="Cojedes" <?php if($reg3[3]=="Cojedes"){ echo 'selected'; } ?>>Cojedes</option>
                        <option value="Delta Amacuro" <?php if($reg3[3]=="Delta Amacuro"){ echo 'selected'; } ?>>Delta Amacuro</option>
                        <option value="Distrito Capital" <?php if($reg3[3]=="Distrito Capital"){ echo 'selected'; } ?>>Distrito Capital</option>
                        <option value="Falcon" <?php if($reg3[3]=="Falcon"){ echo 'selected'; } ?>>Falcon</option>
                        <option value="Guárico" <?php if($reg3[3]=="Guárico"){ echo 'selected'; } ?>>Guárico</option>
                        <option value="Lara" <?php if($reg3[3]=="Lara"){ echo 'selected'; } ?>>Lara</option>
                        <option value="Mérida" <?php if($reg3[3]=="Mérida"){ echo 'selected'; } ?>>Mérida</option>
                        <option value="Miranda" <?php if($reg3[3]=="Miranda"){ echo 'selected'; } ?>>Miranda</option>
                        <option value="Monagas" <?php if($reg3[3]=="Monagas"){ echo 'selected'; } ?>>Monagas</option>
                        <option value="Nueva Esparta" <?php if($reg3[3]=="Nueva Esparta"){ echo 'selected'; } ?>>Nueva Esparta</option>
                        <option value="Portuguesa" <?php if($reg3[3]=="Portuguesa"){ echo 'selected'; } ?>>Portuguesa</option>
                        <option value="Sucre" <?php if($reg3[3]=="Sucre"){ echo 'selected'; } ?>>Sucre</option>
                        <option value="Táchira" <?php if($reg3[3]=="Táchira"){ echo 'selected'; } ?>>Táchira</option>
                        <option value="Trujillo" <?php if($reg3[3]=="Trujillo"){ echo 'selected'; } ?>>Trujillo</option>
                        <option value="Vargas" <?php if($reg3[3]=="Vargas"){ echo 'selected'; } ?>>Vargas</option>
                        <option value="Yaracuy" <?php if($reg3[3]=="Yaracuy"){ echo 'selected'; } ?>>Yaracuy</option>
                        <option value="Zulia" <?php if($reg3[3]=="Zulia"){ echo 'selected'; } ?>>Zulia</option>
                    </select>
                    </br>
                <label for="Municipio">Municipio</label>
                <input type="text" required name="Municipio[]" id="Municipio" class="opcion4" value="<?php echo $reg3[4] ?>"><br>

                <label for="Direccion2">Parroquia</label>
                    <input type="text" required name="Parroquia[]" value="<?php echo $reg3[5] ?>" id="Direccion2"  title="" cols="30" rows="5" maxlength="60" />
                    </br>
