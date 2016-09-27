function seleccionar_todo(){
   for (i=0; i<document.f1.elements.length; i++)
      if(document.f1.elements[i].type == "checkbox")
         document.f1.elements[i].checked=1
}

function deseleccionar_todo(){
   for (i=0; i<document.f1.elements.length; i++)
      if(document.f1.elements[i].type == "checkbox")
         document.f1.elements[i].checked=0
}
var act_eliminar = 0; //No ah clickeado
function aviso_eliminar(x) {
	var confirmar;
	confirmar = confirm("Esta seguro(a) que desea eliminar " + x + "\nRecuerda, los cambios son irreversibles");
	if (confirmar) {
		act_eliminar = 1;
	}
	else {
		act_eliminar = 2;
	}
}
function enviar_form_cliente() {
	if (act_eliminar == 2) {
		return false;
	}
	else if (act_eliminar == 1) {
		return true;
	}
	else {
		return true;
	}
}

function busquedas_instantaneas() {
	var busqueda = document.getElementById('buscar');
    var table = document.getElementById("tabla").tBodies[0];

    buscaTabla = function(){
      texto = busqueda.value.toLowerCase();
      var r=2;
      while(row = table.rows[r++])
      {
        if ( row.innerText.toLowerCase().indexOf(texto) !== -1 )
          row.style.display = null;
        else
          row.style.display = 'none';
      }
    }

    busqueda.addEventListener('keyup', buscaTabla);
}

function menuOn(profile_styles) {
  var profile_styles = document.getElementById("profile_styles");
  var stilosBarras = "-webkit-transition: 1s;-moz-transition: 1s;-o-transition: 1s;transition: 1s;";
  if(profile_styles.style.display == "none") {
    profile_styles.style.display = "block";
    barrasMenu.style = stilosBarras;
    barrasMenu.className = "fa fa-toggle-up fa-fw";
  } else if (profile_styles.style.display = "block") {
    profile_styles.style.display = "none";
    barrasMenu.className = "fa fa-bars fa-fw";
    barrasMenu.style = stilosBarras;
  }
}
function scriptMenu(barrasMenu) {
  barrasMenu.addEventListener("click", function(){menuOn(barrasMenu);});
}
