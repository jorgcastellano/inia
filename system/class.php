<?php       
		


     require_once '../../includes/conexion_bd.php';


          class laboratorio {

              //private $res;
              private $reg;
             
              public function registrar_laboratorio($conex,$Nom_lab)
              {
                $sql="INSERT INTO laboratorio (Cod_lab,Nom_lab)
                      VALUES ('$Cod_lab','$Nom_lab')";
                mysqli_query($conex,$sql);
                require_once 'error_insert.php';
                if(mysqli_affected_rows($conex)>0){echo "El nuevo laboratorio se ha registrado con exito";} else { echo "No se ha podido registrar el nuevo laboratorio";}

              }

              public function modificar_laboratorio($conex,$Cod_lab,$Nom_lab)
              {
                $sql="UPDATE laboratorio SET laboratorio.Nom_lab='$Nom_lab' WHERE laboratorio.Cod_lab ='$Cod_lab'";
                mysqli_query($conex,$sql);
                require_once 'error_update.php';
                if(mysqli_affected_rows($conex)>0){echo "Los datos del laboratorio se han modificado con exito";} else { echo "No se ha podido modificar los datos del laboratorio";}

              }

              public function consultar_laboratorio($conex,$Nom_la)
              {

                $sql="SELECT * FROM laboratorio WHERE laboratorio.Nom_lab ='$Nom_la'";
                $res = $conex->query($sql);
                return $this -> reg = mysqli_fetch_array($res);
              }
          }

          class analisis {

              public function registrar_analisis($conex,$Nom_ana,$Precio_ana,$Tipo)
              {

                $sql="INSERT INTO analisis (Nom_ana,Precio_ana,Tipo)
                      VALUES ('$Nom_ana','$Precio_ana','$Tipo')";
                mysqli_query($conex,$sql);
                require_once 'error_insert.php';
                if(mysqli_affected_rows($conex)>0){echo "El nuevo analisis se ha registrado con exito";} else { echo "No se ha podido registrar el nuevo analisis";}

              }

              public function modificar_analisis($conex,$Cod_ana,$Nom_ana,$Precio_ana,$Tipo)
              {

                $sql="UPDATE analisis SET analisis.Nom_ana='$Nom_ana', analisis.Precio_ana='$Precio_ana', analisis.Tipo='$Tipo' WHERE analisis.Cod_ana ='$Cod_ana'";
                mysqli_query($conex,$sql);
                require_once 'error_update.php';
                if(mysqli_affected_rows($conex)>0){echo "El analisis se ha modificado con exito";} else { echo "No se ha podido modificar el analisis";}

              }

              public function consultar_analisis($conex,$Nom_ana)
              {
                $sql="SELECT * FROM analisis WHERE analisis.Nom_ana ='$Nom_ana'";
                $res= $conex->query($sql);
                return $this -> reg = mysqli_fetch_array($res);

              }


          }

          /*class usuario {

            public function registrar_usuario($conex,$username,$email,$password,$salt,$pregunta,$respuesta)
            {

              $sql="INSERT INTO miembros (usuario,email,password,salt,pregunta,respuesta)
                    VALUES ('$usuario','$email','$password','$salt','$pregunta','$respuesta')";
              $res=mysqli_query($conex,$sql);
              include_once 'error_insert.php';

            }

            public function consultar_usuario($conex,$var)
            {

              $sql="SELECT * FROM miembros ";
              $res=mysqli_query($conex,$sql);
              include_once 'error_select.php';

            }

            public function modificar_usuario($conex,$username,$email,$password,$salt,$pregunta,$respuesta)
            {

              $sql="";
              $res=mysqli_query($conex,$sql);
              include_once 'error_update.php';

            }

          }*/



          class cliente {

                private $reg;

                public function registrar_cliente($conex,$Ced_cliente,$Nom_cliente,$Apelli_cliente,$Contacto,$Telf_cliente,$Dire_cliente)
                {
                   $sql="INSERT INTO cliente (Ced_cliente,Nom_cliente,Apelli_cliente,Contacto,Telf_cliente,Dire_cliente) 
                         VALUES ('$Ced_cliente','$Nom_cliente','$Apelli_cliente','$Contacto','$Telf_cliente','$Dire_cliente')";
                   mysqli_query($conex,$sql);
                   include_once 'error_insert.php';
                   if(mysqli_affected_rows($conex)>0){echo "<center>El nuevo cliente se ha registrado con exito<center>";} else { echo "No se ha podido registrar el nuevo cliente";}


                }

                public function consultar_cliente($conex,$Ced_cliente)
               {

                $sql="SELECT * FROM cliente WHERE cliente.Ced_cliente ='$Ced_cliente'";
                $res=mysqli_query($conex,$sql);
                return $this -> reg = mysqli_fetch_array($res);

                }

               public function modificar_cliente($conex,$Id_cliente,$Ced_cliente,$Nom_cliente,$Apelli_cliente,$Contacto,$Telf_cliente,$Dire_cliente)
               {       

                $sql="UPDATE cliente SET cliente.Ced_cliente='$Ced_cliente',cliente.Nom_cliente='$Nom_cliente',cliente.Apelli_cliente='$Apelli_cliente',cliente.Contacto='$Contacto',cliente.Telf_cliente='$Telf_cliente',cliente.Dire_cliente='$Dire_cliente' WHERE cliente.Id_cliente='$Id_cliente'";
                $res=mysqli_query($conex,$sql);
                include_once 'error_update.php';
                if(mysqli_affected_rows($conex)>0){echo "<center>El cliente se ha modificado con exito<center>";} else { echo "No se ha modificado el cliente";}


                }


          
        }

        class finca {

              public function registrar_finca($conex,$Ced_cliente,$Nom_fin,$Estado,$Municipio,$Direccion)
              {

                $sql="INSERT INTO finca (Ced_cliente,Nom_fin,Estado,Municipio,Direccion)
                      VALUES ('$Ced_cliente','$Nom_fin','$Estado','$Municipio','$Direccion')";
                mysqli_query($conex,$sql);
                require_once 'error_insert.php';
                 if(mysqli_affected_rows($conex)>0){echo "se ha registrado la nueva finca";} else { echo "no se ha podido registrar la nueva finca";}

              }






        }

        class solicitud {

              public function registrar_solicitud($Cod_sol,$Cod_cliente,$Fecha)
              {
                $sql="INSERT INTO solicitud (Cod_sol,Cod_cliente,Fecha)
                      VALUES ('$Cod_sol','$Cod_cliente','$Fecha')";
                $res=mysqli_query($conex,$sql);
                require_once 'error_insert.php';
              }
        }

        

        
        class suelo {

              public function registrar_suelo($conex,$Cod_suelo,$Cod_lab,$Cod_rsuelo,$Tam_lote,$Profundidad,$Carac_terreno,$Inundacion,$Riego,$Criego,$F_toma,$T_vege,$Cultivo,$Edad_cult,$Dis_siembra,$Nro_pl,$Cult_antes,$Rend_cult,$Restos,$fertil,$Fert_cantidad,$Epoca_aplic,$Aplicacion)
              {

                
                $sql="INSERT INTO m_suelo (Cod_suelo,Cod_lab,Cod_rsuelo,Tam_lote,Profundidad,Carac_terreno,Inundacion,Riego,Criego,F_toma,T_vege,Cultivo,Edad_cult,Dis_siembra,Nro_pl,Cult_antes,Rend_cult,Restos,Fertilizante,Fert_cant,Epoca_aplic,Aplicacion) 
                      VALUES ('$Cod_suelo','$Cod_lab','$Cod_rsuelo','$Tam_lote','$Profundidad','$Carac_terreno','$Inundacion','$Riego','$Criego','$F_toma','$T_vege','$Cultivo','$Edad_cult','$Dis_siembra','$Nro_pl','$Cult_antes','$Rend_cult','$Restos','$fertil','$Fert_cantidad','$Epoca_aplic','$Aplicacion')";
                mysqli_query($conex,$sql);
                require_once 'error_insert.php';
                if(mysqli_affected_rows($conex)>0){echo "se ha insertado un registro";} else { echo "no se ha insertado los registro";}
              }


              public function consultar_suelo($conex,$Cod_suelo,$Cod_lab)
              {

                $sql="";
                $res=mysqli_query($conex,$sql);
                include_once 'error_select.php';

              }


              public function modificar_suelo($conex,$Cod_suelo,$Cod_lab,$Cod_rsuelo,$Tam_lote,$Profundidad,$Carac_terreno,$Inundacion,$Riego,$Criego,$F_toma,$T_vege,$Cultivo,$Edad_cult,$Dis_siembra,$Nro_pl,$Cult_antes,$Rend_cult,$Restos,$fertil,$Fert_cantidad,$Epoca_aplic,$Aplicacion)
              {       

                $sql="";
                $res=mysqli_query($conex,$sql);
                include_once 'error_update.php';

              }

        }  

        class solicitud_analisis {



              public function registrar_solicitud_analisis($conex,$Id_sa,$Cod_sol,$Cod_ana,$Cod_suelo)
              {


                $sql="INSERT INTO solicitud_analisis (Id_sa,Cod_sol,Cod_ana,Cod_suelo)
                      VALUES ('$Id_sa','$Cod_sol','$Cod_ana','$Cod_suelo')";
                mysqli_query($conex,$sql);

                if(mysqli_affected_rows($conex)>0){echo "se ha insertado un registro solicitud_analisis";} else { echo "no se ha insertado los reeeee";}
              }

            }
        

        class fito {


            public function registrar_fito($conex,$Cod_fito,$Cod_lab,$Tipo_fito,$Descrip_fito,$Cult_fito,$Edad_fito,$F_coleccion,$Pobl_cercana,$Id_microorg,$sintoma,$F_sintomas,$Causa,$Tipo_plant,$Otro_tipo,$Tam_lote,$Nro_plant,$Nro_subm,$dist_f,$Origen_sem,$Pres_microorg,$Dist_planafect,$Part_afect,$Riego,$Topografia,$Text_sue,$Composicion,$Hum_sue,$Drenaje,$practicas,$Produc_dosis,$control,$Produc_dosisb,$Cult_ant,$Cond_agroclima,$Observaciones)
            {
               $sql="INSERT INTO m_fito (Cod_fito,Cod_lab,Tipo_fito,Descrip_fito,Cult_fito,Edad_fito,F_coleccion,Pobl_cercana,Id_microorg,Sintomas,F_sintomas,Causa,Tipo_plant,Otro_tipo,Tam_lote,Nro_plant,Nro_subm,dist_f,Origen_sem,Pres_microorg,Dist_planafect,Part_afect,Riego,Topografia,Text_sue,Composicion,Hum_sue,Drenaje,Practicas,Produc_dosis,Control,Produc_dosisb,Cult_ant,Cond_agroclima,Observaciones) 
                     VALUES ('$Cod_fito','$Cod_lab','$Tipo_fito','$Descrip_fito','$Cult_fito','$Edad_fito','$F_coleccion','$Pobl_cercana','$Id_microorg','$sintoma','$F_sintomas','$Causa','$Tipo_plant','$Otro_tipo','$Tam_lote','$Nro_plant','$Nro_subm','$dist_f','$Origen_sem','$Pres_microorg','$Dist_planafect','$Part_afect','$Riego','$Topografia','$Text_sue','$Composicion','$Hum_sue','$Drenaje','$practicas','$Produc_dosis','$control','$Produc_dosisb','$Cult_ant','$Cond_agroclima','$Observaciones')";
               $res=mysqli_query($conex,$sql);
               include_once 'error_insert.php';

            }
            

            public function consultar_fito($conex,$Cod_fito,$Cod_lab)
            {

              $sql="";
              $res=mysqli_query($conex,$sql);
              include_once 'error_select.php';

            }

            public function modificar_fito($conex,$Cod_fito,$Cod_lab,$Tipo_fito,$Descrip_fito,$Cult_fito,$Edad_fito,$F_coleccion,$Pobl_cercana,$Id_microorg,$sintoma,$Malformacion,$F_sintomas,$Causa,$Tipo_plant,$Tam_lote,$Nro_plant,$Nro_subm,$dist_f,$Origen_sem,$Pres_microorg,$Dist_planafect,$Part_afect,$Riego,$Topografia,$Text_sue,$Hum_sue,$Uso_quimico,$Contrl_male,$Cult_ant,$Cond_agroclima,$Obervaciones)
            {       

              $sql="";
              $res=mysqli_query($conex,$sql);
              include_once 'error_update.php';

            }


        }

        
        class r_suelo {

            public function registrar_r_suelo($conex)
            {

              $sql="";
              $res=mysqli_query($conex,$sql);
              include_once 'error_insert.php';

            }

            public function consultar_r_suelo($conex)
            {

              $sql="";
              $res=mysqli_query($conex,$sql);
              include_once 'error_select.php';

            }

            public function modificar_r_suelo($conex)
            {

              $sql="";
              $res=mysqli_query($conex,$sql);
              include_once 'error_update.php';

            }

        }

        class r_fito {

            public function registrar_r_fito($conex)
            {

              $sql="";
              $res=mysqli_query($conex,$sql);
              include_once 'error_insert.php';

            }

            public function consultar_r_fito($conex)
            {

              $sql="";
              $res=mysqli_query($conex,$sql);
              include_once 'error_select.php';

            }

            public function modificar_r_fito($conex)
            {

              $sql="";
              $res=mysqli_query($conex,$sql);
              include_once 'error_update.php';

            }

        }

?>        
