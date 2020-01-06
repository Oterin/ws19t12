<?php
	include '../php/DbConfig.php';
	session_start();
	$email = $_POST['berrezarpenEmail'];
	$pasahitza = $_POST['berrezarpenPasahitza'];
	$pasahitza2 = $_POST['berrezarpenPasahitza2'];
	$kodea = $_POST['berrezarpenKodea'];

	if($email == ""){
		echo "Errorea: Emaila hutsik";
	}
	if ($pasahitza == ""){
		echo "Errorea: Pasahitza hutsik";
	}
	if ($pasahitza2 == ""){
		echo "Errorea: Pasahitza errepikatua hutsik";
	}
	if ($kodea == ""){
		echo "Errorea: Kodea hutsik";
	}
	if ($email == "" || $pasahitza == "" || $pasahitza2 == "" || $kodea == ""){
		echo "Saiatu berriro";
	}else{
		if ($pasahitza != $pasahitza2){
			echo "Pasahitzak ez datoz bat";
		}else{
			if ($kodea != $_SESSION['code']){
				echo "Error: Kodea ez datos bat";
			}else{
				$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea: ezin izan da konexioa ezarri");

				$sql = "UPDATE logindatuak SET Pasahitza='" . $pasahitza . "' WHERE Posta = '" . $email . "'";

				$result = @mysqli_query($konexioa, $sql);
				if ($result){
					echo "Pasahitza eguneratuta!";
				}
			}
			
		}
	}

	?>
