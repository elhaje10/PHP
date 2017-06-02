<!DOCTYPE html>
<html>
<head>
	<title>Play</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	<section>
		<h1>Playing...</h1>

		<?php if (isset($_GET['music'])): ?>

			<p><?= $_GET['music'] ?></p>
			<img src="data/<?= $_GET['music'] ?>" alt="Image du groupe." max-width="200px">
			<audio src="data/<?= $_GET['music'] ?>.mp3" controls="" autoplay="false" alt="Musique du groupe."></audio>

		<?php else: ?>
			<p>Rien à afficher</p>	
		<?php endif ?>
		


	</section>

	<!-- <section>
		<h1>DEBUG</h1>
		<?php 
			if (isset($_GET)) {
				echo "<table>";
                foreach ($_GET as $key => $value) {
                    echo "<tr> <td>", htmlentities($key), "</td> <td>", htmlentities($value), "</td> </tr>";
                }
                echo "</table>";
	        }
        ?>
	</section> -->

</body>
</html>

