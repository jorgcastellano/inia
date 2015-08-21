                
                <label for="Nom_fin">Nombre de la finca</label>
                    <input required type="text" name="Nom_fin" id="Nom_fin" value="<?php echo $reg2[2]?>" title="Introduzca el nombre de la finca" maxlength="30" placeholder=""  />
                       <span class="form_hint">Debe contener solo caracteres alfanumericos"</span><br />
                    </br>
                <label for="Estado">Estado</label>
                    <select required name="Estado" id="Estado">
                        <span class="form_hint">Por favor seleccione un elemento de esta lista"</span><br />
                        <option value="">Seleccione</option>
                        <option value="1" <?php if($reg2['3']==1){ echo 'selected'; } ?>>Amazonas</option>
                        <option value="2" <?php if($reg2['3']==2){ echo 'selected'; } ?>>Aragua</option>
                        <option value="3" <?php if($reg2['3']==3){ echo 'selected'; } ?>>Bolivar</option>
                        <option value="4" <?php if($reg2['3']==4){ echo 'selected'; } ?>>Falcon</option>
                        <option value="5" <?php if($reg2['3']==5){ echo 'selected'; } ?>>Merida</option>
                        <option value="6" <?php if($reg2['3']==6){ echo 'selected'; } ?>>Tachira</option>
                        <option value="7" <?php if($reg2['3']==7){ echo 'selected'; } ?>>Trujillo</option>
                    </select>
                    </br></br>
                <label  for="Municipio">Municipio</label>
                    <select required name="Municipio" id="Municipio">
                        <span class="form_hint">Por favor seleccione un elemento de esta lista"</span><br />
                        <option value="">Seleccione</option>
                        <option value="1" <?php if($reg2['4']==1){ echo 'selected'; } ?>>mun1</option>
                        <option value="2" <?php if($reg2['4']==2){ echo 'selected'; } ?>>mun2</option>
                        <option value="3" <?php if($reg2['4']==3){ echo 'selected'; } ?>>mun3</option>
                        <option value="4" <?php if($reg2['4']==4){ echo 'selected'; } ?>>mun4</option>
                        <option value="5" <?php if($reg2['4']==5){ echo 'selected'; } ?>>mun5</option>
                        <option value="6" <?php if($reg2['4']==6){ echo 'selected'; } ?>>mun6</option>
                        <option value="7" <?php if($reg2['4']==7){ echo 'selected'; } ?>>mun7</option>
                    </select>
                    </br></br>

                <label for="Direccion2">Direccion</label>
                    <textarea required name="Direccion2" id="Direccion2"  title="" cols="30" rows="5" maxlength="50" placeholder="Por Favor Especifique aqui la direccion del cliente"><?php echo $reg2[5]?></textarea>
                    
                    </br></br>