<!DOCTYPE html>
<html>
<head>
	<title>Jukebox</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	<section>
		<h1>Jukebox dynamique</h1>

		<?php $ressources = 'http://www-info.iut2.upmf-grenoble.fr/intranet/enseignements/progWEB/data/musiques' ?>

		<?php 

			require_once "Music.php";

			$music = loadMusicDB();

			$i = 0;
			foreach ($music as $key => $value) {
				echo '<a href="play.php?music=', $key,'"><img src="', $ressources, '/img/', $value->cover,'" alt="', $value->title ,'"></a>', "\n";
				$i++;
				if ($i>9) {
					break;
				}
			}
		
		 ?>

		<!-- <?php 

			include 'musicScanner.php';

			$music = scanMusic('data');


		 ?> -->

	</section>

</body>
</html>
