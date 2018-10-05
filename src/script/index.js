setTimeout(centreDivMask, 3000)

var signUpButton = document.getElementById("signUpButton");
var divMask = document.getElementById("divMask");
var preload = document.getElementById("preload");

//metodo che c'entra la maschera che contiene il bottone e nasconde il il preload screen
function centreDivMask(){
	preload.style.display = "none";
	divMask.style.display = "block";

	var divMaskHeight = divMask.offsetHeight;
	var availHeight = screen.availHeight;
	
	divMask.style.marginTop = (availHeight-divMaskHeight)/2 + "px";
}

//
function fadePreloadScreen(){

	centreDivMask();
}


