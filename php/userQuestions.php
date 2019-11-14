<table>
<th>
	<?php
		$user = $_GET["eposta"];
		$xml = simplexml_load_file("../xml/Questions.xml");
		$kontOrokor = 0;
		$kontNireak = 0;
		foreach ($xml->assessmentItem as $galdera) {
			$kontOrokor += 1;
			if ($galdera["author"] == $user ) {
				$kontNireak += 1;
			}
		}
		echo ($kontNireak . "/" . $kontOrokor);
	?>
</th>	
</table>