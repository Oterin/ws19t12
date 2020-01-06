<?php
		include '../php/DbConfig.php';

			$email = $_POST["mezuEmail"];
			session_start();
		
				$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea: ezin izan da konexioa ezarri");

				$sql = "SELECT * FROM logindatuak WHERE posta = '" . $email . "'";

				$result = @mysqli_query($konexioa, $sql);

				if ($result){
					$row = mysqli_fetch_row($result);

					if($row[0] == $email){
							//Mezuaren hartzailea
						$to = $email;

						//Mezuaren asuntoa
						$subject = "Pasahitza berrezarpena";

						//Kode aleatorioa
						$code = rand(10000, 99999);

						//Sesio aldagaiak berrezarpenerako
						$_SESSION['code'] = $code;
						$_SESSION['email'] = $email;

						//Mezua
						$message = "
						<html>
						<head>
						<title>Pasahitza berrezarpena</title>
						</head>
						<body>
						<h3>Jarraitu beharreko pausoak pasahitza berrezartzeko</h3>
						<ol>
						<li>Sartu emandako linkean</li>
						<li>Sartu emandako kodea eta pasahitza berria</li>
						<li>Dena ondo joatekotan orriak berak emango dizu feedbacka</li>
						</ol>
						<h3> Berrezarpen orrialderako linka: </h3>
						<h2><a href='https://ws833115.000webhostapp.com/azken_praktika/php/PasahitzaBerrezarriForm.php?email=".$email."' id='layout'>Hemen</a></h2>
						<h3>Berrezarpenerako kodea: </h3>
						<h2>".$code."</h2>
						</body>
						</html>";

						$headers = "MIME-Version: 1.0" . "\r\n";
						$headers .= "From: WST12" . "\r\n";
						$headers .= "Content-type: text/html:charset=UTF-8" . "\r\n";

						mail($to, $subject, $message, $headers);

						echo "<div align='center'><h2>Mezua ondo bidali da</h2>";
						echo "<h3>Konprobatu postagunea</h3></div>";


					}else{
						echo "Sartutako emaila ez dago datu basean";
					}
				}
		?>