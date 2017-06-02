<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
<h1> Le Jeux du nombre </h1>
<p> Je propose : <?= $data['guess'] ?>
</p>
<form action="../controler/jeu.ctrl.php">
<input type="submit" name="reponse" value="Trop grand"/>
<input type="submit" name="reponse" value="Trop petit"/>
<input type="submit" name="reponse" value="Trouvé"/>
<input type="hidden" name="nom" value="<?= $data['nom']?>"/>
</form>
</body>
</html>
