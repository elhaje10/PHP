<!DOCTYPE html>
<html>
<head>
	<title>Play</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	<section>
		<h1>Playing...</h1>

			<?php 

				// adresse commune des ressources
				$adresse = 'http://www-info.iut2.upmf-grenoble.fr/intranet/enseignements/';

				// adresse des flèches de nav
				$fleches_dir = $adresse.'ProgWeb/S2104/TP/tp04/sujet/img/';

				// adresse des contenus de musique
				$music_dir = $adresse.'progWEB/data/musiques';

				// récupération du paramètre
				if (isset($_GET['music'])) {
					
					// vérification de la cohérence du paramètre
					if (is_numeric(($_GET['music']))==false){
						$numero = 1;
					}
					else if ($_GET['music'] <= 0 || $_GET['music'] > 554){
						$numero = 1;
					}
					else {
						$numero = htmlentities($_GET['music']);
					}
				}
				else
				{
					$numero = 1;
				}

				// ouverture de la base, lecture des données et récupération des informations pour le morceau lu
				require_once "Music.php";
				$music = loadMusicDB();
				$titre = $music[$numero]->title;
				$artiste = $music[$numero]->author;
				$cover = $music[$numero]->cover;
				$mp3 = $music[$numero]->mp3;
				$i = $numero;
			?>

			<nav>
				<a href="play.php?music=<?= $i-1 ?>">
					<img src="<?= $fleches_dir ?>Actions-arrow-left-icon.png" alt="Precedent">
				</a>
				<a href="main2.php?firstId=<?= $numero ?>">
					<img src="<?= $fleches_dir ?>Actions-arrow-top-icon.png" alt="Menu">
				</a>
				<a href="play.php?music=<?= $i+1 ?>">
					<img src="<?= $fleches_dir ?>Actions-arrow-right-icon.png" alt="Suivant">
				</a>
			</nav>

			<p><?= $numero ?> - <?= $artiste ?> - <?= $titre ?></p>
			
			<div id="player">
				<img src="<?= $music_dir ?>/img/<?= $cover ?>" alt="<?= $artiste ?> - <?= $titre ?>">
				<audio src="<?= $music_dir ?>/mp3/<?= $mp3 ?>" controls="" alt="<?= $artiste ?> - <?= $titre ?>"></audio>
			</div>

	</section>


</body>
</html>