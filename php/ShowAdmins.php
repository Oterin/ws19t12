<?php include '../php/DbConfig.php' ?>
<table border="1"> 
      <tr bgcolor="#9acd32">
        <th>Emaila</th>
        <th>Pasahitza</th>
        <th>Irudi</th>
        <th>Egoera</th>
        <th>Blokeo</th>
        <th>Ezabatu</th>
      </tr>
	<?php
	$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("<p>Errorea: ezin izan da konexioa ezarri</p>");
	$query = 'SELECT * FROM logindatuak';
	$kon=@mysqli_query($konexioa,$query);
	if(!$kon){
		echo("<p>Errorea: ezin izan da datu basea atzitu</p>");
		exit();
	}
	else{
		$kont = 0;
		foreach ($kon as $row){
			echo("<tr>");
			echo("<td id=". $kont .">". $row["Posta"] . "</td>");
			echo("<td>". $row["Pasahitza"] . "</td>");
			echo("<td> <img src=".$row['Argazkia']." width='50'></td>");
			echo("<td>". $row["Egoera"] . "</td>");
			echo("<td> <input type='button' id='aldatuBtn' value='Aldatu' onclick='aldatuEgoera(". $kont . ");'/> </td>");
			echo("<td> <input type='button' id='ezabatuBtn' value='Ezabatu' onclick='ezabatuUser(". $kont . ");'/> </td>");
			echo("</tr>");
			$kont += 1;
			}		
		}
	?>
</table>