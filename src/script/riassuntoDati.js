		//variabile che contiene l'elemento 
		var formMask = document.getElementById("formMask");
		//variabile contenete la lista dei input in cui inserire i valori
		var inputList = document.getElementsByTagName("input");

		centreFormMask();
		printValues();

		//metodo che stampa i valori dei campi
		function printValues(){
			var queryString = decodeURIComponent(window.location.search);
			queryString = queryString.substring(1);
			var queries = queryString.split("&");
			for (var i = 0; i < queries.length; i++){

				var realValue = queries[i].split("=");
				inputList[i].value = realValue[realValue.length-1];
			}
		}

		//metodo che c'entra la maschera che contiene il bottone
		function centreFormMask(){
			var formMaskHeight = formMask.offsetHeight;
			var availHeight = window.innerHeight;
			
			formMask.style.marginTop = (availHeight-formMaskHeight)/2 + "px";
		}

		//metodo che chiede se si vogliono modificare i dati
		function modifyData(){
			if(confirm("Vuoi modificare i dati?")){
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
					window.location.href = 'registrazione.html' + queryString;		
			}
		}