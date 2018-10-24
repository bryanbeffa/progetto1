<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php 
		require 'Validator.php';

		$validator = new Validator();

		if($validator->checkTextFields("qwertzuio wer,tzuiopqwertzuiopqwertzuiopqwertzuiop")){
			echo "Nome giusto <br>";
		}else{
			echo "Nome sbagliato <br> ";
		}

		if($validator->checkEmail("cin_hsd@cjoei.cs")){
			echo "Email corretta<br>";
		}else{
			echo "email sbagliata <br> ";
		}

		if($validator->checkHobbyAndProfession("cinhsd:::cjoei.cs.ed")){
			echo "Hobby corretto<br>";
		}else{
			echo "Hobby sbagliato <br> ";
		}

		if($validator->checkCivicNumber("000")){
			echo "N° civico corretto<br>";
		}else{
			echo "N° civico sbagliato <br> ";
		}

	?>
</body>
</html>