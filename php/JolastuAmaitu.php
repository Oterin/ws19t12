<?php include '../php/DbConfig.php';  ?>
<?php 
	session_start();
	$gaia = $_SESSION['gaiaJolastu'];
	$deitura = $_SESSION['nick'];
	$asmatuak = $_SESSION['asmatuak'];
	$asmatugabeak = $_SESSION['asmatugabeak'];
	$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea: ezin izan da konexioa ezarri");
	$sql = "SELECT COUNT(*) AS total FROM puntuazioa WHERE user= '$deitura' AND gaia='$gaia'";
	$sql1 = "INSERT INTO puntuazioa (user,asmatuak,asmatugabeak,gaia) VALUES ('".$deitura."','".$asmatuak."','".$asmatugabeak."','".$gaia."')";
	$sql2 = "UPDATE puntuazioa SET asmatuak = '$asmatuak', asmatugabeak='$asmatugabeak' WHERE (user = '$deitura') AND (gaia = '$gaia')";
	$sql3 = "UPDATE questions SET Egina='EZ'";
	$sql4 = "SELECT * FROM puntuazioa WHERE user = '$deitura' AND gaia = '$gaia'";
	$ema2 = @mysqli_query($konexioa, $sql4);
	$row = mysqli_fetch_row($ema2);

	$ema = @mysqli_query($konexioa,$sql);

	$mf = mysqli_fetch_array($ema);
	if ($mf['total'] == 0){
		@mysqli_query($konexioa, $sql1);
	}else{
		if ($row['asmatuak'] < $asmatuak) {
			@mysqli_query($konexioa, $sql2);
		}
	}

	@mysqli_query($konexioa, $sql3);
	unset($_SESSION['asmatuak']);
	unset($_SESSION['asmatugabeak']);
	unset($_SESSION['gaiaJolastu']);
 ?>