<?php
	/**
	* Classe contenente dei metodi utili per i file di formato csv.
	*/
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
				$current = file_get_contents($this->getPath()) . "\n". $data;
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
				$rows = explode('//', $data);
				//conto il numero di righe del file csv e tolgo 1, perché l'utlimo campo dell'array è vuoto
				$rowsLength = count($rows)-1;

				//creo il nome delle colonne
				$table .=  "<tr>
							<th>id</th>
							<th>Nome</th>
							<th>Cognome</th>
							<th>Data di nascita</th>
							<th>Indirizzo</th>
							<th>No. Civico</th>
							<th>Città</th>
							<th>Nap</th>
							<th>No. Telefono</th>
							<th>E-mail</th>
							<th>Sesso</th>
							<th>Hobby</th>
							<th>Professione</th>
							<th>Data iscrizione</th>
							</tr>";

				//ripeto per il numero totale di utenti
				for ($i=0; $i < $rowsLength; $i++) {
					$table .= "<tr>";
					$fields = explode(';', $rows[$i]);
					$fieldsLength = count($fields);
					//viene aggiunto anche
					for ($j=0; $j < $fieldsLength; $j++) {
						$table .= "<td>" . $fields[$j] . "</td>";
					}
					$table .= "</tr>";
				}
				
				//termino la struttura
				$table .= "</table>";
				return $table;
    		}
    	}

    	/**
    	 * Metodo che ritorna il numero di righe del file csv
    	 */
    	public function getDataRows(){
    		//salvo i dati del file
			$data = file_get_contents($this->getPath());
			$rows = explode('//', $data);
			//conto il numero di righe del file csv e tolgo 1, perché l'utlimo campo dell'array è vuoto
			$rowsLength = count($rows)-1;
			return $rowsLength;
    	}
	};
?>

