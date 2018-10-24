<?php 
	require 'Csv.php';

	$dailyCsv = getDailyCsvFile();
	$path = "Registrazioni/" . $dailyCsv;
	
	$csvFile = new Csv($path, $dailyCsv);
	
	echo $csvFile->getDataTable();

	//metodo che ritorna il file giornaliero da cui leggere i dati
	function getDailyCsvFile(){
		$dailyCsv = "Registrazione_" . date("Y"). "-" .date("m"). "-" .date("d") . ".csv";
 		return $dailyCsv;
	} 
?>