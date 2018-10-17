		//variabile che contiene l'elemento 
		var formMask = document.getElementById("formMask");
		//variabile contenete la lista degli input
		var inputList = document.getElementsByTagName("input");
		//variabile contenente il valore del genere, valore di default M
		var genderValue = "M";

		centreFormMask();

		//metodo che setta i valori in caso di ritorno dalla pagina di riassunto dati
		function setValues(){
			var queryString = decodeURIComponent(window.location.search); //parsing
			queryString = queryString.substring(1);
			var queries = queryString.split("&");
			for (var i = 0; i < inputList.length-2; i++){
				//se la variabile è undefined non eseguo il codice 
				if(queries[i] != undefined){
					var realValue = queries[i].split("=");
					//salto l'input del genere
					if(i > 8){
						inputList[i+2].value = realValue[realValue.length-1];						
					}else{
						inputList[i].value = realValue[realValue.length-1];	
					}
				}
			}
		}

		//metodo che c'entra la maschera che contiene il bottone
		function centreFormMask(){
			var formMaskHeight = formMask.offsetHeight;
			var availHeight = window.innerHeight;
			
			formMask.style.marginTop = (availHeight-formMaskHeight)/2 + "px";
		}

		//metodo che cancella tutti i dati e viene richiamato quando carica la pagina
		function loadPage(){
			//numero di input da cancellare meno i 2 bottoni finali
			var inputLength = inputList.length-2;
			for (var i = 0; i <  inputLength; i++) {
				inputList[i].value = "";
				inputList[i].style.borderBottom = "0.2vw solid white";
			}
			//seleziono il radio button M
			document.getElementById('male').checked = "checked";
		}

		//metodo che cancella tutti i dati inseriti
		function deleteData(){
			if(confirm("Sicuro di voler cancellare tutti i dati?")){
				//numero di input da cancellare meno i 2 bottoni finali
				var inputLength = inputList.length-2;
				for (var i = 0; i <  inputLength; i++) {
					inputList[i].value = "";
					inputList[i].style.borderBottom = "0.2vw solid white";
				}
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

			var mainInputs = [name, surname, date, address, civicNumber, city, nap, phoneNumber, email]; 
			return mainInputs;
		}

		//metodo che controlla che tutti i campi principali (obbligatori) sono stati compilati
		function checkMainInputs(){
			var mainInputs = getMainInputs();
			/* Controllo tutti che tutti gli input abbiano un valore valido. 
			   Il valore del campo genere non viene controllato perché non può mai essere non valido
			*/
			if(checkText(0) && checkText(1)){
				if(checkDate(2) && checkText(3)){
					if(checkCivicNumber(4) && checkText(5)){
						if(checkNap(6) && checkPhoneNumber(7)){
							if(checkEmail(8)){
								return true;
							}
						}
					}
				}
			}
			return false;
		}

		//metodo che abilita abilita il funzionamento del bottone avanti se tutti i campi obbligatori sono compilati e invia i valori alla pagina di riassunto
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
					+ "&gener=" + genderValue
					+ "&hobby=" + inputList[12].value
					+ "&profession=" + inputList[13].value;
					window.location.href = 'riassuntoDati.php' + queryString;
				}
			}else{
				alert("Devi compilare tutti i campi obbligatori")
			}
		}

		//metodo che controlla se il numero civico è valido
		function checkCivicNumber(id){
			var value = inputList[id].value;
			var regex = /^[a-zA-Z0-9]+$/;
			var civicNumber = regex.test(value);

			if(civicNumber && value.length <= 4 && value.length > 0 && value != 0){
				inputList[id].style.borderBottom = "0.2vw solid green";
				return true;
			}
			inputList[id].style.borderBottom = "0.2vw solid red";
			return false;
		}

		//metodo che serve a controllare i valori degli input di tipo testo con gli stessi criteri. Es nome e cognome, città, via.
		function checkText(id){
			var text = inputList[id].value;
			text = text.trim();
			var regex = /[a-zA-Z]+$/;
			if(regex.test(text) && text.length <= 50){
				inputList[id].style.borderBottom = "0.2vw solid green";
				return true;
			}
			inputList[id].style.borderBottom = "0.2vw solid red";
			return false;
		}

		//metodo che controlla che sia stata inserita una data corretta
		function checkDate(id){
			//salvo i millisecondi della data odierna
			var date = new Date();
			var userDate = new Date(inputList[id].value);

			//controllo che la data non sia del futuro e che il valore non sia nullo
			if(date.getTime()-userDate.getTime()>0 && !isNaN(userDate)) {
				inputList[id].style.borderBottom = "0.2vw solid green";
				return true;
			}
			inputList[id].style.borderBottom = "0.2vw solid red";
			return false;
		}

		//Metodo che serve a controllare che il campo nap
		function checkNap(id){
			//controllo che il numero sia composto da 4 cifre
			var nap = inputList[id].value;
			var regex = /^[0-9]+$/;
			var isNumber = regex.test(nap);
			if(isNumber && nap.length<6 && nap.length>3 ){
				inputList[id].style.borderBottom = "0.2vw solid green";
				return true;
			}
			inputList[id].style.borderBottom = "0.2vw solid red";
			return false;
		}

		//metodo che controllo che il numero di caratteri del campo hobby non sia superiore a 500 caratteri
		function checkHobby(id){
			var hobby = inputList[id].value;
			if(hobby.length <= 500){
				inputList[id].style.borderBottom = "0.2vw solid green";
				return true;
			}
			inputList[id].style.borderBottom = "0.2vw solid red";
			return false;
		}

		//metodo che controllo che il numero di caratteri del campo profession non sia superiore a 500 caratteri
		function checkProfession(id){
			var profession = inputList[id].value;
			if(profession.length <= 500){
				inputList[id].style.borderBottom = "0.2vw solid green";
				return true;
			}
			inputList[id].style.borderBottom = "0.2vw solid red";
			return false;
		}

		//metodo che serve a settare il valore del campo genere
		function setGender(value){
			genderValue = value;
		}

		//metodo che serve a controllare la sintassi dell'email
		function checkEmail(id){
			var email = inputList[id].value;
			var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			//controllo se l'email è valida
			if(regex.test(email)){
				inputList[id].style.borderBottom = "0.2vw solid green";
				return true;
			}
			inputList[id].style.borderBottom = " 0.2vw solid red";
			return false;
		}

		//metodo che controlla che il campo numero di telefono abbia solo cifre e lo formatta
		function checkPhoneNumber(id){
			var number = inputList[id].value;
			number = number.trim();
			var regex = /^[0-9 +-]+$/;
			//controllo che il numero sia composto da almeno 10 caratteri e massimo 30. Si accettano "+", spazi e "-"
			if(regex.test(number)){
				inputList[id].style.borderBottom = "0.2vw solid green";
				return true;
			}
			inputList[id].style.borderBottom = " 0.2vw solid red";
			return false;
		}