//metodo che controlla se il numero civico è valido
function setCivicNumber(){
	var value = document.getElementById("civicNumber").value;
			//controllo che sia un numero a 4 cifre
			if(value.length < 5){
				//controllo che sia un numero intero
				for (var i = 0; i < value.length; i++) {
					if(!Number.isInteger(parseInt(value[i]))){
						document.getElementById("civicNumber").value = null;
						document.getElementById("civicNumber").style.border = "2px solid red";
						break;
					}
					document.getElementById("civicNumber").style.border = "2px solid lightgreen";
				}
			}else{
				document.getElementById("civicNumber").value = null;
				document.getElementById("civicNumber").style.border = "2px solid red";		
			}
		}