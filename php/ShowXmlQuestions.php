<table border="1"> 
      <tr bgcolor="#9acd32">
        <th>Egilea</th>
        <th>Galdera</th>
        <th>Zuzena</th>
      </tr>
	<?php
	$xml = simplexml_load_file("../xml/Questions.xml");
	foreach ($xml->assessmentItem as $galdera) {
		echo("<tr>");
		echo("<td>". $galdera["author"] . "</td>");
		echo("<td>". $galdera->itemBody->p . "</td>");
		echo("<td>". $galdera->correctResponse->value . "</td>");
		echo("</tr>");
	}
	
	?>
</table>
