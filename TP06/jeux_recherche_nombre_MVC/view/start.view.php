<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
<h1> Le Jeu du nombre </h1>
<form action="start.ctrl.php">
<p> Bonjour <?= $data['nom']?>,
  voulez-vous jouer au jeu du nombre ?
</p>
<input type="submit" name="reponse" value="Oui"/>
<input type="submit" name="reponse" value="Non"/>
<input type="hidden" name="nom" value="<?= $data['nom']?>" />
</form>
</body>
</html>
