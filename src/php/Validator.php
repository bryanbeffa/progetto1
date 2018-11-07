<?php
	//classe contente i metodi per la validazione dei campi del form
	class Validator{

		public function __construct(){
		}

		/**
		 * Metodo che controlla che i campi di testo con gli stessi criteri abbiano dei valori validi.
		 * Numero massimo di caratteri 50.
		 * Caratteri consentiti: letterali e spazio. 
		 */
		public function checkTextFields($text){
			$text = trim($text);
			if(preg_match("/^[a-zA-Z èéëÈÉËìíïÌÍÏàáäÀÁÄòóöÒÓÖùúüÙÚÜ]+$/", $text) && strlen($text) <= 50){
				return true;
			}
			return false;
		}

		/**
		 * Metodo che controlla che la data non sia futura.
		 */
		public function checkDate($date){
			$today = new DateTime();
			try{
				$date_value = new DateTime($date);
				if ($date_value > $today){
					return false;
				}else{
					return true;
				}
			}catch(Exception $e){
				return false;
			}

			
		}

		/**
		 * Metodo che controlla che l'email inserita sia valida
		 */
		public function checkEmail($email){
			//metodo che serve a controllare la sintassi dell'email
			$regex = '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
			//controllo se l'email è valida
			if(preg_match($regex, $email)){
				return true;
			}
			return false;
		}

		/**
		 * Metodo che controlla i campi hobby e professione
		 */
		public function checkHobbyAndProfession($value){
			if($value == null)
				return true;
			if(preg_match("/^[a-zA-Z èéëÈÉËìíïÌÍÏàáäÀÁÄòóöÒÓÖùúüÙÚÜ.,: ]+$/", $value) && strlen($value) <= 500){
				return true;
			}
			return false;
		}

		/**
		 * Metodo che controlla il campo numero civico
		 */
		public function checkCivicNumber($civicNumber){
			if(preg_match("/^[a-zA-Z0-9]+$/", $civicNumber) && strlen($civicNumber) <= 4 && strlen($civicNumber) > 0 && 
				($civicNumber != "0" &&  $civicNumber != "00" && $civicNumber != "000" && $civicNumber != "0000")){
				return true;
			}
			return false;
		}

		/**
		 * Metodo che controlla il campo genere.
		 */
		public function checkGender($gender){
			$gender = strtolower($gender);
			if($gender == 'm' || $gender == 'f' || $gender == 'altro'){
				return true;
			}
			return false;
		}

		/**
		 * Metodo che controlla il campo nap
		 */
		public function checkNap($nap){
			if(preg_match("/^[0-9]+$/", $nap) && strlen($nap) > 3 && strlen($nap) < 6){
				return true;
			}
			return false;
		}

		/**
		 * Metodo che controlla il campo del telefono.
		 */
		public function checkPhoneNumber($number){
			if(preg_match("/\+?(\d*)\d{9}/", $number)){
				return true;
			}
			return false;
		}
	}
?>