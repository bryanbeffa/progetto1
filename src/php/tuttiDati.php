<?php 
	require 'Csv.php';	
	
	$csvFile = new Csv("csv/Registrazione.csv", "Registrazione.csv");
	
	echo $csvFile->getDataTable(); 
?>