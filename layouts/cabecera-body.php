
		<?php
			echo '<header>
			    <section>   
					<img src="../../imgs/logo_new.jpg" />
			    </section>
			</header>
			';

			if ($logeado == 'On' AND $_SESSION['privilegios'] == 1) {
				echo '<ul class="menuHorizontal">';
				$array1 = array();
				$array2 = array();
				$menu2 = new controladorMenu();
            	$array1 = $menu2->menuNivel1();

				for ($i=0; $i < count($array1); $i++) {
            		echo $array1[$i];
            		$array2 = $menu2->menuNivel2($i);
            		if (!empty($array2)) {
            			echo '<ul>';
            			for ($x=0; $x < count($array2); $x++)
            				echo $array2[$x].'</li>';
            			echo '</ul>';
            		}
            		echo '</li>';
				}
				echo '</ul>';
			}
			elseif (($logeado == 'On') AND ($_SESSION['privilegios'] == 3)) {
				echo '<ul class="menuHorizontal">';
				$array1 = array();
				$array2 = array();
				$menu3 = new controladorMenu();
            	$array1 = $menu3->menuNivel13();

				for ($i=0; $i < count($array1); $i++) {
            		echo $array1[$i];
            		$array2 = $menu3->menuNivel14($i);
            		if (!empty($array2)) {
            			echo '<ul>';
            			for ($x=0; $x < count($array2); $x++)
            				echo $array2[$x].'</li>';
            			echo '</ul>';
            		}
            		echo '</li>';
				}
				echo '</ul>';
			}
        ?>