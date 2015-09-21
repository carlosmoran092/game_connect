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

		input_obj.value = parseInt(input_obj.value) + 1; 
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