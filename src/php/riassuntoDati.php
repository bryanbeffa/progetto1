<?php
	require 'php/Csv.php';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = $_POST["name"];
		$surname = $_POST["surname"];

		echo $name . " wqq" . $surname ;
	}
?>