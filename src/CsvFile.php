<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		class CsvFile{
			public function write($csvPath, $data) {
				$csvFile;
	    	    //apro o creo il file se non esiste
	    	    if(file_exists($csvPath)){
					//salvo i dati del file
					$current = file_get_contents($csvPath) . "\n".$data;
					//apro il file in scrittura
					$csvFile = fopen($csvPath, "w") or die ("Impossibile aprire il file!");
					//scrivo nel file i dati inseriti dall'utente
					fwrite($csvFile, $current);
				}else{
					//creo il file
					$csvFile = fopen($csvPath, "w");
					//scrivo nel file i dati inseriti dall'utente
					fwrite($csvFile, $data);
				}
				fclose($csvFile);
	    	}
		}

		$csvFile = new CsvFile();
		$csvFile -> write("Csoivjdcmoiwej.csv", "2ewoidoiw");
	?>
</body>
</html>
