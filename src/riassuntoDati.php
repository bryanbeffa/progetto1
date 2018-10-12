<!DOCTYPE html>
<html>
<head>
	<title>Riassunto - dati</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/riassuntoDati.css">
</head>
<body onresize="centreFormMask()">
	<form id="formMask" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<table>
			<tr>
				<td><label>Nome*:</label></td>
				<td><label class="value" type="text" name="name" placeholder="Your name" id="name" onchange="checkText(0)"></td>
			</tr>
			<tr>
				<td><label>Cognome*:</label></td>
				<td><label class="value" type="text" name="surname" placeholder="Your surname" id="surname" onchange="checkText(1)"></td>
			</tr>
			<tr>
				<td><label>Data di nascita*:</label></td>
				<td><label class="value" type="date" name="date" id="date"></td>
			</tr>
			<tr>
				<td><label>Indirizzo*:</label></td>
				<td><label class="value" type="text" name="address" placeholder="Your address" id="address"></td>
			</tr>
			<tr>
				<td><label>No. Civico*:</label></td>
				<td><label class="value" type="text" name="civicNumber" placeholder="Your Civic Number" id="civicNumber" onchange="setCivicNumber()"></td>
			</tr>
			<tr>
				<td><label>Città*:</label></td>
				<td><label class="value" type="text" name="city" placeholder="Your city" id="city"></td>
			</tr>
			<tr>	
				<td><label>Nap*:</label></td>
				<td><label class="value" type="Number" name="nap" placeholder="Your Nap" id="nap"></td>
			</tr>	
			<tr>	
				<td><label>No. Telefono*:</label></td>
				<td><label class="value" type="text" name="tel" placeholder="Your tel number" id="phoneNumber"></td>
			</tr>
			<tr>
				<td><label>E-mail*:</label></td>
				<td><label class="value" type="text" name="email" placeholder="Your e-mail" id="email"></td>
			</tr>
			<tr>
				<td><label>Genere (sesso)*:</label></td>
				<td><label class="value" type="text" name="gener" placeholder="Your gener" id="gener"></td>
			</tr>
			<tr>	
				<td><label>Hobby:</label></td>
				<td><label class="value" type="text" name="hobby" placeholder="Your hobby"><br></td>
			</tr>
			<tr>	
				<td><label>Professione:</label></td>
				<td><label class="value" type="text" name="profession" placeholder="Your profession"></td>
			</tr>
			<tr>
				<td id="buttonsAlign"><input type="button" name="modify" value="Modifica" class="button" onclick="modifyData()"></td>
				<td><input type="button" name="next" value="Avanti" class="button" onclick="confirmData()"></td>
			</tr>
		</table>
	</form>
	<?php 
		include 'php/riassuntoDati.php';
	?>
	<script type="text/javascript">
		//variabile che contiene l'elemento 
		var formMask = document.getElementById("formMask");
		//variabile contenete la lista dei label in cui inserire i valori
		var labelList = document.getElementsByClassName("value");

		centreFormMask();
		printValues();

		//metodo che stampa i valori dei campi
		function printValues(){
			var queryString = decodeURIComponent(window.location.search); //parsing
			queryString = queryString.substring(1);
			var queries = queryString.split("&");
			for (var i = 0; i < queries.length; i++){
				var realValue = queries[i].split("=");
				labelList[i].innerHTML = realValue[realValue.length-1];
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
				var queryString = "?name=" + labelList[0].textContent 
					+ "&surname=" + labelList[1].textContent 
					+ "&date=" + labelList[2].textContent
					+ "&address=" + labelList[3].textContent
					+ "&civicNumber=" + labelList[4].textContent
					+ "&city=" + labelList[5].textContent
					+ "&nap=" + labelList[6].textContent
					+ "&phoneNumber=" + labelList[7].textContent
					+ "&email=" + labelList[8].textContent
					+ "&gener=" + labelList[9].textContent
					+ "&hobby=" + labelList[10].textContent
					+ "&profession=" + labelList[11].textContent;
					window.location.href = 'registrazione.html' + queryString;		
			}
		}


		//metodo che conferma i dati e permette l'accesso alla pagina di visualizzazione dei dati
		function confirmData(){
			if(confirm("Sei sicuro?"))
				window.location.href = "tuttiDati.php"
		}
	</script>
</body>
</html>