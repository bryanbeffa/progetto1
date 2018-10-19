<?php
	require 'Csv.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$name = $_POST["name"];
		$surname = $_POST["surname"];
		$date = $_POST["date"];
		$address = $_POST["address"];
		$civicNumber = $_POST["civicNumber"];
		$city = $_POST["city"];
		$nap= $_POST["nap"];
		$phoneNumber = $_POST["phoneNumber"];
		$email = $_POST["email"];
		$gender = $_POST["gender"];
		$hobby = $_POST["hobby"];
		$profession = $_POST["profession"];

		//setto la timezone roma
		date_default_timezone_set("Europe/Rome");
		$time = date("Y/m/d") . " - " . date("h:i:sa");

		checkCsvDate();

		//creo la stringa contente tutti i dati dell'utente separati dal delimiatatore di campo ";" e il limitatore di fine linea ","
		$data = $name . ";" . $surname . ";" . $date . ";" 
				. $address . ";" . $civicNumber . ";" . $city . ";"
				. $nap . ";" . $phoneNumber . ";" . $email . ";"
				. $gender . ";" . $hobby . ";" . $profession . ";" . $time . ",";

				


		$dayCsv = new Csv("csv/Registrazione_aaaa-mm-gg.csv.csv", "Registrazione_aaaa-mm-gg.csv.csv");

		//scrivo nel file csv contenente tutte le registrazioni
		$mainCsv = new Csv("csv/Registrazioni_tutte.csv", "Registrazioni_tutte.csv");

		//scrivo nell file csv
		$dayCsv->write($data);
		$mainCsv->write($data);

		//header('Location: tuttiDati.php');
	}

	//metodo che serve a controllare se il dile odierno p già stato creato
	function checkCsvDate(){
		$csv = "Registrazione_" . date("Y"). "-" .date("m"). "-" .date("d") . ".csv";
 		if(true){
 			echo $csv;
		}
	}
?>