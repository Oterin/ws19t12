<!DOCTYPE html>
<html>
<head>
	<?php include '../html/Head.html'?>
</head>
<body>
	<?php include '../php/Menus.php' ?>
	<?php include '../php/DbConfig.php' ?>
	<section class="main" id="s1">
		<div>
			<?php
			
			if (!(preg_match("/^[a-zA-Z]{3,}[0-9]{3}@ikasle[.]ehu[.]e[u]{0,1}s$/", $_POST["eposta"]) || preg_match("/^[a-zA-Z]+([.][a-zA-Z]+){0,1}@ehu[.]e[u]{0,1}s$/", $_POST["eposta"])
            || preg_match("/^[a-z0-9](\.?[a-z0-9]){5,}@g(oogle)?mail\.com$/", $_POST["eposta"])     
                 )){
				echo("Zerbitzariak ez du korreoa onartzen <br>"); 
			}
			else if(!(preg_match("/^.{10,}$/", $_POST["galdera"]))){
				echo ("Zerbitzariak ez du onartzen 10 karaktere baino gutxiagoko galderarik");
			}
			else if(!(strcmp($_POST["zuzena"],""))){
				echo ("Zerbitzariak ez du onartzen erantzun zuzena hutsa egotea");
			}
			else if(!(strcmp($_POST["okerra1"],""))){
				echo ("Zerbitzariak ez du onartzen erantzun okerrak hutsik egotea");
			}
			else if(!(strcmp($_POST["okerra2"],""))){
				echo ("Zerbitzariak ez du onartzen erantzun okerrak hutsik egotea");
			}
			else if(!(strcmp($_POST["okerra3"],""))){
				echo ("Zerbitzariak ez du onartzen erantzun okerrak hutsik egotea");
			}
			else if(!((@$_POST["zailtasuna"]==1)||(@$_POST["zailtasuna"]==2) || (@$_POST["zailtasuna"]==3))){
				echo ("Zerbitzariak ez du onartzen zailtasuna hutsa egotea");
			}
			else if(!(strcmp($_POST["gaia"],""))){
				echo ("Zerbitzariak ez du onartzen gaia hutsa egotea");
			}else{
				
		
			$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea: ezin izan da konexioa ezarri");
			
			$izena = $_REQUEST["galdera"];
			$irudia = $_FILES["irudia"]["name"];
			if(!$irudia){
				$helburua = "";
			}
			else{
				$non = $_FILES["irudia"]["tmp_name"];
				$helburua = "../images/".$irudia;
				$helburuaAldatu = $helburua;
				$irudiIzena = pathinfo($irudia, PATHINFO_FILENAME);
				$irudiMota = pathinfo($irudia, PATHINFO_EXTENSION);
				$i = 1;
				while(file_exists($helburuaAldatu)){
					$helburuaAldatu = "../images/".$irudiIzena.$i.".".$irudiMota;
					$i = $i + 1;
				}
				$helburua = $helburuaAldatu;
				copy($non, $helburua);
			}
			
			$sql = "INSERT INTO questions (Posta, Galdera, ErantzunZuzena, OkerraBat, OkerraBi, OkerraHiru, Zailtasuna, Gaia, Argazkia) VALUES
				  ('$_POST[eposta]' , '$_POST[galdera]', '$_POST[zuzena]', '$_POST[okerra1]' , '$_POST[okerra2]' , '$_POST[okerra3]' , '$_POST[zailtasuna]' , '$_POST[gaia]' , '$helburua')";

			$ema=@mysqli_query($konexioa,$sql);
			
			if(!$ema){
				echo("<p>Errorea: ezin izan da galdera txertatu</p>");
			}
			else{
				echo("<p>Galdera gorde da</p>");
			}
			
			mysqli_close($konexioa);
			$xml = simplexml_load_file("../xml/Questions.xml");
			$galdera = $xml->addChild("assessmentItem");
			$galdera->addAttribute("author",$_POST["eposta"]);
			$galdera->addAttribute("subject",$_POST["gaia"]);
			$itemBody = $galdera->addChild("itemBody");
			$itemBody->addChild("p",$_POST["galdera"]);
			$correctResponse = $galdera->addChild("correctResponse");
			$correctResponse->addChild("value", $_POST["zuzena"]);
			$incorrectResponses = $galdera->addChild("incorrectResponses");
			$incorrectResponses->addChild("value1", $_POST["okerra1"]);
			$incorrectResponses->addChild("value2", $_POST["okerra2"]);
			$incorrectResponses->addChild("value3", $_POST["okerra3"]);
			if($xml->asXML('../xml/Questions.xml')){
				echo("<p>Galdera XML fitxategian ondo gorde da");
			}else{
				echo("<p>Errorea gertatu da XML fitxategian informazioa txertatzean");
			}
			
			}
			?>
    </div>
	</section>
	<?php include '../html/Footer.html' ?>
</body>
</html>
