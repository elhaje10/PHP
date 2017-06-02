<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
<h1> Le Jeux du nombre </h1>
<p> Cher <?= $data['nom']?>, vous pensiez donc au nombre <?= $data['solution']?>.
  J'ai trouvé la réponse en <?= $data['nombreDeCoup']?> coups.
</p>
<form action="start.ctrl.php">
  <input type="submit" value="Rejouer"/>
  <input type="hidden" name="nom" value="<?= $data['nom']?>"/>
  <input type="hidden" name="reponse" value="Oui"/>
</form>
</body>
</html>
