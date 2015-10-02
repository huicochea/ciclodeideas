$(document).ready(function(){

	$(function() {
    	$( ".datepicker" ).datepicker(
        	{ dateFormat: 'yy-mm-dd' }
      	);
  	});


});//Termina document ready


function validar_evento(){
	if (document.getElementById("name").value.length == 0) { 
        alert('¡Escribe un nombre para el evento!'); 
        return false;
  	}

	if (document.getElementById("f_ini").value.length == 0) { 
        alert('¡Selecciona la fecha de inicio del evento!'); 
        return false;
  	}

	if (document.getElementById("f_fin").value.length == 0) { 
        alert('¡Selecciona la fecha fin del evento!'); 
        return false;
  	}  	

}


function validar_usuario(){
  if (document.getElementById("nombreusr").value.length == 0) { 
        alert('¡Escribe un nombre con el cual se accedera al sistema!'); 
        return false;
    }

  if (document.getElementById("pass").value.length == 0) { 
        alert('¡Introduce una contraseña!'); 
        return false;
    }

  if (document.getElementById("nombreusu").value.length == 0) { 
        alert('¡Escribe el nombre de la persona!'); 
        return false;
    }   


  if (document.getElementById("apellidos").value.length == 0) { 
        alert('¡Escribe los apellidos de la persona!'); 
        return false;
    }   


  if (document.getElementById("perfil_i").value == "*") { 
        alert('¡Selecciona el tipo de perfil!'); 
        return false;
    }   


}



function validar_codigo(){

	if (document.getElementById("pulsera").value.length == 0) { 
        alert('¡Introduce el código de la pulsera!'); 
        return false;
  	}


	if (document.getElementById("tipo_entrada").value != '1') { 

		if (document.getElementById("dias_valido").value.length == 0) { 
	        alert('¡Selecciona el día que estara activo este codigo!'); 
	        return false;
	  	}

        
  	}


	if (document.getElementById("nombre_asociado").value.length == 0) {         
        //return true;
  	}
  	else{//Si el campo del nombre no esta vacio, pedimos todos los demas datos que son obligatoris

		if (document.getElementById("apaterno").value.length == 0) { 
	        alert('¡Introduce el apellido paterno!'); 
	        return false;
	  	}

		if (document.getElementById("amaterno").value.length == 0) { 
	        alert('¡Introduce el apellido materno!'); 
	        return false;
	  	}

	  	if (document.getElementById("edad").value.length == 0) { 
	        alert('¡Introduce la edad!'); 
	        return false;
	  	}	 

	  	if (document.getElementById("estado").value == '*') { 
	        alert('¡Selecciona un estado!'); 
	        return false;
	  	}	  	

  	}//Termina validar asociado
  	$("#pulsera").removeAttr("disabled");
}




function eliminar_evento(obj){
    var r = confirm("Se eliminara el evento: "+obj.name);
    if(r){
      window.location='control.php?mod=eventos&acc=del&id_evento='+obj.id;
    }    
}      

function eliminar_codigo(obj){
    var r = prompt("Para eliminar el código: "+obj.name+" \n Ingresa la clave: ");
    if(r=='nomelase'){
      window.location='control.php?mod=codigos&acc=del&id_codigo='+obj.id;
    }    
}      

function eliminar_usuario(obj){
    var r = prompt("Para eliminar el usuario: "+obj.name+" \n Ingresa la clave: ");
    if(r=='nomelase'){
      window.location='control.php?mod=usuarios&acc=del&idusu='+obj.id;
    }    
}      





function isNumberKey(evt)
{
   var charCode = (evt.which) ? evt.which : event.keyCode
   if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;

   return true;
}


function cambiacolor_over(celda){ celda.style.backgroundColor="#ffff30" } 
function cambiacolor_out(celda){ celda.style.backgroundColor="#ffffff" }


 function doSearch() 
    { var tableReg = document.getElementById('datos'); var searchText = document.getElementById('searchTerm').value.toLowerCase(); var cellsOfRow=""; var found=false; var compareWith=""; 
    // Recorremos todas las filas con contenido de la tabla 
    for (var i = 1; i < tableReg.rows.length; i++) { cellsOfRow = tableReg.rows[i].getElementsByTagName('td'); found = false; 
    // Recorremos todas las celdas 
    for (var j = 0; j < cellsOfRow.length && !found; j++) { compareWith = cellsOfRow[j].innerHTML.toLowerCase(); 
    // Buscamos el texto en el contenido de la celda 
    if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1)) { found = true; } } if(found) { tableReg.rows[i].style.display = ''; } 
    else { 
    // si no ha encontrado ninguna coincidencia, esconde la 
    // fila de la tabla 
    tableReg.rows[i].style.display = 'none'; } } } 