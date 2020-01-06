<?php
include '../php/DbConfig.php';
	$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db);
	$gaia = $_GET['gaia'];
	$query = "SELECT user, asmatuak, asmatugabeak FROM puntuazioa WHERE gaia = '$gaia'";
	$ema=@mysqli_query($konexioa,$query);
	if(!$ema)
		die ("Errorea: ezin izan da datu basea atzitu");
	
?>	
	<table border="1">
		<tr>
		<thead>
			<th>Erabiltzaile</th>  
			<th>Asmatuak</th>    
			<th>Asmatugabeak</th>
		</tr>
		</thead>
		<?php foreach ($konexioa->query("SELECT user, asmatuak, asmatugabeak FROM puntuazioa WHERE gaia = '$gaia' ORDER BY asmatuak DESC") as $row){  ?>
		<tr>
			<td><?php echo $row['user']?></td>
			<td><?php echo $row['asmatuak']?></td>
			<td><?php echo $row['asmatugabeak']?></td>

		</tr>
		<?php
		}
		?>
		
	</table>