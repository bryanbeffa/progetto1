<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		class Csv{
			/**
			 * Percorso in cui si trovo o verrà creato il file.
			 */
			private $path;

			/**
			 * Nome del file esistente o che verrà creato.
			 */
			private $name;

			public function __construct($path, $name){
				$this->setPath($path);
				$this->setName($name);
			}

			/**
			 * Metodo che ritorna il percorso del file.
			 */
			public function getPath(){
				return $this->path;
			}

			/**
			 * Metodo che ritorna il nome del file.
			 */
			public function getName(){
				return $this->name;
			}

			/**
			 * Metodo che setta il percorso del file.
			 */
			public function setPath($path){
				$this->path = $path;
			}

			/**
			 * Metodo che setta il nome del file.
			 */
			public function setName($name){
				$this->name = $name;
			}

			/**
			 * Metodo che serve per aggiungere dei dati ad un file.
			 */
			public function write($data) {
				$csvFile;
	    	    //apro o creo il file se non esiste
	    	    if(file_exists($this->getPath())){
					//salvo i dati del file
					$current = file_get_contents($this->getPath()) . "\n".$data;
					//apro il file in scrittura
					$csvFile = fopen($this->getPath(), "w") or die ("Impossibile aprire il file!");
					//scrivo nel file i dati inseriti dall'utente
					fwrite($csvFile, $current);
				}else{
					//creo il file e le colonne
					$csvFile = fopen($this->getPath(), "w") or die ("Impossibile creare il file!");
					//scrivo nel file i dati inseriti dall'utente
					fwrite($csvFile, $data);
				}
				fclose($csvFile);
	    	}

	    	/**
			 * Metodo che serve ad aggiungere dati al file csv.
			 *
	    	public function addData($data){
	    		$csvFile;
	    	    //apro o creo il file se non esiste
	    	    if(file_exists($this->getPath())){
					//salvo i dati del file
					$current = file_get_contents($this->getPath()) . "\n".$data;
					//apro il file in scrittura
					$csvFile = fopen($this->getPath(), "w") or die ("Impossibile aprire il file!");
					//scrivo nel file i dati inseriti dall'utente
					fwrite($csvFile, $current);
				}else{
					//creo il file e le colonne
					$csvFile = fopen($this->getPath(), "w") or die ("Impossibile creare il file!");
					//scrivo nel file i dati inseriti dall'utente
					fwrite($csvFile, $data);
				}
				fclose($csvFile);
	    	}*/

	    	/**
	    	 * Metodo che ritorna i dati del file csv.
	    	 */
	    	public function getData(){
	    		//controllo se il file esiste
	    		if(file_exists($this->getPath())){
					//salvo i dati del file
					$data = file_get_contents($this->getPath());	
					return $data;
	    		}
	    	}

	    	/**
	    	 * Metodo che ritorna una tabella contenente i dati.
	    	 */
	    	public function getDataTable(){
	    		//controllo se il file esiste
	    		if(file_exists($this->getPath())){
					//salvo i dati del file
					$data = file_get_contents($this->getPath());
					$table = "<table>";

					//termino la struttura
					$table .= "</table>";

					return $data;
	    		}
	    	}
		}

		$csvFile = new Csv("csv/Registrazione.csv", "Registrazione.csv");
		echo $csvFile->getName() . "<br>";
		$data = $csvFile->getData();
		echo "<br><b>Leggo i dati del file: <br></b>" . $data;
		$csvFile->write("Jari; beffa; ciao; ciao; 1999");
		$data = $csvFile->getData();
		echo "<br><b>Scrivo i dati nel file: <br></b>" . $data;
	?>
</body>
</html>
