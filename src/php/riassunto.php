<?php
	require 'Csv.php';
	require 'Validator.php';

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

		//controllo se i valori sono corretti grazie alla classe Validator contenete tutti i metodi per il controllo di tutti i campi
		$validator = new Validator();
		if($validator->checkTextFields($name) 
			&& $validator->checkTextFields($surname)
			&& $validator->checkDate($date)
			&& $validator->checkTextFields($address)
			&& $validator->checkCivicNumber($civicNumber)
			&& $validator->checkTextFields($city)
			&& $validator->checkNap($nap)
			&& $validator->checkPhoneNumber($phoneNumber)
			&& $validator->checkEmail($email)
			&& $validator->checkGender($gender) 
			&& $validator->checkHobbyAndProfession($hobby) 
			&& $validator->checkHobbyAndProfession($profession)){
	
			//setto la timezone roma
			date_default_timezone_set("Europe/Rome");
			$time = date("Y-m-d") . " - " . date("h:i:sa");
	
			//creo la stringa contente tutti i dati dell'utente separati dal delimiatatore di campo ";" e il limitatore di fine linea "//"
			$data = $name . ";" . $surname . ";" . $date . ";" 
					. $address . ";" . $civicNumber . ";" . $city . ";"
					. $nap . ";" . $phoneNumber . ";" . $email . ";"
					. $gender . ";" . $hobby . ";" . $profession . ";" . $time . "//";
	
			$dailyCsv = getDailyCsvFile();
	
			$dir = "Registrazioni";
	
			//controllo se esiste la cartella Registrazioni e se non c'é la creo
			if(!file_exists($dir)){
				mkdir($dir);
			}
	
			$path = $dir . "/" . $dailyCsv;
	
			$dayCsv = new Csv($path, $dailyCsv);
	
			//scrivo nel file csv contenente tutte le registrazioni
			$mainCsv = new Csv("Registrazioni/Registrazioni_tutte.csv", "Registrazioni_tutte.csv");
	
			//salvo l'id giornaliero e generale
			$dailyId = $dayCsv->getDataRows();
			$id = $mainCsv->getDataRows();
	
			//aggiungo l'id
			$dailyData = $dailyId . ";" . $data;
			$mainData = $id . ";" . $data;
	
			//scrivo nell file csv
			$dayCsv->write($dailyData);
			$mainCsv->write($mainData);
	
			//mi sposto sulla pagina contenente tutti i dati giornalieri
			header('Location: tuttiDati.php');
		}else{
			//torno alla pagina di registrazione e cancello i dati
			header('Location: registrazione.html');
		}
	}

	//metodo che ritorna il nome del file odierno
	function getDailyCsvFile(){
		$csv = "Registrazione_" . date("Y"). "-" .date("m"). "-" .date("d") . ".csv";
 		return $csv;
	}
?>