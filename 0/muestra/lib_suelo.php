<?php

			$g = '-';
            $F_toma = $Dia.$g.$Mes.$g.$Ano;		

            $fertil = '';
            $s = '|';
            foreach ($_POST['Fertilizante'] as $id){  if($fertil == ''){ $fertil =$id; }else{ $fertil .= $s.$id; } }


?>