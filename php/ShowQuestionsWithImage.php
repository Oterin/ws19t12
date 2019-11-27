<!DOCTYPE html>
<html>
<head>
	<?php include '../html/Head.html'?>
	<?php include '../php/DbConfig.php' ?>
	<style>
		table{
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	<?php include '../php/Menus.php' ?>
	<section class="main" id="s1">
		<div>
		<?php
			$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea: ezin izan da konexioa ezarri");
			$query = 'SELECT Identifikazioa, Posta, Galdera, ErantzunZuzena, OkerraBat, Zailtasuna, Gaia, Argazkia FROM questions';
			$ema=@mysqli_query($konexioa,$query);
			if(!$ema){
				echo("Errorea: ezin izan da datu basea atzitu");
				exit();
			}
			
		?>	
			<table border="1">
				<tr>
				<thead>
					<th width="150px">Identifikazioa</th>  
					<th width="200px">Posta</th>    
					<th width="150px">Galdera</th>
					<th width="150px">Zuzena</th>
					<th width="150px">Okerra1</th>
					<th width="150px">Zailtasuna</th>
					<th width="150px">Gaia</th>
					<th width="150px">Irudia</th>
				</tr>
				</thead>
				<?php foreach ($konexioa->query('SELECT Identifikazioa, Posta, Galdera, ErantzunZuzena, OkerraBat, Zailtasuna, Gaia, Argazkia FROM questions') as $row){  ?>
				<tr>
					<td><?php echo $row['Identifikazioa']?></td>
					<td><?php echo $row['Posta']?></td>
					<td><?php echo $row['Galdera']?></td>
					<td><?php echo $row['ErantzunZuzena']?></td>
					<td><?php echo $row['OkerraBat']?></td>
					<td><?php echo $row['Zailtasuna']?></td>
					<td><?php echo $row['Gaia']?></td>
					<td><?php echo '<img src="'.$row['Argazkia'].'" width="50">'?></td>
				</tr>
				<?php
				}
				?>
				
			</table>
		</div>
	</section>
	<?php include '../html/Footer.html' ?>
</body>
</html>
