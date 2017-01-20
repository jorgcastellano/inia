Propiedades de un checkbox
Las propiedades que tiene un checkbox son las siguientes.
checked 
Informa sobre el estado del checkbox. Puede ser true o false.

defaultChecked 
Si está chequeada por defecto o no.

value 
El valor actual del checkbox.

También tiene las propiedades form, name, type como cualquier otro elemento de formulario.

Métodos del checkbox
Veamos la lista de los métodos de un checkbox.
click() 
Es como si hiciésemos un click sobre el checkbox, es decir, cambia el estado del checkbox.

blur() 
Retira el foco de la aplicación del checkbox.

focus() 
Coloca el foco de la aplicación en el checkbox.

Para ilustrar el funcionamiento de las checkbox vamos a ver una página que tiene un checkbox y tres botones. Los dos primeros para mostrar las propiedades checked y value y el tercero para invocar a su método click() con objetivo de simular un click sobre el checkbox.

<html> 
<head> 
   	<title>Ejemplo Checkbox</title> 
<script> 
function alertaChecked(){ 
   	alert(document.miFormulario.miCheck.checked) 
} 
function alertaValue(){ 
   	alert(document.miFormulario.miCheck.value) 
} 
function metodoClick(){ 
   	document.miFormulario.miCheck.click() 
} 
</script> 
</head>

<body> 
<form name="miFormulario" action="mailto:promocion@guiarte.com" enctype="text/plain"> 
<input type="checkbox" name="miCheck"> 
<br> 
<br> 
<input type="button" value="informa de su propiedad checked" onclick="alertaChecked()"> 
<input type="button" value="informa de su propiedad value" onclick="alertaValue()"> 
<br> 
<br> 
<input type="button" value="Simula un click" onclick="metodoClick()"> 
</form> 
</body> 
</html>

