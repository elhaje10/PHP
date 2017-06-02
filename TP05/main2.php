<!DOCTYPE html>
<html>
<head>
	<title>Jukebox</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	<section>
		<h1>Jukebox interactif</h1>


		<?php 

			// -----------------------------
			// ADRESSES RESSOURCES 
			// -----------------------------

			// adresse commune des ressources
			$adresse = 'http://www-info.iut2.upmf-grenoble.fr/intranet/enseignements/';

			// adresse des flèches de nav
			$fleches = $adresse.'ProgWeb/S2104/TP/tp04/sujet/img/';

			// adresse des ressources musicales
			$ressources = $adresse.'progWEB/data/musiques';


			// -----------------------------
			// PARAMETRES $_GET 
			// -----------------------------

			$i = 1; // première musique
			$nb_elem = 10; // nombre d'éléments à afficher sur la page

			// musique choisie si la valeur est cohérente
			if (isset($_GET['firstId'])) {
				$val = htmlentities($_GET['firstId']);
				if (is_numeric($val)) {
					if ($val > 0 && $val < 555) {
						$i = $val;
					}
				}
			}

			// nombre d'éléments à afficher si la valeur est cohérente
			if (isset($_GET['nb'])) {
				$val = htmlentities($_GET['nb']);
				if (is_numeric($val)) {
					if ($val > 0 && $val < 554) {
						$nb_elem = $val;
					}
				}
			}

			$fin = $i+$nb_elem; // dernière musique de la page

			if ($fin > 554) { // validité de non dépassement de la base
				$fin = 555;
			}
		 ?>

		<nav>
			<a href="main2.php?firstId=<?= $i-$nb_elem ?>&nb=<?= $nb_elem ?>">
				<img src="<?= $fleches ?>Actions-arrow-left-icon.png" alt="Precedent">
			</a>
			<p><?= $i ?></p>
			<a href="main2.php?firstId=<?= $i+$nb_elem ?>&nb=<?= $nb_elem ?>">
				<img src="<?= $fleches ?>Actions-arrow-right-icon.png" alt="Suivant">
			</a>
		</nav>


		<?php 

			require_once "Music.php";

			$music = loadMusicDB();

			while ($i < $fin) {
				echo '<a href="play.php?music=', $i,'"><img src="', $ressources, '/img/', $music[$i]->cover,'" alt="', $music[$i]->title ,'"></a>', "\n";
				$i++;
			}
		
		 ?>

	</section>

</body>
</html>
