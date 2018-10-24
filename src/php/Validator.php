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
			if(preg_match("/^[a-zA-Z èéëÈÉËìíïÌÍÏàáäÀÁÄòóöÒÓÖùúüÙÚÜ]+$/", $text) && strlen($text) <= 50){
				return true;
			}
			return false;
		}

		/**
		 * Metodo che controlla che la data non sia futura.
		 */
		public function checkDate($date){
			$today = date("Y/m/d");
			var_dump($today);
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
			if(preg_match("/^[a-zA-Z èéëÈÉËìíïÌÍÏàáäÀÁÄòóöÒÓÖùúüÙÚÜ.,;: ]+$/", $value) && strlen($value) <= 50){
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
	}
?>