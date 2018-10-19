<!DOCTYPE html>
<html>
<head>
	<title>Tutti - dati</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/tuttiDati.css">
</head>
<body>
	<h1>Tutte le iscrizioni giornaliere</h1>
	<form id="formMask" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<?php 
			include 'php/tuttiDati.php';
		?>
		<a href="index.html"><input type="button" value="Home" id="button"></a>
	</form>
</body>
</html>