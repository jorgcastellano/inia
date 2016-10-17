var act_eliminar = []; //Array vacio listo para inicializarlo

//Estas dos funciones son las que se deben arreglar david
function iniciar_act_eliminar(b) {
  for(var i=0; i < b; i++){
    act_eliminar[i]=false;
  }
}
function cambio_eliminar(n){
      var n = parseInt(n);
      var confirmar;
      confirmar = confirm("¿Esta seguro(a) que desea hacerlo?");
      if (confirmar == true) {
        act_eliminar[n] = true;
      }
      //debugger;
      console.log(act_eliminar);
}
//Hasta aqui david

//valida los envios de los formularios al modificar o eliminar productos o fincas
function enviar_form_accion() {

	if (act_eliminar == true) {
		return true;
	} else {
    act_eliminar = true;
    return false;
  }
}

//Motor de busquedas para inventario en venta
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

//Funcion para activar o desactivar el sub-menu de config y salida
function menuOn(barrasMenu) {
  var profile_styles = document.getElementById("profile_styles");
  if(profile_styles.style.display == "none") {
    profile_styles.style.display = "block";
    barrasMenu.className = "fa fa-toggle-up fa-fw";
  } else if (profile_styles.style.display = "block") {
    profile_styles.style.display = "none";
    barrasMenu.className = "fa fa-bars fa-fw";
  }
}
function menuOff(barrasMenu) {
  var profile_styles = document.getElementById("profile_styles");
  if (profile_styles.style.display = "block") {
    profile_styles.style.display = "none";
    barrasMenu.className = "fa fa-bars fa-fw";
  }
}

//Funcion para validar si clickeo en los opciones
function confirmar_accion(){

}

function comparador(){
      alert("la funcion ha sido invocada");
      var i = 0;
      var nombre = document.getElementById("Nom_produ");
    //  for(i=0;i<cantidad;i++)
      //{
        //if(nombres[i]==nombre)
      //  {
        //  alert("nombre ya existe");
        //}
      //}

}
