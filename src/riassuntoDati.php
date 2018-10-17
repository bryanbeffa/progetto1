<!DOCTYPE html>
<html>
<head>
	<title>Riassunto - dati</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/riassuntoDati.css">
</head>
<body onresize="centreFormMask()">
	<form id="formMask" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<table>
			<tr>
				<td><label>Nome*:</label></td>
				<td><input disabled type="text" name="name"></td>
			</tr>
			<tr>
				<td><label>Cognome*:</label></td>
				<td><input disabled type="text" name="surname"></td>
			</tr>
			<tr>
				<td><label>Data di nascita*:</label></td>
				<td><input disabled type="text" name="date"></td>
			</tr>
			<tr>
				<td><label>Indirizzo*:</label></td>
				<td><input disabled type="text" name="address"></td>
			</tr>
			<tr>
				<td><label>No. Civico*:</label></td>
				<td><input disabled type="text" name="civicNumber"></td>
			</tr>
			<tr>
				<td><label>Città*:</label></td>
				<td><input disabled type="text" name="city"></td>
			</tr>
			<tr>	
				<td><label>Nap*:</label></td>
				<td><input disabled type="text" name="nap"></td>
			</tr>	
			<tr>	
				<td><label>No. Telefono*:</label></td>
				<td><input disabled type="text" name="tel"></td>
			</tr>
			<tr>
				<td><label>E-mail*:</label></td>
				<td><input disabled type="text" name="email"></td>
			</tr>
			<tr>
				<td><label>Genere (sesso)*:</label></td>
				<td><input disabled type="text" name="gener"></td>
			</tr>
			<tr>	
				<td><label>Hobby:</label></td>
				<td><input disabled type="text" name="hobby"><br></td>
			</tr>
			<tr>	
				<td><label>Professione:</label></td>
				<td><input disabled type="text" name="profession"></td>
			</tr>
			<tr>
				<td id="buttonsAlign"><input type="button" name="modify" value="Modifica" class="button" onclick="modifyData()"></td>
				<td><input type="button" name="next" value="Avanti" class="button" onclick="confirmData()"></td>
			</tr>
		</table>
	</form>
	<?php 
		require 'php/riassuntoDati.php';
	?>
	<script type="text/javascript" src="script/riassuntoDati.js"></script>
</body>
</html>