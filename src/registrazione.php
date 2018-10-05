<!DOCTYPE html>
<html>
<head>
	<title>Registrazione</title>
	<meta charset="utf-8"> 
	<link rel="stylesheet" type="text/css" href="style/registrazione.css">
</head>
<body onresize="centreFormMask()">
	<form id="formMask">
		<table>
			<tr>
				<td><label>Nome*:</label></td>
				<td><input type="text" name="name" placeholder="Your name" id="name" onchange="checkText(0)"></td>
			</tr>
			<tr>
				<td><label>Cognome*:</label></td>
				<td><input type="text" name="surname" placeholder="Your surname" id="surname" onchange="checkText(1)"></td>
			</tr>
			<tr>
				<td><label>Data di nascita*:</label></td>
				<td><input type="date" name="date" id="date"></td>
			</tr>
			<tr>
				<td><label>Indirizzo*:</label></td>
				<td><input type="text" name="address" placeholder="Your address" id="address"></td>
			</tr>
			<tr>
				<td><label>No. Civico*:</label></td>
				<td><input type="text" name="civicNumber" placeholder="Your Civic Number" id="civicNumber" onchange="setCivicNumber()"></td>
			</tr>
			<tr>
				<td><label>Città*:</label></td>
				<td><input type="text" name="city" placeholder="Your city" id="city"></td>
			</tr>
			<tr>	
				<td><label>Nap*:</label></td>
				<td><input type="Number" name="nap" placeholder="Your Nap" id="nap"></td>
			</tr>	
			<tr>	
				<td><label>No. Telefono*:</label></td>
				<td><input type="text" name="tel" placeholder="Your tel number" id="phoneNumber"></td>
			</tr>
			<tr>
				<td><label>E-mail*:</label></td>
				<td><input type="text" name="email" placeholder="Your e-mail" id="email"></td>
			</tr>
			<tr>
				<td><label>Genere (sesso)*:</label></td>
				<td><input type="text" name="gener" placeholder="Your gener" id="gener"></td>
			</tr>
			<tr>	
				<td><label>Hobby:</label></td>
				<td><input type="text" name="hobby" placeholder="Your hobby"><br></td>
			</tr>
			<tr>	
				<td><label>Professione:</label></td>
				<td><input type="text" name="profession" placeholder="Your profession"></td>
			</tr>	
			<tr>
				<td colspan="2"><b><label>Il carattere * indica che è un campo obbligatorio</label></b></td>
			</tr>
			<tr id="buttonsAlign">
				<td><input type="button" name="cancel" value="Cancella" onclick="deleteData()" class="button"></td>
				<td><input type="button" name="next" value="Avanti" class="button" onclick="enableNextButton()"></td>
			</tr>
		</table>
	</form>

	<script src="script/Registrazione.js"></script>
</body>
</html>