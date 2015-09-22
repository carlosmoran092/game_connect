window.onload = function() {

};



function accion_btn(obj){

	var accion = obj.getAttribute("data-rel");

	switch(accion){

		case 'ingresar': 	loadXMLDoc('registro');

							break;

		case 'terminos': 	mostrar_terminos();

							break;

		default: break;

	}

}

function aumentar(obj){

	var accion = obj.getAttribute("data-rel");



	if(accion == "edad"){

		var input_obj = document.getElementById("edad");

		if(input_obj.value < 12){

		input_obj.value = parseInt(input_obj.value) + 1; 

		}

	}

	else if(accion == "estrato"){

		var input_obj = document.getElementById("estrato");

		if(input_obj.value < 6){

			input_obj.value = parseInt(input_obj.value) + 1;

		}

	}

}

function disminuir(obj){

	var accion = obj.getAttribute("data-rel");



	if(accion == "edad"){

		var input_obj = document.getElementById("edad");



		if(input_obj.value > 0){

			input_obj.value = parseInt(input_obj.value) - 1; 

		}

	}

	else if(accion == "estrato"){

		var input_obj = document.getElementById("estrato");



		if(input_obj.value > 1){

			input_obj.value = parseInt(input_obj.value) - 1; 

		} 

	}

}

function loadXMLDoc(html){

	var preloader = document.getElementById('preloader');

	preloader.style.display = "block";

	var xmlhttp;

	if (window.XMLHttpRequest){

		xmlhttp=new XMLHttpRequest();

	}

	else{

		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

	}

	xmlhttp.onreadystatechange=function(){

		if (xmlhttp.readyState==4 && xmlhttp.status==200){

			preloader.style.display = "none";

			document.getElementById("contenido").innerHTML=xmlhttp.responseText;

		}

	}

	xmlhttp.open("GET","html/" + html + ".html",true);

	xmlhttp.send();

}

function loadXMLDoc(html){

	var preloader = document.getElementById('preloader');

	preloader.style.display = "block";

	var xmlhttp;

	if (window.XMLHttpRequest){

		xmlhttp=new XMLHttpRequest();

	}

	else{

		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

	}

	xmlhttp.onreadystatechange=function(){

		if (xmlhttp.readyState==4 && xmlhttp.status==200){

			preloader.style.display = "none";

			document.getElementById("contenido").innerHTML=xmlhttp.responseText;

		}

	}

	xmlhttp.open("GET","html/" + html + ".html",true);

	xmlhttp.send();

}

function mostrar_registro(){

	var formularioBg = document.getElementById("formulario-bg");

	var formulario = document.getElementById("formulario");

	var terminos =  document.getElementById("terminos");

	var texto = document.getElementById("terminos-text");



	formularioBg.style.display = "inline";

	formulario.style.display = "block";

	terminos.style.display = "none";

	terminos.style.zIndex = "-1";

	texto.style.display = "none";

	texto.style.zIndex = "-1";

}

function mostrar_terminos(){

	var formularioBg = document.getElementById("formulario-bg");

	var formulario = document.getElementById("formulario");

	var terminos =  document.getElementById("terminos");

	var texto = document.getElementById("terminos-text");



	formularioBg.style.display = "none";

	formulario.style.display = "none";

	terminos.style.display = "inline";

	terminos.style.zIndex = "2";

	texto.style.display = "block";

	texto.style.zIndex = "2";

}


/**
	21/09/15
	by: Carlos Moran
	- Registro de valores de form
	- Envio de datos por ajax	

 */
var registro = new Object();
function registerValues () {
	nom_padre  = document.getElementById("nom_padre").value;
	nom_mail   = document.getElementById("nom_mail").value;
	nom_hijo   = document.getElementById("nom_hijo").value;
	genero     = document.querySelector('.contenido__radio-genre:checked').value;
	edad       = document.getElementById("edad").value;
	estrato    = document.getElementById("estrato").value;
	terminos   = document.getElementById('terminos_check').checked;

	if(terminos == true && nom_padre != null && nom_mail != null && 
		genero != null && edad != null && estrato != null && terminos != null){

		registro.padre   =nom_padre;
		registro.mail    =nom_mail;
		registro.hijo    =nom_hijo;
		registro.genero  =genero;
		registro.edad    =edad;
		registro.estrato =estrato;
		saveRegister();

	}else{console.log('No se ha llenado todos los campos');alert("Debe llenar todos los campos");}
	//console.log("nombre del padre: "+nom_padre+" mail: "+nom_mail+" nombre del hijo: "+nom_hijo+" genero del infante: "+genero+" edad: "+edad+" estrato social: "+estrato+"");

}

function saveRegister(){
	console.log("Objeto js creado:  "+registro);
	registroJson = JSON.stringify(registro);

	$.post('server/registro.php', {registro: registroJson},
	    function(respuesta) {
	       
		}).error(function(){
	        console.log('Error al ejecutar la petición');
	    });
}