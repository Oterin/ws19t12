<?php include '../php/DbConfig.php' ?>
<?php 
	
	$galdera = $_GET['galdera'];
	$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea: ezin izan da konexioa ezarri");

	$sql = "UPDATE questions SET Dislikes = Dislikes + 1 WHERE galdera = '$galdera'";

	@mysqli_query($konexioa, $sql);
 ?>