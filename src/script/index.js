var signUpButton = document.getElementById("signUpButton");
var divMask = document.getElementById("divMask");

centreDivMask();

//metodo che c'entra la maschera che contiene il bottone
function centreDivMask(){
	var divMaskHeight = divMask.offsetHeight;
	var availHeight = screen.availHeight;
	
	divMask.style.marginTop = (availHeight-divMaskHeight)/2 + "px";
}
