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

var cambio1 = false;//No hay cambios
function cambio(){
    cambio1 = true;
    alert("hay cambios");
}

var act_eliminar = true; //No ah clickeado
function confirmar_accion(a){
  if(cambio1==true){
      var confirmar;
      confirmar = confirm("¿Esta seguro(a) que desea "+a);
      if (confirmar == false) {
        act_eliminar = false;
      }
  } else if(cambio1==false) {
      alert("no hay cambios");
    }
}
//function confirmar_accion(a) {

  //  var evento = document.getElementById("accion_buttom");
  //  evento.addEventListener("click",function() {escuchador(a);});


//}

function enviar_form_accion() {
	if (act_eliminar == true) {
		return true;
	} else {
    act_eliminar = true;
    return false;
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
<<<<<<< HEAD
=======

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
>>>>>>> c4879358fe749705535df6d83382322e0f69267b
