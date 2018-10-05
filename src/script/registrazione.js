		//variabile che contiene l'elemento 
		var formMask = document.getElementById("formMask");
		//variabile contenete la lista degli input
		var inputList = document.getElementsByTagName("input");

		centreFormMask();
		setValues();

		//metodo che setta i valori in caso di ritorno dalla pagina di riassunto dati
		function setValues(){
			var queryString = decodeURIComponent(window.location.search); //parsing
			queryString = queryString.substring(1);
			var queries = queryString.split("&");
			for (var i = 0; i < inputList.length-2; i++){
				//se la variabile è undefined non eseguo il codice
				if(queries[i] != undefined){
					var realValue = queries[i].split("=");
					inputList[i].value = realValue[realValue.length-1];
				}
			}
		}

		//metodo che c'entra la maschera che contiene il bottone
		function centreFormMask(){
			var formMaskHeight = formMask.offsetHeight;
			var availHeight = window.innerHeight;
			
			formMask.style.marginTop = (availHeight-formMaskHeight)/2 + "px";
		}

		//metodo che cancella tutti i dati inseriti
		function deleteData(){
			//numero di input da cancellare meno i 2 bottoni finali
			var inputLength = inputList.length-2;
			for (var i = 0; i <  inputLength; i++) {
				inputList[i].value = "";
			}
		}

		//metodo che riceve in un array quali sono i campi principali (obbligatori)
		function getMainInputs(){
			var name = document.getElementById("name");
			var surname = document.getElementById("surname");
			var date = document.getElementById("date");
			var address = document.getElementById("address");
			var civicNumber = document.getElementById("civicNumber");
			var city = document.getElementById("city");
			var nap = document.getElementById("nap");
			var phoneNumber = document.getElementById("phoneNumber");
			var email = document.getElementById("email");
			var gener = document.getElementById("gener");

			var mainInputs = [name, surname, date, address, civicNumber, city, nap, phoneNumber, email,gener]; 
			return mainInputs;
		}

		//metodo che controlla che tutti i campi principali (obbligatori) sono stati compilati
		function checkMainInputs(){
			var mainInputs = getMainInputs();
			for (var i = 0; i <= mainInputs.length-1; i++) {
				if(mainInputs[i].value == null || mainInputs[i].value == ""){
					return false;
				}
			}
			return true;
		}

		//metodo che abilita abilita il funzionamento del bottone avanti se tutti i campi obbligatori sono compilati
		function enableNextButton(){
			if(checkMainInputs()){
				if(confirm("Sicuro di voler procedere?")){
					var queryString = "?name=" + inputList[0].value 
					+ "&surname=" + inputList[1].value 
					+ "&date=" + inputList[2].value
					+ "&address=" + inputList[3].value
					+ "&civicNumber=" + inputList[4].value
					+ "&city=" + inputList[5].value
					+ "&nap=" + inputList[6].value
					+ "&phoneNumber=" + inputList[7].value
					+ "&email=" + inputList[8].value
					+ "&gener=" + inputList[9].value
					+ "&hobby=" + inputList[10].value
					+ "&profession=" + inputList[11].value;
					window.location.href = 'riassuntoDati.php' + queryString;
				}
			}else{
				alert("Devi compilare tutti i campi obbligatori")
			}
		}

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

		//metodo che serve a controllare i valori degli input di tipo testo con gli stessi criteri. Es nome e cognome.
		function checkText(id){
			value = inputList[id].value;
			if(value != null && value.length > 0 && value.length <= 50){
				inputList[id].style.border = "2px solid lightgreen";
			}else{
				inputList[id].style.border = "2px solid red";
			}
		}