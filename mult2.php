#!/usr/bin/php
<?php
	print("Donnez la table : ");
	fscanf(STDIN, "%d\n", $number);
	printf("Table de %d\n", $number);
	for ($i=1; $i <= 10; $i++) { 
		printf("%d * %d = %d\n", $number, $i, $i * $number);
	}
?>