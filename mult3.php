#!/usr/bin/php
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Table de multiplication</title>
</head>
<body>

	<section>
		<h1>Table de multiplication</h1>

		<?php 
			printf("<table>\n");

			printf("<tr>");
			printf("<th></th>"); // pour la première case
			for ($i=1; $i < 11; $i++) { 
				printf("<th>%d</th>", $i);
			}
			printf("<tr>\n");

			for ($i=1; $i < 11; $i++) { 
				printf("<tr>");
				printf("<th>%d</th>", $i); // pour la première case
				for ($j=1; $j < 11; $j++) { 
					printf("<td>%d</td>", $j * $i);
				}
				printf("<tr>\n");
			}
			printf("</table>\n");
		 ?>

	</section>
</body>
</html>

