<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
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
	    <table border="1">
	      <tr bgcolor="#9acd32">
	        <th>Egilea</th>
	        <th>Gaia</th>
	        <th>Galdera</th>
	        <th>Zuzena</th>
	        <th>Faltsuak</th>
	      </tr>
	      <xsl:for-each select="assessmentItems/assessmentItem">
	      <tr>	
	        <td><xsl:value-of select="@author" /></td>
	        <td><xsl:value-of select="@subject" /></td>
	        <td><xsl:value-of select="itemBody/p" /></td>
	        <td><xsl:value-of select="correctResponse/value" /></td>
	        <td>
	        <ul style="margin:0px;padding:0px;list-style-type:none;">
		        <li><xsl:value-of select="incorrectResponses/value1" /></li>
		        <li><xsl:value-of select="incorrectResponses/value2" /></li>
		        <li><xsl:value-of select="incorrectResponses/value3" /></li>
	        </ul>
	        </td>
	      </tr>
	      </xsl:for-each>
	    </table>
	</section>
  </body>
  </html>
</xsl:template>
</xsl:stylesheet>