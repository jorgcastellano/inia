var act_eliminar = false; //No ah clickeado

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

function confirmar_accion(a){
  if(cambio1==true){
      var confirmar;
      confirmar = confirm("¿Esta seguro(a) que desea "+a);
      if (confirmar == false) {
        act_eliminar = false;
      }
      cambio1 = false;
  } else if(cambio1==false) {
      alert("no hay cambios");
    }
}

function iniciar_act_eliminar(cont){
      var n = parseInt(cont);
      act_eliminar[n] = false;
}

function confirmar_accion_2(msj, cont){
      var n = parseInt(cont);
      var confirmar = confirm("¿Esta seguro(a) que desea " + msj);
      if (confirmar) {
        this.id = true;
      }
}
//function confirmar_accion_2(a,b) {
//  for(var i=0;i<b;i++){ act_eliminar[i]=false;  }
//  var evento = document.getElementById("accion_buttom");
//  evento.addEventListener("click",function() {escuchador(evento.valor);});
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

function menuOn(barrasMenu) {
  var profile_styles = document.getElementById("profile_styles");
  //var stilosBarras = "-webkit-transition: 1s;-moz-transition: 1s;-o-transition: 1s;transition: 1s;";
  if(profile_styles.style.display == "none") {
    profile_styles.style.display = "block";
    barrasMenu.className = "fa fa-toggle-up fa-fw";
  } else if (profile_styles.style.display = "block") {
    profile_styles.style.display = "none";
    barrasMenu.className = "fa fa-bars fa-fw";
  }
}
function scriptMenu(barrasMenu) {
  barrasMenu.addEventListener("click", function(){menuOn(barrasMenu);});
}
