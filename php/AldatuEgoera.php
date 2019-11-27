<?php include '../php/DbConfig.php' ?>
<?php
	$user = $_GET['eposta'];
	$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea: ezin izan da konexioa ezarri");
	$sqlKonprobaketa = "SELECT * FROM logindatuak WHERE Posta = '$user'";
	$ema=@mysqli_query($konexioa,$sqlKonprobaketa);
	foreach ($ema as $row){
		if ($row['Egoera'] == "aktibo"){
			$sql = "UPDATE logindatuak SET Egoera = 'blokeatuta' WHERE Posta = '$user'";
		}else{
			$sql = "UPDATE logindatuak SET Egoera = 'aktibo' WHERE Posta = '$user'";
		}
	}

	$ema2=@mysqli_query($konexioa,$sql);

	if(!$ema2){
		echo("<p>Errorea: ezin izan da galdera txertatu</p>");
	}
	else{
		echo("<p>Galdera gorde da</p>");
	}

	mysqli_close($konexioa);
	
?>