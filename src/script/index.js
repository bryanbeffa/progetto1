var signUpButton = document.getElementById("signUpButton");
var divMask = document.getElementById("divMask");
var preload = document.getElementById("preload");

//centro la scritta benvenuto
centerPreloadAnimation();
centerDivMask();

setTimeout(preloadAnimation, 3000)

//metodo che c'entra la maschera che contiene il bottone e nasconde il il preload screen
function centerDivMask(){
	var divMaskHeight = divMask.offsetHeight;
	var windowHeight = window.innerHeight;
	var preloadAnimationHeight = preload.offsetHeight;
	
	divMask.style.marginTop = (windowHeight-divMaskHeight-preloadAnimationHeight)/2 + "px";
}

//metodo che fa scomparire gradualmente la schermata di benvenuto
function preloadAnimation(){
	$(document).ready(function(){
	    $("#preload").fadeOut(4000)
	});
	setTimeout(fadeDivMask, 4000)
}

//Metodo che fa comparire gradualmente il divMask.
function fadeDivMask(){
	preload.marginTop = "none";
	$(document).ready(function(){
	    $("#divMask").fadeIn(3000)
	});
}

//centro il preloadscreen verticalmente
function centerPreloadAnimation(){
	var windowHeight = window.innerHeight;
	var preloadAnimationHeight = preload.offsetHeight;

	preload.style.marginTop = (windowHeight-preloadAnimationHeight)/2 + "px";
}




