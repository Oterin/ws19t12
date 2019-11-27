<?php include '../php/DbConfig.php' ?>
<?php
	$user = $_GET['eposta'];
	$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea: ezin izan da konexioa ezarri");
	$sqlKonprobaketa = "DELETE FROM logindatuak WHERE Posta = '$user'";
	$ema=@mysqli_query($konexioa,$sqlKonprobaketa);
	if(!$ema){
		echo("<p>Errorea: ezin izan da galdera txertatu</p>");
	}
	else{
		echo("<p>Galdera gorde da</p>");
	}

	mysqli_close($konexioa);
	
?>