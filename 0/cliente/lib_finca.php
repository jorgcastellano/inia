                
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
                    <select class="opcion4" required name="Municipio[]" id="Municipio">
                        <option value="">Seleccione</option>
                        <option value="Atures" <?php if($reg3[4]=="Atures"){ echo 'selected'; } ?>>Atures</option>
                        <option value="Atabapo" <?php if($reg3[4]=="Atabapo"){ echo 'selected'; } ?>>Atabapo</option>
                        <option value="Maroa" <?php if($reg3[4]=="Maroa"){ echo 'selected'; } ?>>Maroa</option>
                        <option value="Río Negro" <?php if($reg3[4]=="Río Negro"){ echo 'selected'; } ?>>Río Negro</option>
                        <option value="Manapiare" <?php if($reg3[4]=="Manapiare"){ echo 'selected'; } ?>>Manapiare</option>
                        <option value="Alto Orinoco" <?php if($reg3[4]=="Alto Orinoco"){ echo 'selected'; } ?>>Alto Orinoco</option>
                        <option value="Autana" <?php if($reg3[4]=="Autana"){ echo 'selected'; } ?>>Autana</option>
                    </select>
                    </br>

                      <select class="opcion4" required name="Municipio[]" id="Municipio">
                        <option value="">Seleccione Anzoátegui</option>
                        <option value="Anaco" <?php if($reg3[4]=="Anaco"){ echo 'selected'; } ?>>Anaco</option>
                        <option value="Aragua" <?php if($reg3[4]=="Aragua"){ echo 'selected'; } ?>>Aragua</option>
                        <option value="Bolívar" <?php if($reg3[4]=="Bolívar"){ echo 'selected'; } ?>>Bolívar</option>
                        <option value="Bruzual" <?php if($reg3[4]=="Bruzual"){ echo 'selected'; } ?>>Bruzual</option>
                        <option value="Carvajal" <?php if($reg3[4]=="Carvajal"){ echo 'selected'; } ?>>Carvajal</option>
                        <option value="Cajigal" <?php if($reg3[4]=="Cajigal"){ echo 'selected'; } ?>>Cajigal</option>
                        <option value="Autana" <?php if($reg3[4]=="Autana"){ echo 'selected'; } ?>>Autana</option>
                        <option value="Diego Bautista Urbaneja" <?php if($reg3[4]=="Diego Bautista Urbaneja"){ echo 'selected'; } ?>>Diego Bautista Urbaneja</option>
                        <option value="Freites" <?php if($reg3[4]=="Freites"){ echo 'selected'; } ?>>Freites</option>
                        <option value="Guanta" <?php if($reg3[4]=="Guanta"){ echo 'selected'; } ?>>Guanta</option>
                        <option value="Guanipa" <?php if($reg3[4]=="Guanipa"){ echo 'selected'; } ?>>Guanipa</option>
                        <option value="Independencia" <?php if($reg3[4]=="Independencia"){ echo 'selected'; } ?>>Independencia</option>
                        <option value="Libertad" <?php if($reg3[4]=="Libertad"){ echo 'selected'; } ?>>Libertad</option>
                        <option value="McGregor" <?php if($reg3[4]=="McGregor"){ echo 'selected'; } ?>>McGregor</option>
                        <option value="Miranda" <?php if($reg3[4]=="Miranda"){ echo 'selected'; } ?>>Miranda</option>
                        <option value="Monagas" <?php if($reg3[4]=="Monagas"){ echo 'selected'; } ?>>Monagas</option>
                        <option value="Peñalver" <?php if($reg3[4]=="Peñalver"){ echo 'selected'; } ?>>Peñalver</option>
                        <option value="Píritu" <?php if($reg3[4]=="Píritu"){ echo 'selected'; } ?>>Píritu</option>
                        <option value="San Juan de Capistrano" <?php if($reg3[4]=="San Juan de Capistrano"){ echo 'selected'; } ?>>San Juan de Capistrano</option>
                        <option value="Santa Ana" <?php if($reg3[4]=="Santa Ana"){ echo 'selected'; } ?>>Santa Ana</option>
                    </select>
                    </br>

                    <select class="opcion4" required name="Municipio[]" id="Municipio">
                        <option value="">Seleccione Apure</option>
                        <option value="Achaguas" <?php if($reg3[4]=="Achaguas"){ echo 'selected'; } ?>>Achaguas</option>
                        <option value="Biruaca" <?php if($reg3[4]=="Biruaca"){ echo 'selected'; } ?>>Biruaca</option>
                        <option value="Muñoz" <?php if($reg3[4]=="Muñoz"){ echo 'selected'; } ?>>Muñoz</option>
                        <option value="Páez" <?php if($reg3[4]=="Páez"){ echo 'selected'; } ?>>Páez</option>
                        <option value="Pedro Camejo" <?php if($reg3[4]=="Pedro Camejo"){ echo 'selected'; } ?>>Pedro Camejo</option>
                        <option value="Rómulo Gallegos" <?php if($reg3[4]=="Rómulo Gallegos"){ echo 'selected'; } ?>>Rómulo Gallegos</option>
                        <option value="San Fernando" <?php if($reg3[4]=="San Fernando"){ echo 'selected'; } ?>>San Fernando</option>
                    </select>
                    </br>

                    <select class="opcion4" required name="Municipio[]" id="Municipio">
                        <option value="">Seleccione Aragua</option>
                        <option value="Bolívar" <?php if($reg3[4]=="Bolívar"){ echo 'selected'; } ?>>Bolívar</option>
                        <option value="Camatagua" <?php if($reg3[4]=="Camatagua"){ echo 'selected'; } ?>>Camatagua</option>
                        <option value="Francisco Linares Alcántara" <?php if($reg3[4]=="Francisco Linares Alcántara"){ echo 'selected'; } ?>>Francisco Linares Alcántara</option>
                        <option value="Girardot" <?php if($reg3[4]=="Girardot"){ echo 'selected'; } ?>>Girardot</option>
                        <option value="José Angel Lamas" <?php if($reg3[4]=="José Angel Lamas"){ echo 'selected'; } ?>>José Angel Lamas</option>
                        <option value="José Félix Ribas" <?php if($reg3[4]=="José Félix Ribas"){ echo 'selected'; } ?>>José Félix Ribas</option>
                        <option value="José Rafael Revenga" <?php if($reg3[4]=="José Rafael Revenga"){ echo 'selected'; } ?>>José Rafael Revenga</option>
                        <option value="Libertador" <?php if($reg3[4]=="Libertador"){ echo 'selected'; } ?>>Libertador</option>
                        <option value="Mario Briceño Iragorry" <?php if($reg3[4]=="Mario Briceño Iragorry"){ echo 'selected'; } ?>>Mario Briceño Iragorry</option>
                        <option value="Ocumare de La Costa de Oro" <?php if($reg3[4]=="Ocumare de La Costa de Oro"){ echo 'selected'; } ?>>Ocumare de La Costa de Oro</option>
                        <option value="San Casimiro" <?php if($reg3[4]=="San Casimiro"){ echo 'selected'; } ?>>San Casimiro</option>
                        <option value="San Sebastián" <?php if($reg3[4]=="San Sebastián"){ echo 'selected'; } ?>>San Sebastián</option>
                        <option value="Santiago Mariño" <?php if($reg3[4]=="Santiago Mariño"){ echo 'selected'; } ?>>Santiago Mariño</option>
                        <option value="Santos Michelena" <?php if($reg3[4]=="Santiago Mariño"){ echo 'selected'; } ?>>Santiago Mariño</option>
                        <option value="Sucre" <?php if($reg3[4]=="Sucre"){ echo 'selected'; } ?>>Sucre</option>
                        <option value="Tovar" <?php if($reg3[4]=="Tovar"){ echo 'selected'; } ?>>Tovar</option>
                        <option value="Urdaneta" <?php if($reg3[4]=="Urdaneta"){ echo 'selected'; } ?>>Urdaneta</option>
                        <option value="Zamora" <?php if($reg3[4]=="Zamora"){ echo 'selected'; } ?>>Zamora</option>

                    </select>
                    </br>

                     <select class="opcion4" required name="Municipio[]" id="Municipio">
                        <option value="">Seleccione Barinas</option>
                        <option value="Andrés Eloy Blanco" <?php if($reg3[4]=="Andrés Eloy Blanco"){ echo 'selected'; } ?>>Andrés Eloy Blanco</option>
                        <option value="Antonio José de Sucre" <?php if($reg3[4]=="Antonio José de Sucre"){ echo 'selected'; } ?>>Antonio José de Sucre</option>
                        <option value="Alberto Arvelo Torrealba" <?php if($reg3[4]=="Alberto Arvelo Torrealba"){ echo 'selected'; } ?>>Alberto Arvelo Torrealba</option>
                        <option value="Arismendi" <?php if($reg3[4]=="Arismendi"){ echo 'selected'; } ?>>Arismendi</option>
                        <option value="Barinas" <?php if($reg3[4]=="Barinas"){ echo 'selected'; } ?>>Barinas</option>
                        <option value="Bolívar" <?php if($reg3[4]=="Bolívar"){ echo 'selected'; } ?>>Bolívar</option>
                        <option value="Cruz Paredes" <?php if($reg3[4]=="Cruz Paredes"){ echo 'selected'; } ?>>Cruz Paredes</option>
                        <option value="Ezequiel Zamora" <?php if($reg3[4]=="Ezequiel Zamora"){ echo 'selected'; } ?>>Ezequiel Zamora</option>
                        <option value="Obispos" <?php if($reg3[4]=="Obispos"){ echo 'selected'; } ?>>Obispos</option>
                        <option value="Pedraza" <?php if($reg3[4]=="Pedraza"){ echo 'selected'; } ?>>Pedraza</option>
                        <option value="Rojas" <?php if($reg3[4]=="Rojas"){ echo 'selected'; } ?>>Rojas</option>
                        <option value="Sosa" <?php if($reg3[4]=="Sosa"){ echo 'selected'; } ?>>Sosa</option>

                    </select>
                    </br>

                      <select class="opcion4" required name="Municipio[]" id="Municipio">
                        <option value="">Seleccione Bolivar</option>
                        <option value="Angostura" <?php if($reg3[4]=="Angostura"){ echo 'selected'; } ?>>Angostura</option>
                        <option value="Caroní" <?php if($reg3[4]=="Caroní"){ echo 'selected'; } ?>>Caroní</option>
                        <option value="Cedeño" <?php if($reg3[4]=="Cedeño"){ echo 'selected'; } ?>>Cedeño</option>
                        <option value="Chien" <?php if($reg3[4]=="Chien"){ echo 'selected'; } ?>>Chien</option>
                        <option value="El Callao" <?php if($reg3[4]=="El Callao"){ echo 'selected'; } ?>>El Callao</option>
                        <option value="Gran Sabana" <?php if($reg3[4]=="Gran Sabana"){ echo 'selected'; } ?>>Gran Sabana</option>
                        <option value="Heres" <?php if($reg3[4]=="Heres"){ echo 'selected'; } ?>>Heres</option>
                        <option value="Piar" <?php if($reg3[4]=="Piar"){ echo 'selected'; } ?>>Piar</option>
                        <option value="Roscio" <?php if($reg3[4]=="Roscio"){ echo 'selected'; } ?>>Roscio</option>
                        <option value="Sifontes" <?php if($reg3[4]=="Sifontes"){ echo 'selected'; } ?>>Sifontes</option>
                        <option value="Sucre" <?php if($reg3[4]=="Sucre"){ echo 'selected'; } ?>>Sucre</option>
                    </select>
                    </br>

                    <select class="opcion4" required name="Municipio[]" id="Municipio">
                        <option value="">Seleccione Carabobo</option>
                        <option value="Bejuma" <?php if($reg3[4]=="Bejuma"){ echo 'selected'; } ?>>Bejuma</option>
                        <option value="Carlos Arvelo" <?php if($reg3[4]=="Carlos Arvelo"){ echo 'selected'; } ?>>Carlos Arvelo</option>
                        <option value="Diego Ibarra" <?php if($reg3[4]=="Diego Ibarra"){ echo 'selected'; } ?>>Diego Ibarra</option>
                        <option value="Guacara" <?php if($reg3[4]=="Guacara"){ echo 'selected'; } ?>>Guacara</option>
                        <option value="Juan José Mora" <?php if($reg3[4]=="Juan José Mora"){ echo 'selected'; } ?>>Juan José Mora</option>
                        <option value="Libertador" <?php if($reg3[4]=="Libertador"){ echo 'selected'; } ?>>Libertador</option>
                        <option value="Los Guayos" <?php if($reg3[4]=="Los Guayos"){ echo 'selected'; } ?>>Los Guayos</option>
                        <option value="Miranda" <?php if($reg3[4]=="Miranda"){ echo 'selected'; } ?>>Miranda</option>
                        <option value="Montalbán" <?php if($reg3[4]=="Montalbán"){ echo 'selected'; } ?>>Montalbán</option>
                        <option value="Naguanagua" <?php if($reg3[4]=="Naguanagua"){ echo 'selected'; } ?>>Naguanagua</option>
                        <option value="Puerto Cabello" <?php if($reg3[4]=="Puerto Cabello"){ echo 'selected'; } ?>>Puerto Cabello</option>
                        <option value="San Diego" <?php if($reg3[4]=="San Diego"){ echo 'selected'; } ?>>San Diego</option>
                        <option value="San Joaquín" <?php if($reg3[4]=="San Joaquín"){ echo 'selected'; } ?>>San Joaquín</option>
                        <option value="Valencia" <?php if($reg3[4]=="Valencia"){ echo 'selected'; } ?>>Valencia</option>
                    </select>
                    </br>

                     <select class="opcion4" required name="Municipio[]" id="Municipio">
                        <option value="">Seleccione Cajedes</option>
                        <option value="Anzoátegui" <?php if($reg3[4]=="Anzoátegui"){ echo 'selected'; } ?>>Anzoátegui</option>
                        <option value="Ezequiel Zamora" <?php if($reg3[4]=="Ezequiel Zamora"){ echo 'selected'; } ?>>Ezequiel Zamora</option>
                        <option value="Girardot" <?php if($reg3[4]=="Girardot"){ echo 'selected'; } ?>>Girardot</option>
                        <option value="Lima Blanco" <?php if($reg3[4]=="Lima Blanco"){ echo 'selected'; } ?>>Lima Blanco</option>
                        <option value="Pao de San Juan Bautista" <?php if($reg3[4]=="Pao de San Juan Bautista"){ echo 'selected'; } ?>>Pao de San Juan Bautista</option>
                        <option value="Ricaurte" <?php if($reg3[4]=="Ricaurte"){ echo 'selected'; } ?>>Ricaurte</option>
                        <option value="Rómulo" <?php if($reg3[4]=="Rómulo"){ echo 'selected'; } ?>>Rómulo</option>
                        <option value="Tinaco" <?php if($reg3[4]=="Tinaco"){ echo 'selected'; } ?>>Tinaco</option>
                        <option value="Tinaquillo" <?php if($reg3[4]=="Tinaquillo"){ echo 'selected'; } ?>>Tinaquillo</option>
                    </select>
                    </br>

                       <select class="opcion4" required name="Municipio[]" id="Municipio">
                        <option value="">Seleccione Delta Amacuro</option>
                        <option value="Antonio Díaz" <?php if($reg3[4]=="Antonio Díaz"){ echo 'selected'; } ?>>Antonio Díaz</option>
                        <option value="Casacoima" <?php if($reg3[4]=="Casacoima"){ echo 'selected'; } ?>>Casacoima</option>
                        <option value="Pedernales" <?php if($reg3[4]=="Pedernales"){ echo 'selected'; } ?>>Pedernales</option>
                        <option value="Tucupita" <?php if($reg3[4]=="Tucupita"){ echo 'selected'; } ?>>Tucupita</option>
                    </select>
                    </br>

                     <select class="opcion4" required name="Municipio[]" id="Municipio">
                        <option value="">Seleccione Distrito Capital</option>
                        <option value="Libertador" <?php if($reg3[4]=="Libertador"){ echo 'selected'; } ?>>Libertador</option>
                    </select>
                    </br>

                    <select class="opcion4" required name="Municipio[]" id="Municipio">
                        <option value="">Seleccione Falcón</option>
                        <option value="Acosta" <?php if($reg3[4]=="Acosta"){ echo 'selected'; } ?>>Acosta</option>
                        <option value="Bolívar" <?php if($reg3[4]=="Bolívar"){ echo 'selected'; } ?>>Bolívar</option>
                        <option value="Buchivacoa" <?php if($reg3[4]=="Buchivacoa"){ echo 'Buchivacoa'; } ?>>Buchivacoa</option>
                        <option value="Colina" <?php if($reg3[4]=="Colina"){ echo 'selected'; } ?>>Colina</option>
                        <option value="Dabajuro" <?php if($reg3[4]=="Dabajuro"){ echo 'selected'; } ?>>Dabajuro</option>
                        <option value="Democracia" <?php if($reg3[4]=="Democracia"){ echo 'selected'; } ?>>Democracia</option>
                        <option value="Falcón" <?php if($reg3[4]=="Falcón"){ echo 'selected'; } ?>>Falcón</option>
                        <option value="Federación" <?php if($reg3[4]=="Federación"){ echo 'selected'; } ?>>Federación</option>
                        <option value="Iturriza" <?php if($reg3[4]=="Iturriza"){ echo 'selected'; } ?>>Iturriza</option>
                        <option value="Jacura" <?php if($reg3[4]=="Jacura"){ echo 'selected'; } ?>>Jacura</option>
                        <option value="Los Taques" <?php if($reg3[4]=="Los Taques"){ echo 'selected'; } ?>>Los Taques</option>
                        <option value="Mauroa" <?php if($reg3[4]=="Mauroa"){ echo 'selected'; } ?>>Mauroa</option>
                        <option value="Manaure" <?php if($reg3[4]=="Manaure"){ echo 'selected'; } ?>>Manaure</option>
                        <option value="Miranda" <?php if($reg3[4]=="Miranda"){ echo 'selected'; } ?>>Miranda</option>
                        <option value="Palma Sola" <?php if($reg3[4]=="Palma Sola"){ echo 'selected'; } ?>>Palma Sola</option>
                        <option value="Petit" <?php if($reg3[4]=="Petit"){ echo 'selected'; } ?>>Petit</option>
                        <option value="Píritu" <?php if($reg3[4]=="Píritu"){ echo 'selected'; } ?>>Píritu</option>
                        <option value="San Francisco" <?php if($reg3[4]=="San Francisco"){ echo 'selected'; } ?>>San Francisco</option>
                        <option value="Silva" <?php if($reg3[4]=="Silva"){ echo 'selected'; } ?>>Silva</option>
                        <option value="Sucre" <?php if($reg3[4]=="Sucre"){ echo 'selected'; } ?>>Sucre</option>
                        <option value="Tocópero" <?php if($reg3[4]=="Tocópero"){ echo 'selected'; } ?>>Tocópero</option>
                        <option value="Unión" <?php if($reg3[4]=="Unión"){ echo 'selected'; } ?>>Unión</option>
                        <option value="Urumaco" <?php if($reg3[4]=="Urumaco"){ echo 'selected'; } ?>>Urumaco</option>
                        <option value="Zamora" <?php if($reg3[4]=="Zamora"){ echo 'selected'; } ?>>Zamora</option>
                    </select>
                    </br>

                    <select class="opcion4" required name="Municipio[]" id="Municipio">
                        <option value="">Seleccione Guárico</option>
                        <option value="Camaguán" <?php if($reg3[4]=="Camaguán"){ echo 'selected'; } ?>>Camaguán</option>
                        <option value="Chaguaramas" <?php if($reg3[4]=="Chaguaramas"){ echo 'selected'; } ?>>Chaguaramas</option>
                        <option value="El Socorro" <?php if($reg3[4]=="El Socorro"){ echo 'selected'; } ?>>El Socorro</option>
                        <option value="Francisco de Miranda" <?php if($reg3[4]=="Francisco de Miranda"){ echo 'selected'; } ?>>Francisco de Miranda</option>
                        <option value="José Félix Ribas" <?php if($reg3[4]=="José Félix Ribas"){ echo 'selected'; } ?>>José Félix Ribas</option>
                        <option value="José Tadeo Monagas" <?php if($reg3[4]=="José Tadeo Monagas"){ echo 'selected'; } ?>>José Tadeo Monagas</option>
                        <option value="Juan Germán Roscio" <?php if($reg3[4]=="Juan Germán Roscio"){ echo 'selected'; } ?>>Juan Germán Roscio</option>
                        <option value="Julián Mellado" <?php if($reg3[4]=="Julián Mellado"){ echo 'selected'; } ?>>Julián Mellado</option>
                        <option value="Las Mercedes" <?php if($reg3[4]=="Las Mercedes"){ echo 'selected'; } ?>>Las Mercedes</option>
                        <option value="Leonardo Infante" <?php if($reg3[4]=="Leonardo Infante"){ echo 'selected'; } ?>>Leonardo Infante</option>
                        <option value="Ortíz" <?php if($reg3[4]=="Ortíz"){ echo 'selected'; } ?>>Ortíz</option>
                        <option value="San Gerónimo de Guayabal" <?php if($reg3[4]=="San Gerónimo de Guayabal"){ echo 'selected'; } ?>>San Gerónimo de Guayabal</option>
                        <option value="San José de Guaribe" <?php if($reg3[4]=="San José de Guaribe"){ echo 'selected'; } ?>>San José de Guaribe</option>
                        <option value="Santa María de Ipire" <?php if($reg3[4]=="Santa María de Ipire"){ echo 'selected'; } ?>>Santa María de Ipire</option>
                        <option value="Zaraza" <?php if($reg3[4]=="Zaraza"){ echo 'selected'; } ?>>Zaraza</option>

                    </select>
                    </br>

                    <select class="opcion4" required name="Municipio[]" id="Municipio">
                        <option value="">Seleccione Lara</option>
                        <option value="Andrés Eloy Blanco" <?php if($reg3[4]=="Andrés Eloy Blanco"){ echo 'selected'; } ?>>Andrés Eloy Blanco</option>
                        <option value="Crespo" <?php if($reg3[4]=="Crespo"){ echo 'selected'; } ?>>Crespo</option>
                        <option value="Iribarren" <?php if($reg3[4]=="Iribarren"){ echo 'selected'; } ?>>Iribarren</option>
                        <option value="Jiménez" <?php if($reg3[4]=="Jiménez"){ echo 'selected'; } ?>>Jiménez</option>
                        <option value="Juan José Mora" <?php if($reg3[4]=="Juan José Mora"){ echo 'selected'; } ?>>Juan José Mora</option>
                        <option value="Morán" <?php if($reg3[4]=="Morán"){ echo 'selected'; } ?>>Morán</option>
                        <option value="Palavecino" <?php if($reg3[4]=="Palavecino"){ echo 'selected'; } ?>>Palavecino</option>
                        <option value="Simón Planas" <?php if($reg3[4]=="Simón Planas"){ echo 'selected'; } ?>>Simón Planas</option>
                        <option value="Torres" <?php if($reg3[4]=="Torres"){ echo 'selected'; } ?>>Torres</option>
                        <option value="Urdaneta" <?php if($reg3[4]=="Urdaneta"){ echo 'selected'; } ?>>Urdaneta</option>
                    </select>
                    </br>

                    <select class="opcion4" required name="Municipio[]" id="Municipio">
                        <option value="">Seleccione Mérida</option>
                        <option value="Alberto Adriani" <?php if($reg3[4]=="Alberto Adriani"){ echo 'selected'; } ?>>Alberto Adriani</option>
                        <option value="Antonio Pinto Salinas" <?php if($reg3[4]=="Antonio Pinto Salinas"){ echo 'selected'; } ?>>Antonio Pinto Salinas</option>
                        <option value="Andres Bello" <?php if($reg3[4]=="Andres Bello"){ echo 'selected'; } ?>>Andres Bello</option>
                        <option value="Aricagua" <?php if($reg3[4]=="Aricagua"){ echo 'selected'; } ?>>Aricagua</option>
                        <option value="Arzobispo Chacon" <?php if($reg3[4]=="Arzobispo Chacon"){ echo 'selected'; } ?>>Arzobispo Chacon</option>
                        <option value="Campo Elias" <?php if($reg3[4]=="Campo Elias"){ echo 'selected'; } ?>>Campo Elias</option>
                        <option value="Caracciolo Parra Olmedo" <?php if($reg3[4]=="Caracciolo Parra Olmedo"){ echo 'selected'; } ?>>Caracciolo Parra Olmedo</option>
                        <option value="Cardenal Quintero" <?php if($reg3[4]=="Cardenal Quintero"){ echo 'selected'; } ?>>Cardenal Quintero</option>
                        <option value="Guaraque" <?php if($reg3[4]=="Guaraque"){ echo 'selected'; } ?>>Guaraque</option>
                        <option value="Julio Cesar Salas" <?php if($reg3[4]=="Julio Cesar Salas"){ echo 'selected'; } ?>>Julio Cesar Salas</option>
                        <option value="Justo Briceño" <?php if($reg3[4]=="Justo Briceño"){ echo 'selected'; } ?>>Justo Briceño</option>
                        <option value="Libertador" <?php if($reg3[4]=="Libertador"){ echo 'selected'; } ?>>Libertador</option>
                        <option value="Miranda" <?php if($reg3[4]=="Miranda"){ echo 'selected'; } ?>>Miranda</option>
                        <option value="Obispo Ramos de Lora" <?php if($reg3[4]=="Obispo Ramos de Lora"){ echo 'selected'; } ?>>Obispo Ramos de Lora</option>
                        <option value="Padre Noguera" <?php if($reg3[4]=="Padre Noguera"){ echo 'selected'; } ?>>Padre Noguera</option>
                        <option value="Pueblo Llano" <?php if($reg3[4]=="Pueblo Llano"){ echo 'selected'; } ?>>Pueblo Llano</option>
                        <option value="Rangel" <?php if($reg3[4]=="Rangel"){ echo 'selected'; } ?>>Rangel</option>
                        <option value="Rivas Davila" <?php if($reg3[4]=="Rivas Davila"){ echo 'selected'; } ?>>Rivas Davila</option>
                        <option value="Santos Marquina" <?php if($reg3[4]=="Santos Marquina"){ echo 'selected'; } ?>>Santos Marquina</option>
                        <option value="Sucre" <?php if($reg3[4]=="Sucre"){ echo 'selected'; } ?>>Sucre</option>
                        <option value="Tovar" <?php if($reg3[4]=="Tovar"){ echo 'selected'; } ?>>Tovar</option>
                        <option value="Tulio Febres Cordero" <?php if($reg3[4]=="Tulio Febres Cordero"){ echo 'selected'; } ?>>Tulio Febres Cordero</option>
                        <option value="Zea" <?php if($reg3[4]=="Zea"){ echo 'selected'; } ?>>Zea</option>

                    </select>
                    </br>

                    <select class="opcion4" required name="Municipio[]" id="Municipio">
                        <option value="">Seleccione Miranda</option>
                        <option value="Acevedo" <?php if($reg3[4]=="Acevedo"){ echo 'selected'; } ?>>Acevedo</option>
                        <option value="Andrés Bello" <?php if($reg3[4]=="Andrés Bello"){ echo 'selected'; } ?>>Andrés Bello</option>
                        <option value="Baruta" <?php if($reg3[4]=="Baruta"){ echo 'selected'; } ?>>Baruta</option>
                        <option value="Brión" <?php if($reg3[4]=="Brión"){ echo 'selected'; } ?>>Brión</option>
                        <option value="Buroz" <?php if($reg3[4]=="Buroz"){ echo 'selected'; } ?>>Buroz</option>
                        <option value="Carrizal" <?php if($reg3[4]=="Carrizal"){ echo 'selected'; } ?>>Carrizal</option>
                        <option value="Chacao" <?php if($reg3[4]=="Chacao"){ echo 'selected'; } ?>>Chacao</option>
                        <option value="Cristóbal Rojas" <?php if($reg3[4]=="Cristóbal Rojas"){ echo 'selected'; } ?>>Cristóbal Rojas</option>
                        <option value="El Hatillo" <?php if($reg3[4]=="El Hatillo"){ echo 'selected'; } ?>>El Hatillo</option>
                        <option value="Guaicaipuro" <?php if($reg3[4]=="Guaicaipuro"){ echo 'selected'; } ?>>Guaicaipuro</option>
                        <option value="Independencia" <?php if($reg3[4]=="Independencia"){ echo 'selected'; } ?>>Independencia</option>
                        <option value="Lander" <?php if($reg3[4]=="Lander"){ echo 'selected'; } ?>>Lander</option>
                        <option value="Los Salias" <?php if($reg3[4]=="Los Salias"){ echo 'selected'; } ?>>Los Salias</option>
                        <option value="Páez" <?php if($reg3[4]=="Páez"){ echo 'selected'; } ?>>Páez</option>
                        <option value="Paz Castillo" <?php if($reg3[4]=="Paz Castillo"){ echo 'selected'; } ?>>Paz Castillo</option>
                        <option value="Pedro Gual" <?php if($reg3[4]=="Pedro Gual"){ echo 'selected'; } ?>>Pedro Gual</option>
                        <option value="Plaza" <?php if($reg3[4]=="Plaza"){ echo 'selected'; } ?>>Plaza</option>
                        <option value="Simón Bolívar" <?php if($reg3[4]=="Simón Bolívar"){ echo 'selected'; } ?>>Simón Bolívar</option>
                        <option value="Sucre" <?php if($reg3[4]=="Sucre"){ echo 'selected'; } ?>>Sucre</option>
                        <option value="Urdaneta" <?php if($reg3[4]=="Urdaneta"){ echo 'selected'; } ?>>Urdaneta</option>
                        <option value="Zamora" <?php if($reg3[4]=="Zamora"){ echo 'selected'; } ?>>Zamora</option>
                    </select>
                    </br>

                    <select class="opcion4" required name="Municipio[]" id="Municipio">
                        <option value="">Seleccione Monagas</option>
                        <option value="Acosta" <?php if($reg3[4]=="Acosta"){ echo 'selected'; } ?>>Acosta</option>
                        <option value="Aguasay" <?php if($reg3[4]=="Aguasay"){ echo 'selected'; } ?>>Aguasay</option>
                        <option value="Bolívar" <?php if($reg3[4]=="Bolívar"){ echo 'selected'; } ?>>Bolívar</option>
                        <option value="Caripe" <?php if($reg3[4]=="Caripe"){ echo 'selected'; } ?>>Caripe</option>
                        <option value="Cedeño" <?php if($reg3[4]=="Cedeño"){ echo 'selected'; } ?>>Cedeño</option>
                        <option value="Ezequiel Zamora" <?php if($reg3[4]=="Ezequiel Zamora"){ echo 'selected'; } ?>>Ezequiel Zamora</option>
                        <option value="Libertador" <?php if($reg3[4]=="Libertador"){ echo 'selected'; } ?>>Libertador</option>
                        <option value="Maturín" <?php if($reg3[4]=="Maturín"){ echo 'selected'; } ?>>Maturín</option>
                        <option value="Piar" <?php if($reg3[4]=="Piar"){ echo 'selected'; } ?>>Piar</option>
                        <option value="Púnceres" <?php if($reg3[4]=="Púnceres"){ echo 'selected'; } ?>>Púnceres</option>
                        <option value="Santa Bárbara" <?php if($reg3[4]=="Santa Bárbara"){ echo 'selected'; } ?>>Santa Bárbara</option>
                        <option value="Sotillo" <?php if($reg3[4]=="Sotillo"){ echo 'selected'; } ?>>Sotillo</option>
                        <option value="Uracoa" <?php if($reg3[4]=="Uracoa"){ echo 'selected'; } ?>>Uracoa</option>
                    </select>
                    </br>

                     <select class="opcion4" required name="Municipio[]" id="Municipio">
                        <option value="">Seleccione Nueva Esparta</option>
                        <option value="Antolín del Campo" <?php if($reg3[4]=="Antolín del Campo"){ echo 'selected'; } ?>>Antolín del Campo</option>
                        <option value="Arismendi" <?php if($reg3[4]=="Arismendi"){ echo 'selected'; } ?>>Arismendi</option>
                        <option value="Díaz" <?php if($reg3[4]=="Díaz"){ echo 'selected'; } ?>>Díaz</option>
                        <option value="García" <?php if($reg3[4]=="García"){ echo 'selected'; } ?>>García</option>
                        <option value="Gómez" <?php if($reg3[4]=="Gómez"){ echo 'selected'; } ?>>Gómez</option>
                        <option value="Maneiro" <?php if($reg3[4]=="Maneiro"){ echo 'selected'; } ?>>Maneiro</option>
                        <option value="Marcano" <?php if($reg3[4]=="Marcano"){ echo 'selected'; } ?>>Marcano</option>
                        <option value="Mariño" <?php if($reg3[4]=="Mariño"){ echo 'selected'; } ?>>Mariño</option>
                        <option value="Península de Macanao" <?php if($reg3[4]=="Península de Macanao"){ echo 'selected'; } ?>>Península de Macanao</option>
                        <option value="Tubores" <?php if($reg3[4]=="Tubores"){ echo 'selected'; } ?>>Tubores</option>
                        <option value="Villalba" <?php if($reg3[4]=="Villalba"){ echo 'selected'; } ?>>Villalba</option>
                       
                    </select>
                    </br>

                     <select class="opcion4" required name="Municipio[]" id="Municipio">
                        <option value="">Seleccione Portuguesa</option>
                        <option value="Agua Blanca" <?php if($reg3[4]=="Agua Blanca"){ echo 'selected'; } ?>>Agua Blanca</option>
                        <option value="Araure" <?php if($reg3[4]=="Araure"){ echo 'selected'; } ?>>Araure</option>
                        <option value="Esteller" <?php if($reg3[4]=="Esteller"){ echo 'selected'; } ?>>Esteller</option>
                        <option value="Guanare" <?php if($reg3[4]=="Guanare"){ echo 'selected'; } ?>>Guanare</option>
                        <option value="Guanarito" <?php if($reg3[4]=="Guanarito"){ echo 'selected'; } ?>>Guanarito</option>
                        <option value="Monseñor José Vicente de Unda" <?php if($reg3[4]=="Monseñor José Vicente de Unda"){ echo 'selected'; } ?>>Monseñor José Vicente de Unda</option>
                        <option value="Ospino" <?php if($reg3[4]=="Ospino"){ echo 'selected'; } ?>>Ospino</option>
                        <option value="Páez" <?php if($reg3[4]=="Páez"){ echo 'selected'; } ?>>Páez</option>
                        <option value="Papelón" <?php if($reg3[4]=="Papelón"){ echo 'selected'; } ?>>Papelón</option>
                        <option value="San Génaro de Boconoito" <?php if($reg3[4]=="San Génaro de Boconoito"){ echo 'selected'; } ?>>San Génaro de Boconoito</option>
                        <option value="San Isidro Labrador" <?php if($reg3[4]=="San Isidro Labrador"){ echo 'selected'; } ?>>San Isidro Labrador</option>
                        <option value="San Rafael de Onoto" <?php if($reg3[4]=="San Rafael de Onoto"){ echo 'selected'; } ?>>San Rafael de Onoto</option>
                        <option value="Santa Rosalía" <?php if($reg3[4]=="Santa Rosalía"){ echo 'selected'; } ?>>Santa Rosalía</option>
                        <option value="Sucre" <?php if($reg3[4]=="Sucre"){ echo 'selected'; } ?>>Sucre</option>
                        <option value="Turén" <?php if($reg3[4]=="Turén"){ echo 'selected'; } ?>>Turén</option>
                       
                    </select>
                    </br>

                    <select class="opcion4" required name="Municipio[]" id="Municipio">
                        <option value="">Seleccione Sucre</option>
                        <option value="Andrés Mata" <?php if($reg3[4]=="Andrés Mata"){ echo 'selected'; } ?>>Andrés Mata</option>
                        <option value="Arismendi Benítez" <?php if($reg3[4]=="Arismendi Benítez"){ echo 'selected'; } ?>>Arismendi Benítez</option>
                        <option value="Bermúdez" <?php if($reg3[4]=="Bermúdez"){ echo 'selected'; } ?>>Bermúdez</option>
                        <option value="Bolívar" <?php if($reg3[4]=="Bolívar"){ echo 'selected'; } ?>>Bolívar</option>
                        <option value="Cajigal" <?php if($reg3[4]=="Cajigal"){ echo 'selected'; } ?>>Cajigal</option>
                        <option value="Cruz Salmerón Acosta" <?php if($reg3[4]=="Cruz Salmerón Acosta"){ echo 'selected'; } ?>>Cruz Salmerón Acosta</option>
                        <option value="Libertador" <?php if($reg3[4]=="Libertador"){ echo 'selected'; } ?>>Libertador</option>
                        <option value="Mariño" <?php if($reg3[4]=="Mariño"){ echo 'selected'; } ?>>Mariño</option>
                        <option value="Mejía" <?php if($reg3[4]=="Mejía"){ echo 'selected'; } ?>>Mejía</option>
                        <option value="Montes" <?php if($reg3[4]=="Montes"){ echo 'selected'; } ?>>Montes</option>
                        <option value="Ribero" <?php if($reg3[4]=="Ribero"){ echo 'selected'; } ?>>Ribero</option>
                        <option value="Sucre" <?php if($reg3[4]=="Sucre"){ echo 'selected'; } ?>>Sucre</option>
                        <option value="Valdez" <?php if($reg3[4]=="Valdez"){ echo 'selected'; } ?>>Valdez</option>
                       
                    </select>
                    </br>

                    <select class="opcion4" required name="Municipio[]" id="Municipio">
                        <option value="">Seleccione Tachira</option>
                        <option value="Andrés Bello" <?php if($reg3[4]=="Andrés Bello"){ echo 'selected'; } ?>>Andrés Bello</option>
                        <option value="Arismendi Benítez" <?php if($reg3[4]=="Arismendi Benítez"){ echo 'selected'; } ?>>Arismendi Benítez</option>
                        <option value="Bermúdez" <?php if($reg3[4]=="Bermúdez"){ echo 'selected'; } ?>>Bermúdez</option>
                        <option value="Bolívar" <?php if($reg3[4]=="Bolívar"){ echo 'selected'; } ?>>Bolívar</option>
                        <option value="Cárdenas" <?php if($reg3[4]=="Cárdenas"){ echo 'selected'; } ?>>Cárdenas</option>
                        <option value="Córdoba" <?php if($reg3[4]=="Córdoba"){ echo 'selected'; } ?>>Córdoba</option>
                        <option value="Fernandez Feo" <?php if($reg3[4]=="Fernandez Feo"){ echo 'selected'; } ?>>Fernandez Feo</option>
                        <option value="Francisco de Miranda " <?php if($reg3[4]=="Francisco de Miranda "){ echo 'selected'; } ?>>Francisco de Miranda </option>
                        <option value="García de Hevia" <?php if($reg3[4]=="García de Hevia"){ echo 'selected'; } ?>>García de Hevia</option>
                        <option value="Guásimos" <?php if($reg3[4]=="Guásimos"){ echo 'selected'; } ?>>Guásimos</option>
                        <option value="Independencia" <?php if($reg3[4]=="Independencia"){ echo 'selected'; } ?>>Independencia</option>
                        <option value="Jáuregui" <?php if($reg3[4]=="Jáuregui"){ echo 'selected'; } ?>>Jáuregui</option>
                        <option value="José Maria Vargas" <?php if($reg3[4]=="José Maria Vargas"){ echo 'selected'; } ?>>José Maria Vargas</option>
                        <option value="Junín" <?php if($reg3[4]=="Junín"){ echo 'selected'; } ?>>Junín</option>
                        <option value="San Judas Tadeo" <?php if($reg3[4]=="San Judas Tadeo"){ echo 'selected'; } ?>>San Judas Tadeo</option>
                        <option value="Libertad" <?php if($reg3[4]=="Libertad"){ echo 'selected'; } ?>>Libertad</option>
                        <option value="Libertador" <?php if($reg3[4]=="Libertador"){ echo 'selected'; } ?>>Libertador</option>
                        <option value="Lobatera" <?php if($reg3[4]=="Lobatera"){ echo 'selected'; } ?>>Lobatera</option>
                        <option value="Michelena" <?php if($reg3[4]=="Michelena"){ echo 'selected'; } ?>>Michelena</option>
                        <option value="Panamericano" <?php if($reg3[4]=="Panamericano"){ echo 'selected'; } ?>>Panamericano</option>
                        <option value="Pedro María Ureña" <?php if($reg3[4]=="Pedro María Ureña"){ echo 'selected'; } ?>>Pedro María Ureña</option>
                        <option value="Rafael Urdaneta" <?php if($reg3[4]=="Rafael Urdaneta"){ echo 'selected'; } ?>>Rafael Urdaneta</option>
                        <option value="Samuel Dario Maldonado" <?php if($reg3[4]=="Samuel Dario Maldonado"){ echo 'selected'; } ?>>Samuel Dario Maldonado</option>
                        <option value="San Cristobal" <?php if($reg3[4]=="San Cristobal"){ echo 'selected'; } ?>>San Cristobal</option>
                        <option value="Seboruco" <?php if($reg3[4]=="Seboruco"){ echo 'selected'; } ?>>Seboruco</option>
                        <option value="Simón Rodriguez" <?php if($reg3[4]=="Simón Rodriguez"){ echo 'selected'; } ?>>Simón Rodriguez</option>
                        <option value="Sucre" <?php if($reg3[4]=="Sucre"){ echo 'selected'; } ?>>Sucre</option>
                        <option value="Torbes" <?php if($reg3[4]=="Torbes"){ echo 'selected'; } ?>>Torbes</option>
                        <option value="Uribante" <?php if($reg3[4]=="Uribante"){ echo 'selected'; } ?>>Uribante</option>
                       
                    </select>
                    </br>

                     <select class="opcion4" required name="Municipio[]" id="Municipio">
                        <option value="">Seleccione Trujillo</option>
                        <option value="Andrés Bello" <?php if($reg3[4]=="Andrés Bello"){ echo 'selected'; } ?>>Andrés Bello</option>
                        <option value="Boconó" <?php if($reg3[4]=="Boconó"){ echo 'selected'; } ?>>Boconó</option>
                        <option value="Bolívar" <?php if($reg3[4]=="Bolívar"){ echo 'selected'; } ?>>Bolívar</option>
                        <option value="Candelaria" <?php if($reg3[4]=="Candelaria"){ echo 'selected'; } ?>>Candelaria</option>
                        <option value="Carache" <?php if($reg3[4]=="Carache"){ echo 'selected'; } ?>>Carache</option>
                        <option value="Escuque" <?php if($reg3[4]=="Escuque"){ echo 'selected'; } ?>>Escuque</option>
                        <option value="José Felipe Márquez Cañizales" <?php if($reg3[4]=="José Felipe Márquez Cañizales"){ echo 'selected'; } ?>>José Felipe Márquez Cañizales</option>
                        <option value="Juan Vicente Campo Elías" <?php if($reg3[4]=="Juan Vicente Campo Elías"){ echo 'selected'; } ?>>Juan Vicente Campo Elías</option>
                        <option value="La ceiba" <?php if($reg3[4]=="La ceiba"){ echo 'selected'; } ?>>La ceiba</option>
                        <option value="Miranda" <?php if($reg3[4]=="Miranda"){ echo 'selected'; } ?>>Miranda</option>
                        <option value="Monte Carmelo" <?php if($reg3[4]=="Monte Carmelo"){ echo 'selected'; } ?>>Monte Carmelo</option>
                        <option value="Motatán" <?php if($reg3[4]=="Motatán"){ echo 'selected'; } ?>>Motatán</option>
                        <option value="Pampán" <?php if($reg3[4]=="Pampán"){ echo 'selected'; } ?>>Pampán</option>
                        <option value="Pampanito" <?php if($reg3[4]=="Pampanito"){ echo 'selected'; } ?>>Pampanito</option>
                        <option value="Rafael Rangel" <?php if($reg3[4]=="Rafael Rangel"){ echo 'selected'; } ?>>Rafael Rangel</option>
                        <option value="San Rafael de Carvajal" <?php if($reg3[4]=="San Rafael de Carvajal"){ echo 'selected'; } ?>>San Rafael de Carvajal</option>
                        <option value="Sucre" <?php if($reg3[4]=="Sucre"){ echo 'selected'; } ?>>Sucre</option>
                        <option value="Trujillo" <?php if($reg3[4]=="Trujillo"){ echo 'selected'; } ?>>Trujillo</option>
                        <option value="Urdaneta" <?php if($reg3[4]=="Urdaneta"){ echo 'selected'; } ?>>Urdaneta</option>
                        <option value="Valera" <?php if($reg3[4]=="Valera"){ echo 'selected'; } ?>>Valera</option>
                    </select>
                    </br>

                     <select class="opcion4" required name="Municipio[]" id="Municipio">
                        <option value="">Seleccione Vargas</option>
                        <option value="Caraballeda" <?php if($reg3[4]=="Caraballeda"){ echo 'selected'; } ?>>Caraballeda</option>
                        <option value="Carayaca" <?php if($reg3[4]=="Carayaca"){ echo 'selected'; } ?>>Carayaca</option>
                        <option value="Carlos Soublette" <?php if($reg3[4]=="Carlos Soublette"){ echo 'selected'; } ?>>Carlos Soublette</option>
                        <option value="Caruao" <?php if($reg3[4]=="Caruao"){ echo 'selected'; } ?>>Caruao</option>
                        <option value="Catia La Mar" <?php if($reg3[4]=="Catia La Mar"){ echo 'selected'; } ?>>Catia La Mar</option>
                        <option value="El Junko" <?php if($reg3[4]=="El Junko"){ echo 'selected'; } ?>>El Junko</option>
                        <option value="La Guaira" <?php if($reg3[4]=="La Guaira"){ echo 'selected'; } ?>>La Guaira</option>
                        <option value="Macuto" <?php if($reg3[4]=="Macuto"){ echo 'selected'; } ?>>Macuto</option>
                        <option value="Maiquetía" <?php if($reg3[4]=="Maiquetía"){ echo 'selected'; } ?>>Maiquetía</option>
                        <option value="Naiguatá" <?php if($reg3[4]=="Naiguatá"){ echo 'selected'; } ?>>Naiguatá</option>
                        <option value="Urimare" <?php if($reg3[4]=="Urimare"){ echo 'selected'; } ?>>Urimare</option>
                       
                    </select>
                    </br>

                    <select class="opcion4" required name="Municipio[]" id="Municipio">
                        <option value="">Seleccione Yaracuy</option>
                        <option value="Arístides Bastidas" <?php if($reg3[4]=="Arístides Bastidas"){ echo 'selected'; } ?>>Arístides Bastidas</option>
                        <option value="Bruzual" <?php if($reg3[4]=="Bruzual"){ echo 'selected'; } ?>>Bruzual</option>
                        <option value="Cocorote" <?php if($reg3[4]=="Cocorote"){ echo 'selected'; } ?>>Cocorote</option>
                        <option value="Independencia" <?php if($reg3[4]=="Independencia"){ echo 'selected'; } ?>>Independencia</option>
                        <option value="José Antonio Páez" <?php if($reg3[4]=="José Antonio Páez"){ echo 'selected'; } ?>>José Antonio Páez</option>
                        <option value="La Trinidad" <?php if($reg3[4]=="La Trinidad"){ echo 'selected'; } ?>>La Trinidad</option>
                        <option value="Manuel Monge" <?php if($reg3[4]=="Manuel Monge"){ echo 'selected'; } ?>>Manuel Monge</option>
                        <option value="Nirgua" <?php if($reg3[4]=="Nirgua"){ echo 'selected'; } ?>>Nirgua</option>
                        <option value="Peña" <?php if($reg3[4]=="Peña"){ echo 'selected'; } ?>>Peña</option>
                        <option value="San Felipe" <?php if($reg3[4]=="San Felipe"){ echo 'selected'; } ?>>San Felipe</option>
                        <option value="Sucre" <?php if($reg3[4]=="Sucre"){ echo 'selected'; } ?>>Sucre</option>
                        <option value="Urachiche" <?php if($reg3[4]=="Urachiche"){ echo 'selected'; } ?>>Urachiche</option>
                        <option value="Veroes" <?php if($reg3[4]=="Veroes"){ echo 'selected'; } ?>>Veroes</option>
                    </select>
                    </br>

                     <select class="opcion4" required name="Municipio[]" id="Municipio">
                        <option value="">Seleccione Zulia</option>
                        <option value="Almirante Padilla" <?php if($reg3[4]=="Almirante Padilla"){ echo 'selected'; } ?>>Almirante Padilla</option>
                        <option value="Baralt" <?php if($reg3[4]=="Baralt"){ echo 'selected'; } ?>>Baralt</option>
                        <option value="Cabimas" <?php if($reg3[4]=="Cabimas"){ echo 'selected'; } ?>>Cabimas</option>
                        <option value="Catatumbo" <?php if($reg3[4]=="Catatumbo"){ echo 'selected'; } ?>>Catatumbo</option>
                        <option value="Colón" <?php if($reg3[4]=="Colón"){ echo 'selected'; } ?>>Colón</option>
                        <option value="Francisco Javier Pulgar" <?php if($reg3[4]=="Francisco Javier Pulgar"){ echo 'selected'; } ?>>Francisco Javier Pulgar</option>
                        <option value="Jesús Enrique Lossada" <?php if($reg3[4]=="Jesús Enrique Lossada"){ echo 'selected'; } ?>>Jesús Enrique Lossada</option>
                        <option value="Jesús María Semprún" <?php if($reg3[4]=="Jesús María Semprún"){ echo 'selected'; } ?>>Jesús María Semprún</option>
                        <option value="La Cañada de Urdaneta" <?php if($reg3[4]=="La Cañada de Urdaneta"){ echo 'selected'; } ?>>La Cañada de Urdaneta</option>
                        <option value="Lagunillas" <?php if($reg3[4]=="Lagunillas"){ echo 'selected'; } ?>>Lagunillas</option>
                        <option value="Machiques de Perijá" <?php if($reg3[4]=="Machiques de Perijá"){ echo 'selected'; } ?>>Machiques de Perijá</option>
                        <option value="Mara" <?php if($reg3[4]=="Mara"){ echo 'selected'; } ?>>Mara</option>
                        <option value="Maracaibo" <?php if($reg3[4]=="Maracaibo"){ echo 'selected'; } ?>>Maracaibo</option>
                        <option value="Miranda" <?php if($reg3[4]=="Miranda"){ echo 'selected'; } ?>>Miranda</option>
                        <option value="Guajira" <?php if($reg3[4]=="Guajira"){ echo 'selected'; } ?>>Guajira</option>
                        <option value="Rosario de Perijá" <?php if($reg3[4]=="Rosario de Perijá"){ echo 'selected'; } ?>>Rosario de Perijá</option>
                        <option value="San Francisco" <?php if($reg3[4]=="San Francisco"){ echo 'selected'; } ?>>San Francisco</option>
                        <option value="Santa Rita" <?php if($reg3[4]=="Santa Rita"){ echo 'selected'; } ?>>Santa Rita</option>
                        <option value="Simón Bolívar" <?php if($reg3[4]=="Simón Bolívar"){ echo 'selected'; } ?>>Simón Bolívar</option>
                        <option value="Sucre" <?php if($reg3[4]=="Sucre"){ echo 'selected'; } ?>>Sucre</option>
                        <option value="Valmore Rodríguez" <?php if($reg3[4]=="Valmore Rodríguez"){ echo 'selected'; } ?>>Valmore Rodríguez</option>
                    </select>
                    </br>

                <label for="Direccion2">Parroquia</label>
                    <input type="text" required name="Parroquia[]" value="<?php echo $reg3[5] ?>" id="Direccion2"  title="" cols="30" rows="5" maxlength="60" />
                    </br>