var signUpButton = document.getElementById("signUpButton");
var divMask = document.getElementById("divMask");

centerDivMask();

setTimeout(fadeDivMask, 1000);

//metodo che c'entra la maschera che contiene il bottone
function centerDivMask(){
	var divMaskHeight = divMask.offsetHeight;
	var windowHeight = window.innerHeight;
	
	divMask.style.marginTop = (windowHeight-divMaskHeight)/2 + "px";
	divMask.style.marginBottom = (windowHeight-divMaskHeight)/2 + "px";
}

//Metodo che fa comparire gradualmente il divMask.
function fadeDivMask(){
	divMask.style.display = "none";
	divMask.style.visibility = "visible";
	$(document).ready(function(){
	    $("#divMask").fadeIn(2000)
	});
}



