<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
<h1> Le Jeu du nombre </h1>
<p> C'est dommage <?= $data['nom']?> que vous ne voulez pas jouer avec moi.</p>
<p>  A une autre fois !</p>
<form action="main.ctrl.php">
  <input type="hidden" name="nom" value="<?= $data['nom']?>"/>
  <input type="submit" value="Recommencer" />
</form>
</body>
</html>
