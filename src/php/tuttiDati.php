<?php 
	require 'Csv.php';	
	
	$csvFile = new Csv("csv/Registrazione.csv", "Registrazione.csv");
	
	//$csvFile->write("Jimmi;beffa;20.02.1999;via cantonale; 43; Porza; 6948; 079 860 82 88; bryan.beffa@samtrevano.ch; M; calcio ping pong sdwd euiwhfuiwehf iwuehfiewfh ;studente; 12.10.2018 12:30:22,");
	echo $csvFile->getDataTable(); 
?>