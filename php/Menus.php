<div id='page-wrap'>
<header class='main' id='h1'>
	<span id="erregspan" class="right"><a href="SignUp.php" id="erreg" >Erregistratu</a></span>
	<span id="logspan" class="right"><a href="LogIn.php" id="log" >Login</a></span>
	<span id="anonimospan" class="right">Anonimoa<img id="irudi" src="../images/anonimoa.png" height="40px"></img></span>
</header>
<nav class='main' id='n1' role='navigation'>
	<span id="hasieraspan"><a href='Layout.php' id="hasiera">Hasiera</a></span>
	<span id="kredituakspan"><a href='Credits.php' id="kredituak">Kredituak</a></span>
</nav>

	<?php include '../php/DbConfig.php' ?>

	<script src="../js/jquery-3.4.1.min.js"></script>

	<script>
	
	function erakutsiLogeatuta(){
		var geteposta = "<?php echo $_GET['eposta']; ?>"
		
		$("#erregspan").remove();
		$("#logspan").remove();
		$("#anonimospan").remove();
		$("#hasieraspan").remove();
		$("#kredituakspan").remove();
		
		var logout = $("<span id='logoutspan' class='right'><a href='Layout.php' id='logout'>Logout</a>&nbsp</span>");
		logout.appendTo("#h1"); 
		var layout = $("<span id='hasieraspan'><a href='Layout.php?eposta="+geteposta+"' id='hasiera'>Hasiera</a></span>");
		layout.appendTo("#n1"); 
		var gArgazki = $("<br><span id='galderakArgazkispan'><a href='QuestionFormWithImage.php?eposta="+geteposta+"' id='galderakArgazki'>Galderak gehitu</a></span>");
		gArgazki.appendTo("#n1");
		var gIkusi = $("<br><span id='galderakIkusispan'><a href='ShowQuestionsWithImage.php?eposta="+geteposta+"' id='galderakIkusi'>Galderak ikusi</a></span>");
		gIkusi.appendTo("#n1");
		var gIkusiXML = $("<br><span id='galderakIkusiXMLspan'><a href='ShowXMLQuestions.php?eposta="+geteposta+"' id='galderakXMLIkusi'>Ikusi XML galderak</a></span>");
		gIkusiXML.appendTo("#n1");
		var credits = $("<span id='kredituakspan'><a href='Credits.php?eposta="+geteposta+"' id='kredituak'>Kredituak</a></span>");
		credits.appendTo("#n1"); 
		
		var erabiltzaile = $("<span id='erabiltzaile' class='right'>"+geteposta+"&nbsp</span>");
		erabiltzaile.appendTo("#logoutspan");
		
		<?php
			$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea: ezin izan da konexioa ezarri");
			$query = 'SELECT Posta, Argazkia FROM logindatuak';
			$ema=@mysqli_query($konexioa,$query);
			if(!$ema){
				echo("Errorea: ezin izan da datu basea atzitu");
				exit();
			}
			else{
				foreach ($konexioa->query('SELECT Posta, Argazkia FROM logindatuak') as $row){
					if (!(strcmp($row['Posta'],$_GET['eposta']))){
						?>
						var irudi = $("<span id='irudi' class='right'><img src='<?php echo($row['Argazkia']) ?>' height='40px'></img></span>");
						irudi.appendTo("#erabiltzaile");
						<?php
						break;
					}
				}
			}
			mysqli_close($konexioa);
		?>
		
		return true;
	}
	
  </script>